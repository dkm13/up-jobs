<?php 
include '../db/db.php';

$id = $_GET['id'];
if(isset($id)){
}else{
    header("location: 404.php");
}
$sql = "SELECT * FROM `jobs` WHERE id='$id'";
$results = $mysqli->query($sql);


// hdhdh
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
// css
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <!-- styles -->
    <link rel="stylesheet" href="../styles/jobs.css">
    <title>Up-jobs - <?php echo $id ?></title>
</head>
<body>

       <?php include './parts/nav.php' ?>

       <div class="container-job">
        <?php 
            while($job = mysqli_fetch_assoc($results)):
        ?>
            <img src="<?= $job['image'];?>" alt="<?= $job['type']; ?>" width="200px" height="200px"/>
            <h2><?= $job['type'] ?></h2>
            <h3><b>Company: </b> <?= $job['Company'] ?></h3>
            <h4><b>Location: </b><?= $job['location'] ?></h4>
            <h4><b>Time: </b><?= $job['time'] ?></h4>
            <h3><b>Salary: </b><?= $job['salary'] ?></h3>
            <hr/>
            <p class="desc"><b>Description: </b> <?=$job['description']; ?></p>
          <?php endwhile; ?>
        </div>


        <hr/>




        <h1>Applications</h1>
    <hr/>
    <?php 

// delte
if(isset($_GET['action']) && isset($_GET['id'])) {
    if($_GET['action'] == "delete") {
        $ids = $_GET['id'];
        $sql = "DELETE FROM `application` WHERE `id`=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute([$ids]);
        
        if($stmt->execute([$ids])) {
            header("Location: dashboard.php");
        } else {
            header("Location: ?action=delete&status=0");
        }
    }
}

    
    if($mysqli->connect_errno == 0) {
        // READ
        $sqli = "SELECT * FROM `application` WHERE `job_id` = $id ";
        $res = $mysqli->query($sqli);
        $resultations = [];
        
        if($res->num_rows) {
            while($row = $res->fetch_assoc()) {
                $resultations[] = $row;
            }
        } else {
            echo "Table is empty!";
        }
    
        // search form
    }
    
    
    if(count($resultations )): ?>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Job ID</th>
            <th>Email</th>
            <th>Fullname</th>
            <th>description</th>
            <th>Number</th>
            <th></th>
        </tr>
        <?php foreach($resultations as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['job_id'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['fullname'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['number'] ?></td>
            <td><a href="?action=delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-link">
               Delete
             </a></td> 
        </tr>
         <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>

</body>
</html>