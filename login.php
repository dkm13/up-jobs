<?php

  if(isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if( isset($email) && !empty($email) && isset($password) && !empty($password) ) {
        if($email === "johndoe@gmail.com") {
                    if($password == "12345678") {
                        $_SESSION['user_email'] = $email;
                        $_SESSION['is_logged_in'] = true;
                        setcookie("user_email", $_SESSION['user_email'], time()+86400);
                        setcookie("is_logged_in", $_SESSION['is_logged_in'], time()+86400);
    
                        header("Location: ./admin/dashboard.php");
                    } else {
                         echo "Password is incorrect!";
                    }
                }
            else{
                   echo "email is wrong";
            }
        }
        else{
            echo "Please fill all the fields";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }
        .log {
        width: 350px;
        margin: auto;
        margin-top: 100px;
        }

        @media screen and (max-width: 768px) {
        .log {
            width: 65%;
        }
        }
        @media screen and (max-width: 413px) {
        .log {
            width: 90%;
        }
        }
    </style>
</head>
<body  class="text-center">

    <main class="form-signin w-100 m-auto">
    <form method="POST" class="log">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <br/>
        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <br/>
            <button class="w-100 btn btn-lg btn-primary" name="login_btn" type="submit">Sign in</button>
            <p><b>Warning:</b> This login form is only for admins <a href="index.php">Return to home</a></p>
    </form>
    </main>


    <p>If you wanna tryout the platform the email is: <b>johndoe@gmail.com</b>. , the password is: <b>12345678</b> . But these credentials
        can change in the future.
    </p>
</body>
</html>