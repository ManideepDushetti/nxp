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
    <title>Your products</title>
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
    date_default_timezone_set('Asia/Kolkata');
    $current_date_time = date('Y-m-d H:i:s');
    $i = 1;
    $name=$_SESSION['user_name'];
    $rows = mysqli_query($conn, "SELECT * FROM bidding where producer='$name' and auction_end_date > '$current_date_time'")
    ?>

    <div class="containers">
      <div class="content">
        <a href="remove_product.php" class="btn">An item is sold<br>(Will be removed from main website)</a>
        <a href="delete_product.php" class="btn">Delete a product<br>(Will be deleted permanently)</a>
        <br><br>
        <a href="user_page.php" class="btn">user-page</a>
        <a href="prev_products.php" class="btn">Previous products</a>
        <a href="prev_biddings.php" class="btn">Past Bidding details</a>
      </div>
    </div>
    <h1  class="display-5 fw-bold text-center">Your Products:</h1>

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
                    <span>Product ID:</span><span><?php echo $row["id"];?></span>
                  </div>
                  <div class="d-flex justify-content-between total font-weight-bold mt-4">
                    <span>Uploaded by:</span><span><?php echo $row["producer"];?></span>
                  </div>
                  <div class="d-flex justify-content-between total font-weight-bold mt-4">
                    <span>Starting bid:</span><span>Rs.<?php echo $row["starting_bid"];?></span>
                  </div>
                  <div class="d-flex justify-content-between total font-weight-bold mt-4">
                    <span>Highest bid:</span><span>Rs.<?php echo $row["highest_bid"];?></span>
                  </div>
                  <div class="d-flex justify-content-between total font-weight-bold mt-4">
                    <span>Discription:</span><span><?php echo $row["product_description"];?></span>
                  </div>
                  <div class="d-flex justify-content-between total font-weight-bold mt-4">
                    <span>Auction end date</span><span><?php echo $row["auction_end_date"];?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
    <?php endforeach; ?>

    <?php
    $user_name=$_SESSION['user_name'];
    $i = 1;
    $rows = mysqli_query($conn, "SELECT * FROM product_upload where username='$user_name'");


    ?>


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
