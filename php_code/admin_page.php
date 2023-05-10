<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="icon" href="../nxp_logo.png">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


</head>

<div class="container">

   <div class="content">
     <img src="../nxp_logo.png" width="200" height="200" alt="">
     <br><br>
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
      <a href="../index.php" class="btn">Home</a>
      <a href="logout.php" class="btn">logout</a>
      <a href="http://localhost/phpmyadmin/" class="btn">For admin page</a>
   </div>

</div>

</body>
</html>
