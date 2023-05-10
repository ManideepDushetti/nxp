<?php
@include 'php_code/config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>NXP</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="icon" href="nxp_logo.png">
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
        <img src="nxp_logo.png" class="main-logo" width="50" height="50" alt="">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-7 text-secondary">Home</a></li>
          <li><a href="faq.html" class="nav-link px-7 text-white">FAQs</a></li>
          <li><a href="about.html" class="nav-link px-7 text-white">About</a></li>
          <li><a href="php_code/auction_items.php" class="nav-link px-7 text-white">Check out items in auction</a></li>
        </ul>

        <form class="text-end col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="post">
          <input type="text" name="name"  placeholder="Search..." aria-label="Search">
          <input type="submit" name="submit" value="🔍" class="form-btn">
        </form>
        <?php
        if(isset($_POST['submit'])){
          //$pname=$_POST['name'];
          $_SESSION['p_name'] = $_POST['name'];
          header('location:php_code/search_page.php');

         }
         ?>

        <div class="text-end">
          <a href="php_code/login_form.php" class="btn btn-outline-light me-2">Login</a>
          <a href="php_code/register_form_user.php" class="btn btn-warning">Register</a>
        </div>
      </div>
    </div>
  </header>


  <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="nxp_logo.png" alt="" width="200" height="200">
    <h1 class="display-5 fw-bold">NXP(Nit X-Change Platform)</h1>
    <p style="font-size:25px;" class="display-8 fw-bold">A second hand selling and buying website</p>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4"><strong class="welcome">Welcome to NXP </strong><br> NXP is a platform where students of <strong>NIT AP</strong> can buy and sell any product irrespective of their branch and year.</p>
    </div>
  </div>
  <h3  class="display-8 fw-bold text-center">Don't know who to trust?</h1>
  <p class="text-center lead mb-4">If you want to read reviews on users <a href="php_code/reviews_search.php">click here</a></p>



<?php
$i = 1;
$rows = mysqli_query($conn, "SELECT * FROM product_upload")
?>

<br><br><h1  class="display-5 fw-bold text-center">Believing is seeing</h1>
<?php foreach ($rows as $row) : ?>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card text-black">
          <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
          <img src="php_code/images/<?php echo $row["image"]; ?>" style="height:250px;width:250px;margin:auto;"   class="card-img-top " alt="Product pic" />
          <div class="card-body">
            <div class="text-center">
              <strong><p class="text-muted mb-4"><?php  echo $row["product_name"];?></p></strong>
            </div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">
              <span>Uploaded by:</span><span><?php echo $row["username"];?></span>
            </div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">
              <span>Price:</span><span>Rs.<?php echo $row["price"];?></span>
            </div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">
              <span>Discription:</span><span><?php echo $row["discription"];?></span>
            </div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">
              <span>Contact details:</span><span><?php echo $row["email"];?></span>
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
