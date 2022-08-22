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
    <link rel="stylesheet" href="./styles/jobs.css">
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


        <?php
                if(isset($_POST['apply_btn'])){
                    $job_id = $_GET['id'];
                    $email = $_POST['email'];
                    $fullname = $_POST['fullname'];
                    $description = $_POST['description'];
                    $number = $_POST['number'];

                    // if(isset($fullname) && !empty($fullname) && isset($diagnose) && !empty($diagnose) && isset($location) && !empty($location) && isset($number) && !empty($number) && isset($date) && !empty($date) && isset($price) && !empty($price)) {
                        $sql = "INSERT INTO `application` (`job_id`, `email`, `fullname`, `description`, `number`)
                         VALUES ('$job_id', '$email', '$fullname', '$description', '$number')";
                        if($mysqli->query($sql)) {
                            echo "<h4 class='msg'>Succesfully applied, our team will contact by email, in future.</h4>";
                        }else{
                            echo "something went wrong";
                        }
                }
        ?>

        <div class="apply">
            <form method="POST" class="log">
                <h1 class="h3 mb-3 fw-normal">Apply</h1>

                <div class="form-floating">
                    <input name="email" type="email" required class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <br/>
                <div class="form-floating">
                    <input name="fullname" type="text" required class="form-control" id="floatingPassword" placeholder="Fullname">
                    <label for="floatingPassword">Fullname</label>
                </div>
                <br/>
                <div class="form-floating">
                    <input name="description" type="text" required class="form-control" id="floatingPassword" placeholder="description">
                    <label for="floatingPassword">Description</label>
                </div>
                <br/>
                <div class="form-floating">
                    <input name="number" type="number" required class="form-control" id="floatingPassword" placeholder="Tel-number">
                    <label for="floatingPassword">Number</label>
                </div>
                <br/>
                    <button class="w-100 btn btn-lg btn-primary" name="apply_btn" type="submit">Apply</button>
            </form>
        </div>


        <hr/>
        <?php  include './partials/footer.php' ?>
</body>
</html>