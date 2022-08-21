<?php 
session_start();

include '../db/db.php';

if(isset($_COOKIE['is_logged_in'])){
    if(isset($_COOKIE['user_email'])) {
        // echo "Welcome " . $_COOKIE['user_email'] . " " . '<a href="?action=logout">Logout</a>';
        // echo "<br/> You are the administartor";
    }
}else{
    header("location: ../login.php");
}

if(isset($_GET['action'])){
    if($_GET['action'] === "logout"){
        unset($_SESSION['user_email']);
        unset($_SESSION['is_logged_in']);
        session_destroy();

        setcookie("user_email", null, time()-1);
        setcookie("is_logged_in", null, time()-1);

        header("location: login.php");
    }
}


//create

if(isset($_POST['add_btn'])){
    $type = $_POST['type'];
    $Company = $_POST['Company'];
    $image = $_POST['image'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $time = $_POST['time'];
    $salary = $_POST['salary'];
    // if(isset($fullname) && !empty($fullname) && isset($diagnose) && !empty($diagnose) && isset($location) && !empty($location) && isset($number) && !empty($number) && isset($date) && !empty($date) && isset($price) && !empty($price)) {
        $sql = "INSERT INTO `jobs` (`type`, `Company`, `image`, `location`, `description`, `time`, `salary`) VALUES ('$type', '$Company', '$image', '$location', '$description', '$time', '$salary')";
        if($mysqli->query($sql)) {
           header("location: dashboard.php");
        }else{
            echo "something went wrong";
        }
    // }else{
    //     echo "please fill all the fields";
    // }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/log-styles.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add.php</title>
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
<body>


<body  class="text-center">

    <main class="form-signin w-100 m-auto">
    <form method="POST" class="log">
        <h1 class="h3 mb-3 fw-normal">Please Fill all the fields</h1>

        <div class="form-floating">
            <input name="type" type="text" class="form-control" id="floatingInput" placeholder="Job" required>
            <label for="floatingInput">Title</label>
        </div>
        <br/>
        <div class="form-floating">
            <input name="Company" type="text" class="form-control" id="floatingPassword" placeholder="Company" required>
            <label for="floatingPassword">Company</label>
        </div>
        <div class="form-floating">
            <input name="image" type="text" class="form-control" id="floatingPassword" placeholder="Image/path" required>
            <label for="floatingPassword">Image</label>
        </div>
        <div class="form-floating">
            <input name="location" type="text" class="form-control" id="floatingPassword" placeholder="Location" required>
            <label for="floatingPassword">Location</label>
        </div>
        <div class="form-floating">
            <input name="description" type="text" class="form-control" id="floatingPassword" placeholder="description" required>
            <label for="floatingPassword">description</label>
        </div>
        <div class="form-floating">
            <input name="time" type="text" class="form-control" id="floatingPassword" placeholder="time" required>
            <label for="floatingPassword">time</label>
        </div>
        <div class="form-floating">
            <input name="salary" type="text" class="form-control" id="floatingPassword" placeholder="salary" required>
            <label for="floatingPassword">salary</label>
        </div>
        <br/>
            <button class="w-100 btn btn-lg btn-primary" name="add_btn" type="submit">Add</button>
    </form>
    </main>


</body>
</html>