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
    <style>
          .pluse_btn{
            position: fixed;
            bottom:6rem;
            right: 2rem;
            font-size: 3rem;
            background: RGB(1,136,122);
            border-radius: 50%;
            line-height: 1.1em;        
        }

        span.glyphicon{
            top: 1px;
            left: 1px;
            padding: 5px;            
        }
        .pluse-btn{
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include 'assets/includes/header.php';   ?>
    <!--Header end-->   
        <div class="">
        <?php   
            error_reporting(0);
            $select = "SELECT * FROM plandetails WHERE user_email='$email'";
            $run = mysqli_query($con, $select);
            $row = mysqli_num_rows($run);
            $row_user = mysqli_fetch_array($run);
            if($row>0){
                ?>
                <!-- Start Condition 2 For Existing user-->
                <?php
                    $select = "SELECT * FROM plandetails WHERE user_email='$email'";
                    $run = mysqli_query($con, $select);
                while($row = mysqli_fetch_array($run)){
                ?>           
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 ">
                    <div class="panel panel-default" style="margin-top:10px;">
                        <div class="panel-heading text-center" style="background:RGB(1,136,122); color:#fff;">
                            <h3> <?php echo $row['plan_title']; ?><span class="glyphicon glyphicon-user" style="float:right; margin-right:1.5rem;"> <?php echo $row['no_of_people']; ?></span></h3>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST" autocomplete="off">
                                <div class="form-group">
                                    <label for="email">Budget</label><span style="float:right; margin-right:2rem;">&#8377 <?php echo $row['plan_budget']; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Date</label> <span style="float:right; margin-right:2rem;">
                                    <?php echo $row['plan_from_date']  .' To '. $row['plan_to_date']; ?></span>
                                </div>
                               <a href="viewplans.php" class="btn btn-block" style="background: RGB(1,136,122); color:#fff;" >View Plan</a>
                            </form>
                        </div>            
                    </div>
                </div>                        
            <?php } ?>
        </div>
        <!-- Start Add button for new plan -->
        
        <div class="pluse_btn">
            <a href="addnewplan.php"><span class="glyphicon glyphicon-plus pluse-btn"></span> </a>
        </div>
        <!-- End Add button for new plan -->

        <!-- End Condition 2 For Existinig user-->
        <?php
        }else{
            ?>
            <!-- Start Condition 1 for new user -->
            <div class="container home-main">
                <div class="row row_style">
                    <div class="col-xs-6 col-md-4 col-md-offset-4">
                        <div class="panel panel-default" style="margin-top: 1.5rem;">
                            <div class="panel-heading">
                                <h4>You don't have any active plans</h4>
                            </div>
                            <div class="panel-body">
                                <p><a href="addnewplan.php"><span class="glyphicon glyphicon-plus"></span> Create a New Plan</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Condition 1 For new user-->   
            <?php        
        }
    ?>
 


    <!--Footer-->
    <?php include 'assets/includes/footer.php';  ?>
    <!--Footer end-->
	
    <!--Javascript files-->
    <script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>