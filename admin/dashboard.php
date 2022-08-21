<?php

session_start();
include '../db/db.php';

     //cookies
if(isset($_COOKIE['user_email'])){
 
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

        header("location: ../login.php");
    }
}


//db

if($mysqli->connect_errno == 0) {
    // READ
    $sql = "SELECT * FROM `jobs`";
    $result = $mysqli->query($sql);
    $results = [];
    
    if($result->num_rows) {
        while($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    } else {
        echo "Table is empty!";
    }

    // search form
}


//delete
if(isset($_GET['action']) && isset($_GET['id'])) {
    if($_GET['action'] == "delete") {
        $ids = $_GET['id'];
        $sql = "DELETE FROM `jobs` WHERE `id`=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute([$ids]);
        
        if($stmt->execute([$ids])) {
            header("Location: ?action=delete&status=1");
        } else {
            header("Location: ?action=delete&status=0");
        }
    }
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
<body>
    

<!-- 
navbar
-->


<a class="btn btn-success" href="?action=logout">Logout</a>
<a class="btn btn-success" href="add_job.php">Add JOB</a>



<h1>Table</h1>
    <hr/>
    <?php if(count($results )): ?>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Company</th>
            <th>Image</th>
            <th>location</th>
            <th>description</th>
            <th>time</th>
            <th>Salary</th>
            <th></th>
        </tr>
        <?php foreach($results as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['type'] ?></td>
            <td><?= $row['Company'] ?></td>
            <td><?= $row['image'] ?></td>
            <td><?= $row['location'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['time'] ?></td>
            <td><?= $row['salary'] ?></td>
            <td><a href="?action=delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-link">
               Delete
             </a></td> 
        </tr>
         <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>
</body>

</body>
</html>