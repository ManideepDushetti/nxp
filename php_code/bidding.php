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
    $product_id = $_POST['product_id'];
    $bid_amount = $_POST['bid_amount'];

    // Validate form data
    if (empty($product_id) || empty($bid_amount)) {
        echo 'Please fill all required fields';
        exit;
    }

    // Check if bid is higher than current highest bid


    // Get current highest bid for the product
    $sql = "SELECT * FROM bidding WHERE id = $product_id";
    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_highest_bid = $row['highest_bid'];
        $starting_bid=$row['starting_bid'];
        $date=$row['auction_end_date'];
    }
    else {
        echo 'Product not found';
        exit;
    }

    // Check if bid is higher than current highest bid
    if ($bid_amount <= $current_highest_bid || $bid_amount < $starting_bid) {
        echo 'Your bid must be higher than the current highest bid and the starting bid';
        exit;
    }

    // Update highest bid in database
    $sql1 = "UPDATE bidding SET highest_bid = $bid_amount WHERE id = $product_id";
    $sql2 = "UPDATE bidding SET bidder='$username' WHERE id = $product_id";
    $sql3 = "UPDATE bidding SET auction_end_date='$date' WHERE id = $product_id";

    if ($conn->query($sql1) === TRUE &&$conn->query($sql2) === TRUE) {
        echo "Bid placed successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close connection
    $conn->close();
}

?>

<!-- HTML form for placing a bid -->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bid on an item</title>
    <link rel="icon" href="../nxp_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="content">
      <div class="form-container">

      <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="product_id">Product ID:</label><br>
        <input type="number" id="product_id" name="product_id" required><br>
        <label for="bid_amount">Bid Amount:</label><br>
        <input type="number" id="bid_amount" name="bid_amount" required><br>
        <br><button type = "submit" name = "submit">Place Bid</button>
        <p>For home page: <a href="user/user_index.php">Home</a></p>
    </div>
  </div>
  <div style="margin:50px 250px;">

    <?php
    $i = 1;
    $username=$_SESSION['user_name'];
    $rows = mysqli_query($conn, "SELECT * FROM bidding")
    ?>
    <h1  class="display-5 fw-bold text-center">Want product id?</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Producer</th>
            <th scope="col">Product name</th>
            <th scope="col">Product id</th>
            <th scope="col">Starting Bidding</th>
            <th scope="col">Highest Bidding</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach ($rows as $row) : ?>
              <th scope="row"><?php echo $i;$i=$i+1; ?></th>
              <td><?php echo $row['producer'] ?></td>
              <td><?php echo $row['product_name'] ?></td>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['starting_bid'] ?></td>
              <td><?php echo $row['highest_bid'] ?></td>
              <br>

          </tr>
        </tbody>
      <?php endforeach; ?>

      </table>
    </div>


  </body>
</html>
