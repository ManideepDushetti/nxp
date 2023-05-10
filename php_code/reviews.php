<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['id'])){
   header('location:reviews_search.php');
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reviews</title>
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
    .users{
      margin:50px 350px;
    }


    </style>
  </head>
  <body>
    <div class="users">

    <?php
    $id=$_SESSION['id'];
       $i = 1;
       $rows = mysqli_query($conn, "SELECT * FROM review where review_on='$id'");
       $name=mysqli_query($conn,"SELECT * FROM user_form where id=$id");
           ?>
       <?php foreach ($name as $r) :
         $n=$r['name'];
         endforeach;?>
    <h1  class="display-5 fw-bold text-center">Reviews on <?php echo $n ?>:</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Review Number</th>
            <th scope="col">Review-id</th>
            <th scope="col">Review-by</th>
            <th scope="col">Review</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach ($rows as $row) : ?>
              <th scope="row"><?php echo($i); $i=$i+1;?></th>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['review_by'] ?></td>
              <td><?php echo $row['review'] ?></td>
              <br>

          </tr>
        </tbody>
      <?php endforeach; ?>

      </table>
    </div>

  </body>
</html>
