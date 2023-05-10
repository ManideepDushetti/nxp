<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form data
    $username=$_SESSION['user_name'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $starting_bid = $_POST['starting_bid'];
    $auction_end_date = $_POST['auction_end_date'];

    // Validate form data
    if (empty($product_name) || empty($product_description) || empty($starting_bid) || empty($auction_end_date)) {
        echo 'Please fill all required fields';
        exit;
    }
    if($_FILES["image"]["error"] == 4){
      echo
      "<script> alert('Image Does Not Exist'); </script>";
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
    }

      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'images/' . $newImageName);

    // Prepare SQL statement
    $sql = "INSERT INTO bidding (producer,product_name,image, product_description, starting_bid, auction_end_date)
    VALUES ('$username','$product_name','$newImageName', '$product_description', '$starting_bid', '$auction_end_date')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Product uploaded successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}

?>

<!-- HTML form for uploading a product -->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Place an Auction</title>
    <link rel="icon" href="../nxp_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="content">
      <div class="form-container">

      <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label><br>
        <input type="text" id="product_name" name="product_name" required><br>
        <label for="image">Image  </label>
        <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
        <label for="product_description">Product Description:</label><br>
        <input id="product_description" name="product_description" required><br>
        <label for="starting_bid">Starting Bid:</label><br>
        <input type="number" id="starting_bid" name="starting_bid" required><br>
        <label for="auction_end_date">Auction End Date:</label><br>
        <input type="date" id="auction_end_date" name="auction_end_date" required><br>
        <br><button type = "submit" name = "submit">Upload Product</button>
        <p>For home page: <a href="user/user_index.php">Home</a></p>
    </div>
  </div>
  </body>
</html>
