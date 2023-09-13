<?php
require("assets/includes/common.php");

// Redirects the user to products page if he/she is logged in.
if (isset($_SESSION['email'])) {
  header('location: home.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CTRL EXpenses</title>
	<!--CSS Stylesheet-->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&display=swap" rel="stylesheet">
</head>
<body>
     <!-- Header -->
	 <?php
	 include 'assets/includes/header.php';
	 ?>
	 <!--Header end-->
	<!--Content-->
    <div id="content">
    	<div id="banner-image">
    		<div class="container">
    			<div id="banner-content">
    				<h1>We Help You Control Budget.</h1>
    				<a href="signup.php" class="btn btn-sm active" style="background: RGB(1,136,122); color:#fff;">Start Today</a>
    			</div>
    		</div>
    	</div>
    </div>
	 <!--Footer-->
	 <?php
	 include 'assets/includes/footer.php';
	 ?>
	 <!--Footer end-->
	
    <!--Javascript files-->
    <script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>