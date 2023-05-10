<?php

@include 'config.php';
session_start();
$user=$_SESSION['user_name'];
if(!isset($_SESSION['user_name'])){
   header('location:../login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>About</title>
</head>
<link rel="stylesheet" href="../style_about.css">
<link rel="icon" href="../../nxp_logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="<anonymou></anonymou>s">

<body style="background-color:#f0f8ff	;">

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
          <li><a href="#" class="nav-link px-7 text-secondary">About</a></li>
        </ul>


        <div class="text-end">
          <a href="../user_page.php" class="btn btn-outline-light me-2"><?php echo $user ?></a>
          <a href="../logout.php" class="btn btn-warning">Log-out</a>
        </div>
      </div>
    </div>
  </header>

  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold about_heading">About NXP</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4"><br><br><br>In engineering, many instruments which are costly and of
        short-term use are wasted after their usage. So we need a steady platform between all the
        years and branches of NIT AP so that there will be no problems such as the wastage of money.
        On this platform, students can buy and sell anything from calci to apron with their
        juniors and seniors for low prices than MRP which will be profitable for both, and
        juniors will be happy to buy instruments that are of good quality and can be bought
        cheaper than a new one.</p>
    </div>

  </div>
  <hr class="dots">
  <div class="contact_us text-center">
    <h2 class="touch">Get In Touch</h2>
    <h4 class="touch">Do you have an issue or any doubt about NXP?</h3>
      <p class="contact_message">Do you have any issue about NXP ? Don't worry , if you have any issues or doubts about NXP you can always contact us</p>
      <a class="button" href="mailto:manideepdushetti@gmail.com">CONTACT ME</a>
  </div>
  <div class="bottom-container text-center">
    <a class="footer-link" href="https://www.linkedin.com/in/manideep-dushetti-203858246/">LinkedIn</a>
    <a class="footer-link" href="https://github.com/ManideepDushetti">GitHub</a>
    <a class="footer-link" href="mailto:manideepdushetti@gmail.com">GMail</a>
    <p class="copy-right">© NIT AP @NXP Pvt.Ltd.</p>
  </div>

</body>

</html>
