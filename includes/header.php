<!DOCTYPE html>
<!--
	Cosmix by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php
session_start();
require 'configs/helper.php'; 
?>
<?php
$site_info = getSiteInfo();
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?= $site_info['site_description']; ?>">
<meta name="keywords" content="<?= $site_info['site_keywords']; ?>">
<meta name="author" content="Eftekhar Alam">
<link rel="icon" type="image/png" href="./admin/uploads/sites/<?= $site_info['site_icon']; ?>" />
<title>Cosmix Free HTML5 Responsive Template | Template Stock</title>
<!--Bootstrap-->
<link rel="stylesheet" type="text/css" href="<?php echo SITE_ASSETS.'css/bootstrap.css'; ?>">
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="<?php echo SITE_ASSETS.'css/style.css'; ?>">
<!--Responsive-->
<link rel="stylesheet" type="text/css" href="<?php echo SITE_ASSETS.'css/responsive.css'; ?>">
<!--Animation-->
<link rel="stylesheet" type="text/css" href="<?php echo SITE_ASSETS.'css/animate.css'; ?>">
<!--Prettyphoto-->
<link rel="stylesheet" type="text/css" href="<?php echo SITE_ASSETS.'css/prettyPhoto.css'; ?>">
<!--Font-Awesome-->
<link rel="stylesheet" type="text/css" href="<?php echo SITE_ASSETS.'css/font-awesome.css'; ?>">
<!--Owl-Slider-->
<link rel="stylesheet" type="text/css" href="<?php echo SITE_ASSETS.'css/owl.carousel.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_ASSETS.'css/owl.theme.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_ASSETS.'css/owl.transitions.css'; ?>">
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  [endif]-->
</head>
<body data-spy="scroll" data-target=".navbar-default" data-offset="100">
<!--Preloader-->
<div id="preloader">
  <div id="pre-status">
    <div class="preload-placeholder"></div>
  </div>
</div>
<!--Navigation-->
<header id="menu">
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="#menu">
            <?php if($site_info['site_logo']){ ?>
              <img src="./admin/uploads/sites/<?= $site_info['site_logo']; ?>" alt="">
            <?php } else { ?>
                <h3>Cosmix</h3>
            <?php } ?>
          </a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a class="scroll" href="#menu">Home</a></li>
            <li><a class="scroll" href="#about">About</a></li>
            <li><a class="scroll" href="#service">Service</a></li>
            <li><a class="scroll" href="#features">Features</a></li>
            <li><a class="scroll" href="#portfolio">Portfolio</a></li>
            <li><a class="scroll" href="#team">Team</a></li>
            <li><a class="scroll" href="#testimonials">Testimonial</a></li>
            <li><a class="scroll" href="#contact">Contact</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </div>
  </div>
</header>