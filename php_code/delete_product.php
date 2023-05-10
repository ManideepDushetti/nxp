<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}


if(isset($_POST['submit'])){
   $id=mysqli_real_escape_string($conn, $_POST['id']);
   $username=$_SESSION['user_name'];

   $delete = "delete from product_upload where id='$id' and username='$username'";
   mysqli_query($conn, $delete);
   header('location:user_products.php');
 }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Deleting Product</title>
    <link rel="icon" href="../nxp_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style media="screen">
    .users{
      margin:50px 400px;
    }
    </style>

  </head>
  <body>
    <div class="form-container">

       <form action="" method="post">

          <form action="" method="post">
             <h3>Delete a product:</h3>
             <?php
             if(isset($error)){
                foreach($error as $error){
                   echo '<span class="error-msg">'.$error.'</span>';
                };
             };
             ?>
             <input type="text" name="id" required placeholder="enter the id of the product:">
             <input type="submit" name="submit" value="Delete now" class="form-btn">
             <p>For home page: <a href="user/user_index.php">Home</a></p>
             <p>To go back: <a href="user_products.php">Your Products</a></p>
          </form>


    </div>
    <div class="users">

    <?php
    $i = 1;
    $username=$_SESSION['user_name'];
    $rows = mysqli_query($conn, "SELECT * FROM product_upload where username='$username'")
    ?>
    <h1  class="display-5 fw-bold text-center">Want product id?</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Product name</th>
            <th scope="col">Product id</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach ($rows as $row) : ?>
              <th scope="row"><?php echo $i;$i=$i+1; ?></th>
              <td><?php echo $row['product_name'] ?></td>
              <td><?php echo $row['id'] ?></td>
              <br>

          </tr>
        </tbody>
      <?php endforeach; ?>

      </table>
    </div>

  </body>
</html>
