<?php 
include './db/db.php';
include './partials/navbar.php';
$search_query = $_GET['query'];

if(isset($search_query)){
}else{
    header("location: 404.php");
}
$sql = "SELECT * FROM `jobs` WHERE `type` LIKE '%$search_query%' ORDER BY id DESC";
$results = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <title>UPJOBS - Search </title>
</head>
<body>
    <!-- up STATIC -->
    <a href="index.php">Return to homepage</a>
<br/>

    <h3>Search results for: <b><?php echo $search_query ?></b></h3>
       <div class="job-container">
              <?php 
                  while($job = mysqli_fetch_assoc($results)):
              ?>
              <div class="job">
                <a href="job.php?id=<?= $job['id'] ?>">
                <div class="parts">
                    <div class="part-one">
                        <img src="<?= $job['image'];?>" alt="<?= $job['type']; ?>" width='200px' height='200px'/>
                    </div>
                    <div class="part-two">
                        <h4><?= $job['type'];?></h4>
                        <p><?= $job['location'];?></p>
                    </div>
                </div>
              </a>
              </div>
                <?php endwhile; ?>
        </div>

        <hr/>
    <?php include './partials/footer.php' ?>

</body>
</html>