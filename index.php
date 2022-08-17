<?php 
   include './partials/navbar.php';
   include './db/db.php';
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
    <link rel="stylesheet" href="./styles/style.css">
    <title>Up-jobs</title>
</head>
<body>

  <h3 style="text-align: center;">Search job type:</h3>
        <form method="GET" action="search.php">
           <input id="search" type="text" placeholder="Search.." name="query" />
          <button class="btn btn-success" type="submit">Search</button>
        </form>
        
        <div class="job-container">
              <?php 
                  $sql = "SELECT * FROM `jobs` ORDER BY id DESC LIMIT 12;";
                  $rows = $mysqli->query($sql);
                  while($job = mysqli_fetch_assoc($rows)):
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
        <?php  include './partials/footer.php' ?>
</body>
</html>