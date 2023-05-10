<?php
@include '../config.php';

session_start();
if(!isset($_SESSION['user_name'])){
   header('location:../login_form.php');
}
// $_SESSION['pname']="drafter";
if(!isset($_SESSION['pname'])){
   header('location:user_index.php');
}
$user=$_SESSION['user_name'];
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>High-Low Priced products</title>
     <link rel="stylesheet" href="../../style.css">
     <link rel="icon" href="../../nxp_logo.png">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <style media="screen">
     .dropdown {
       background-color: white;
       position: relative;
       margin: 25px;
       display: inline-block;
     }

     /* Style the dropdown content (hidden by default) */
     .dropdown-content {
       background-color: white;
       display: none;
       position: absolute;
       z-index: 1;
     }

     /* Style the links inside the dropdown */
     .dropdown-content a {
       color: black;
       padding: 10px 0;
       text-decoration: none;
       display: block;
     }

     /* Change color of dropdown links on hover */
     .dropdown-content a:hover {
       background-color: #f1f1f1;
     }

     /* Show the dropdown menu on hover */
     .dropdown:hover .dropdown-content {
       display: block;
     }

     </style>
   </head>
   <body>
     <header class="p-3 text-bg-dark">
       <div class="container">
         <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
           <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
             <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
               <use xlink:href="#bootstrap" />
             </svg>
           </a>
           <img src="../../nxp_logo.png" class="main-logo" width="50" height="50" alt="">

           <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
             <li><a href="user_index.php" class="nav-link px-7 text-white">Home</a></li>
             <li><a href="faq.php" class="nav-link px-7 text-white">FAQs</a></li>
             <li><a href="about.php" class="nav-link px-7 text-white">About</a></li>
             <li><a href="auction_items.php" class="nav-link px-7 text-white">Check out items in auction</a></li>
           </ul>

           <div class="dropdown">
             <button class="dropbtn">Filters:</button>
             <div class="dropdown-content">
               <a href="low-high.php">Low to High</a>
               <a href="high-low.php">High to Low</a>
             </div>
           </div>

           <form class="text-end col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="post">
             <input type="text" name="name"  placeholder="Search..." aria-label="Search">
             <input type="submit" name="submit" value="🔍" class="form-btn">
           </form>
           <?php
           if(isset($_POST['submit'])){
             $pname=$_POST['name'];
             $_SESSION['pname'] = $pname;
             header('location:php_code/search_page.php');

            }
            ?>

            <div class="text-end">
              <a href="../user_page.php" class="btn btn-outline-light me-2"><?php echo $user ?></a>
              <a href="../logout.php" class="btn btn-warning">Log-out</a>
            </div>
         </div>
       </div>
     </header>

     <?php
     date_default_timezone_set('Asia/Kolkata');
     $current_date_time = date('Y-m-d H:i:s');
     $product_name=$_SESSION['pname'];
     $i = 1;
     $rows = mysqli_query($conn, "SELECT * FROM bidding where product_name='$product_name' and auction_end_date > '$current_date_time' order by highest_bid desc")
     ?>



     <h1  class="display-5 fw-bold text-center">Your search results:</h1>
     <?php foreach ($rows as $row) : ?>
       <section style="background-color: #eee;">
         <div class="container py-5">
           <div class="row justify-content-center">
             <div class="col-md-8 col-lg-6 col-xl-4">
               <div class="card text-black">
                 <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                 <img src="../images/<?php echo $row["image"]; ?>" style="height:250px;width:250px;margin:auto;"   class="card-img-top " alt="Product pic" />
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
     $product_name=$_SESSION['pname'];
     $i = 1;
     $rows = mysqli_query($conn, "SELECT * FROM product_upload where product_name='$product_name' order by price desc")
     ?>



     <?php foreach ($rows as $row) : ?>
     <section style="background-color: #eee;">
       <div class="container py-5">
         <div class="row justify-content-center">
           <div class="col-md-8 col-lg-6 col-xl-4">
             <div class="card text-black">
               <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
               <img src="../images/<?php echo $row["image"]; ?>" style="height:250px;width:250px;margin:auto;"   class="card-img-top " alt="Product pic" />
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
