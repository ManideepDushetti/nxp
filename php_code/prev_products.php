<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Previous Products</title>
    <link rel="icon" href="../nxp_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style media="screen">
    .btn{
       display: inline-block;
       padding:10px 30px;
       font-size: 20px;
       background: #333;
       color:#fff;
       margin:0 5px;
       text-transform: capitalize;
    }

    .btn:hover{
       background: crimson;
    }
    .containers{
       display: flex;
       align-items: center;
       justify-content: center;
       padding:20px;
       padding-bottom: 60px;
    }

    .containers .content{
       text-align: center;
       display: block;
    }
    </style>
  </head>
  <body>
    <?php
    $user_name=$_SESSION['user_name'];
    $i = 1;
    $rows = mysqli_query($conn, "SELECT * FROM deleted_products where username='$user_name'")
    ?>

    <div class="containers">
      <div class="content">
        <a href="user_page.php" class="btn">user-page</a>
        <a href="user_products.php" class="btn">My-products</a>
        <a href="user/user_index.php" class="btn">Home</a>
      </div>
    </div>
    <h1  class="display-5 fw-bold text-center">All your products that you had posted in the past:</h1>
    <?php foreach ($rows as $row) : ?>
    <section style="background-color: #eee;">
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card text-black">
              <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
              <img src="images/<?php echo $row["image"]; ?>" style="height:250px;width:250px;margin:auto;"   class="card-img-top " alt="Product pic" />
              <div class="card-body">
                <div class="text-center">
                  <strong><p class="text-muted mb-4"><?php  echo $row["product_name"];?></p></strong>
                </div>
                <div class="d-flex justify-content-between total font-weight-bold mt-4">
                  <span>Product_id</span><span><?php echo $row['id'];?></span>
                </div>
                <div class="d-flex justify-content-between total font-weight-bold mt-4">
                  <span>Price:</span><span>Rs.<?php echo $row["price"];?></span>
                </div>
                <div class="d-flex justify-content-between total font-weight-bold mt-4">
                  <span>Discription:</span><span><?php echo $row["discription"];?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <?php endforeach; ?>
  </body>
</html>
