<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jaag Travel and Tours">
    <meta name="author" content="STI">
    <title>JAGG | Travel and Tour and Van Rentals</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
	
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script>

	<link rel="stylesheet" href="dashboard/global/vendor/toastr/toastr.css">
    <link rel="stylesheet" href="dashboard/assets/examples/css/advanced/toastr.css">
  	<link rel="stylesheet" href="dashboard/global/fonts/material-design/material-design.min.css">
	


</head>

<body>
		<script type="text/javascript">toastr.info('Are you the 6 fingered man?')</script>
	<div id="page">
		
	<header class="header menu_fixed">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Page Preload -->
		<div id="logo">
			<a href="index.html">
				<img src="img/logo_2x.png" width="150" height="36" data-retina="true" alt="" class="logo_normal">
				<img src="img/logo_sticky.png" width="150" height="36" data-retina="true" alt="" class="logo_sticky">
			</a>
		</div>
		<ul id="top_menu">
			<li><a href="cart.php" class="cart-menu-btn" title="Cart"><strong>0</strong></a></li>
			<?php if (!isset($_SESSION['customerId'])): ?>
				<li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
			<?php endif ?>

			<?php if (isset($_SESSION['customerId'])): ?>
				<li><a href="#sign-in-dialog" id="sign-in" class="login" title="Log Out">Log Out</a></li>
			<?php endif ?>
			
			
		</ul>
		<!-- /top_menu -->
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<?php include("menu.php");?>		
	</header>
	<!-- /header -->