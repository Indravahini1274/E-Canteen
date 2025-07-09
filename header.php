<?php
session_start();
define("APPURL", "http://localhost:8080/"); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-canteen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/jquery.timepicker.css">

    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/style.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
        <div class="wrap">
            <div class="container">
                        <div class="col d-flex justify-content-end">
                            
                            </p>
                    </div>
                        </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Sairam<span>Institution</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> 
          </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="cart.php" class="nav-link">Cart</a></li>
              <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
              <?php if(!isset($_SESSION['username'])): ?>
              <li class="nav-item"><a href="<?php echo APPURL; ?>/login.php" class="nav-link">Login</a></li>
              <li class="nav-item"><a href="<?php echo APPURL; ?>/register.php" class="nav-link">Register</a></li>
              <?php else : ?>

              <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo APPURL; ?>/logout.php">Logout</a></li>
          </ul>
        </li>

        <?php endif; ?> 
            </ul>
          </div>
        </div>
      </nav>
    <!-- END nav -->