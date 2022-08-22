<?php
session_start();
include '../db/db.php';

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dashboard.css"/>
    <title>Dashboard UPJOBS</title>
</head>
<body>
    
<?php include './parts/nav.php' ?>

<h2 style="text-align: center;">Jobs</h2>
<div class="job-container">
              <?php 
                  $sql = "SELECT * FROM `jobs` ORDER BY id DESC LIMIT 12;";
                  $rows = $mysqli->query($sql);
                  while($job = mysqli_fetch_assoc($rows)):
              ?>
              <div class="job">
                <a href="job_details.php?id=<?= $job['id'] ?>">
                <div class="parts">
                <div class="part-one">
                  <img src="<?= $job['image'];?>" alt="<?= $job['type']; ?>" width='200px' height='200px'/>
                </div>
                <div class="part-two">
                  <h4><?= $job['type'];?></h4>
                  <p><?= $job['location'];?></p>
                  <a class="a" href="?action=delete&id=<?= $job['id'] ?>" class="btn btn-sm btn-link">
                    Delete
                 </a>
                 <br/>
                 <a class="a" id="d" href="job_details.php?id=<?= $job['id'] ?>">See DETAILS</a>
                
                </div>
                </div>
              </a>
              </div>
                <?php endwhile; ?>
        </div>

</body>
</html>