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
  <title>FAQs</title>
  <link rel="icon" href="../../nxp_logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="<anonymou></anonymou>s">
  <style media="screen">
    body {
      background-color: #f0f8ff;
    }
    .questions{
      padding: 50px 20px;
    }
    .main-logo{
      margin-left: -80px;
      margin-right: 25px;
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
          <li><a href="#" class="nav-link px-7 text-secondary">FAQs</a></li>
          <li><a href="about.php" class="nav-link px-7 text-white">About</a></li>
        </ul>


        <div class="text-end">
          <a href="../user_page.php" class="btn btn-outline-light me-2"><?php echo $user ?></a>
          <a href="../logout.php" class="btn btn-warning">Log-out</a>
        </div>
      </div>
    </div>
  </header>
  <div class="accordion w-100 questions" id="basicAccordion">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#basicAccordionCollapseOne" aria-expanded="false" aria-controls="collapseOne">
          Question #1
        </button>
      </h2>
      <div aria-labelledby="headingOne" data-mdb-parent="#basicAccordion" style="">
        <div class="accordion-body">
          <strong>What is the fullform of NXP?</strong><br><br>The fullform of NXP is Nit X-Change Platform<br>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#basicAccordionCollapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Question #2
        </button>
      </h2>
      <div aria-labelledby="headingTwo" data-mdb-parent="#basicAccordion" style="">
        <div class="accordion-body">
          <strong>Is this available for only NIT AP students?</strong><br><br> Yes.At present
          it is only available in NIT AP , in future it is possible to use this website
          for other NITs.<br>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#basicAccordionCollapseThree" aria-expanded="false" aria-controls="collapseThree">
          Question #3
        </button>
      </h2>
      <div aria-labelledby="headingThree" data-mdb-parent="#basicAccordion" style="">
        <div class="accordion-body">
          <strong>How can i create an account in this website?</strong><br><br> Their is a "Sign-in"
          option in home bar which can be used to create an account with just a username,
          a mail-id and a password.<br>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#basicAccordionCollapseThree" aria-expanded="false" aria-controls="collapseThree">
          Question #4
        </button>
      </h2>
      <div aria-labelledby="headingThree" data-mdb-parent="#basicAccordion" style="">
        <div class="accordion-body">
          <strong>Who can access our information?</strong><br><br> All your information is safe.
          It is only accessed by admins.Their is a passcode in registration form so that
          it is secure from other users.<br>
        </div>
      </div>
    </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#basicAccordionCollapseThree" aria-expanded="false" aria-controls="collapseThree">
        Question #5
      </button>
    </h2>
    <div aria-labelledby="headingThree" data-mdb-parent="#basicAccordion" style="">
      <div class="accordion-body">
        <strong>How can i sell any products in this website?</strong><br><br> After creating an account
        in the website it is directly forwarded to login page.You can use the details of your
        account instantly and login.Their you have an option to sell products.
        You should give basic information like your username,product name,price , discription
         and an image of the product along with your email id so that the reciepent can
        contact you.<br>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#basicAccordionCollapseThree" aria-expanded="false" aria-controls="collapseThree">
        Question #6
      </button>
    </h2>
    <div aria-labelledby="headingThree" data-mdb-parent="#basicAccordion" style="">
      <div class="accordion-body">
        <strong>What can i sell in this website?</strong><br><br> You can sell anytype of objects
        for second hand in this platform irrespective of your course and year.But if it
        contains any inappropriate data then the admin the look into the matter and deletes
        the add and can also ban the account.<br>
      </div>
    </div>
  </div>

  </div>
</body>

</html>
