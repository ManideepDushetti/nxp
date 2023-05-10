<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}


if(isset($_POST['submit'])){
  $name = $_SESSION['user_name'];
  $rid=$_POST["rname"];
  $review=$_POST["review"];

  $sql = "SELECT * FROM user_form WHERE id = $rid";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $query="INSERT INTO review(review_by,review_on,review) VALUES
        ('$name','$rid','$review')";

        mysqli_query($conn, $query);
        echo
        "
        <script>
          alert('Successfully Added');
          </script>
        ";
        header('give_review.php');
        mysqli_close($conn);  }
  else{
    echo "User id does not exists";


    }
 }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Give Review</title>
    <link rel="icon" href="../nxp_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <div class="content">
     <div class="form-container">

     <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
       <label for="rname">Review on (user id) </label>
       <input type="text" name="rname" id = "rname" required value=""> <br>
       <label for="review">Review  </label>
       <input type="text" name="review" id = "review" value=""> <br> <br>
       <br><button type = "submit" name = "submit">Submit</button>
       <p>For home page: <a href="user/user_index.php">Home</a></p>
   </div>
   <?php
   $i = 1;
   $rows = mysqli_query($conn, "SELECT * FROM user_form where user_type='user'")
   ?>
 <div style="margin:50px 400px;">
   <h1  class="display-5 fw-bold text-center">Want User id?</h1>
     <table class="table">
       <thead>
         <tr>
           <th scope="col">S.No</th>
           <th scope="col">User name</th>
           <th scope="col">User id</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <?php foreach ($rows as $row) : ?>
             <th scope="row"><?php echo $i;$i=$i+1; ?></th>
             <td><?php echo $row['name'] ?></td>
             <td><?php echo $row['id'] ?></td>
             <br>

         </tr>
       </tbody>
     <?php endforeach; ?>

     </table>
   </div>


</div>

  </body>
</html>
