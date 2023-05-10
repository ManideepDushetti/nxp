<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>
   <link rel="icon" href="../nxp_logo.png">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container">

   <div class="content">
     <img src="../nxp_logo.png" width="200" height="200" alt="">
     <br><br>
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>this is an user page</p>
      <a href="user/user_index.php" class="btn">Home</a>
      <a href="user/about.php" class="btn">About</a>
      <a href="user/faq.php" class="btn">FAQ's</a>
      <a href="logout.php" class="btn">logout</a><br><br>
      <a href="user_products.php" class="btn">My Products</a>
      <a href="bid_upload.php" class="btn">Place an auction</a><br><br>
      <a href="bidding.php" class="btn">Buy a product from an auction</a>
      <a href="give_review.php" class="btn">Give a user review</a>
      <br><br><br><br>
      <h1>Sell a product:</h1>
   </div>
 </div>

 <?php
 require 'config.php';
 if(isset($_POST["submit"])){
   $name = $_SESSION['user_name'];
   $pname=$_POST["pname"];
   $price=$_POST["price"];
   $description=$_POST["description"];
   $email=$_SESSION['email_id'];
   if($_FILES["image"]["error"] == 4){
     echo
     "<script> alert('Image Does Not Exist'); </script>"
     ;
   }
   else{
     $fileName = $_FILES["image"]["name"];
     $fileSize = $_FILES["image"]["size"];
     $tmpName = $_FILES["image"]["tmp_name"];

     $validImageExtension = ['jpg', 'jpeg', 'png'];
     $imageExtension = explode('.', $fileName);
     $imageExtension = strtolower(end($imageExtension));
     if ( !in_array($imageExtension, $validImageExtension) ){
       echo
       "
       <script>
         alert('Invalid Image Extension');
       </script>
       ";
     }
     else{
       $newImageName = uniqid();
       $newImageName .= '.' . $imageExtension;

       move_uploaded_file($tmpName, 'images/' . $newImageName);

       $query="INSERT INTO product_upload(username,product_name,image,price,discription,email) VALUES
       ('$name','$pname','$newImageName','$price','$description','$email')";
       mysqli_query($conn, $query);
       echo
       "
       <script>
         alert('Successfully Added');
         </script>
       ";
     }
   }
 }
 ?>
   <div class="content">
     <div class="form-container">

     <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
       <label for="pname">Product name  </label>
       <input type="text" name="pname" id = "pname" required value=""> <br>
       <label for="image">Image  </label>
       <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
       <label for="price">Enter the price of the product  </label>
       <input type="text" name="price" id = "price" required value=""> <br>
       <label for="description">Give the specifications of the product </label>
       <input type="text" name="description" id = "description" required value=""> <br>
       <br><button type = "submit" name = "submit">Submit</button>
       <p>For home page: <a href="user/user_index.php">Home</a></p>
   </div>
 </div>

 </body>


</div>

</body>
</html>
