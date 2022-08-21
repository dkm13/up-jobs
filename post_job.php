<?php 

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
    <title>Upjobs Post job</title>
    <style>
        h3{
            text-align: center;
        }
        p{
            text-align: center;
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body>
    
   <?php include './partials/navbar.php';  ?>

  <h3>Post job:</h3>
  <p>To post a job, contact us on our email <b>example@gmail.com</b>, your email should contain
     a <b>job title, Company name, Company logo, Location, description, time(fulltime - parttime), salary(optional)</b>.
  </p>



   <hr/>
   <?php include './partials/footer.php';  ?>



</body>
</html>