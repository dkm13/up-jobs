<?php 
include './db/db.php';

$id = $_GET['id'];
if(isset($id)){
}else{
    header("location: 404.php");
}
$sql = "SELECT * FROM `jobs` WHERE id='$id'";
$results = $mysqli->query($sql);
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
    <link rel="stylesheet" href="./styles/job.css">
    <title>Up-jobs - <?php echo $id ?></title>
</head>
<body>

       <?php include './partials/navbar.php' ?>


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
        <?php  include './partials/footer.php' ?>
</body>
</html>