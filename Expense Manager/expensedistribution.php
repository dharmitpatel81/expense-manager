<?php
if(!isset($_SESSION)){
    session_start();   
}
    if(isset($_SESSION['user_login'])){
        $email = $_SESSION['user_email'];
        
    }else{
        header('location: login.php'); 
    }

    require 'assets/includes/common.php';
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
    <?php include 'assets/includes/header.php';   ?>
    <!--Header end-->   
 

    <div class="container-fluid">
    <?php   
        error_reporting(0);
        $select = "SELECT * FROM plandetails WHERE user_email='$email'";
        $run = mysqli_query($con, $select);
        $row = mysqli_num_rows($run);
        $row = mysqli_fetch_array($run);

    ?>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="margin-top:10px;">
            <div class="panel-heading text-center" style="background:RGB(1,136,122); color:#fff;">
                <h3> <?php echo $row['plan_title']; ?><span class="glyphicon glyphicon-user" style="float:right; margin-right:1.5rem;"> <?php echo $row['no_of_people']; ?></span></h3>
            </div>
                <div class="panel-body">
                    <form action="" method="POST" autocomplete="off">
                        <div class="form-group">
                        <label for="text">Initial Budget</label><span style="float:right; margin-right:2rem;">&#8377 <?php echo $row['plan_budget']; ?></span>
                        </div>
                        <div class="form-group">
                        <label for="text">Person A</label><span style="float:right; margin-right:2rem;">&#8377 <?php echo "0"; ?></span>
                        </div>
                        <div class="form-group">
                        <label for="text">Person B</label><span style="float:right; margin-right:2rem;">&#8377 <?php echo "0"; ?></span>
                        </div>
                        <div class="form-group">
                        <label for="text">Total Amount Spent</label><span style="float:right; margin-right:2rem;">&#8377 <?php echo "0"; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Remaining Amount</label> 
                            <span style="font-weight:bold; float:right; margin-right:2rem; color:green;">&#8377 <?php echo $row['plan_budget']; ?></span>
                        </div>
                        <div class="form-group">
                        <label for="text">Individual Shares</label><span style="float:right; margin-right:2rem;">&#8377 <?php echo "0"; ?></span>
                        </div>
                        <div class="form-group">
                        <label for="text">Person A</label><span style="float:right; margin-right:2rem;">&#8377 <?php echo "0"; ?></span>
                        </div>
                        <div class="form-group">
                        <label for="text">Person B</label><span style="float:right; margin-right:2rem;">&#8377 <?php echo "0"; ?></span>
                        </div>    
                        
                       <a href="home.php"> <button name="login" class="btn btn-block" style="background: RGB(1,136,122); color:#fff;">Go Back</button></a>
                    </form>
                </div>              
            </div>
        </div>

    </div>

    

 

    <!--Footer-->
    <?php include 'assets/includes/footer.php';  ?>
    <!--Footer end-->
	
    <!--Javascript files-->
    <script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>