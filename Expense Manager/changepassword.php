<?php
    if(!isset($_SESSION)){
        session_start();   
    }
    if(isset($_SESSION['user_login'])){
        $email = $_SESSION['user_email'];
    }else{
        header('location: index.php'); 
    }
    require 'assets/includes/common.php';

    if(isset($_POST['change_pass'])){
        // get the newly typed password
        $old_password = mysqli_real_escape_string($con, $_POST["old_pass"]);
        $new_password = mysqli_real_escape_string($con, $_POST["new_pass"]);
        $retype_pass = mysqli_real_escape_string($con, $_POST["retype_new_pass"]);
            $password = md5($old_password);
            $new_pass = md5($new_password);
            
        $select = "SELECT * FROM users WHERE email='$email'";
        $run = mysqli_query($con, $select);
        $row = mysqli_fetch_array($run);
            $db_password = $row['password'];      
        
        if($password==$db_password){
            if($new_password == $retype_pass){
                $update = "UPDATE users SET password='$new_pass' WHERE email='$email' ";
                $run_update = mysqli_query($con, $update);
                if($run_update){
                    echo "<script>alert('Password updated..')</script>";
                }else{
                    echo "<script>alert('Update Query Error..')</script>";
                }
            }else{
                echo "<script>alert('pass and cpass not match..')</script>";
            }
        }else{
            echo "<script>alert('Old password does not match')</script>";
        }
    
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Change Password</title>
	<!--CSS Stylesheet-->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #dfe4ea;
            padding-top: 60px;
        }
    </style>
</head>
<body>
      <!-- Header -->
	 <?php
	 include 'assets/includes/header.php';
	 ?>
	 <!--Header end-->	 
    <!--Login Form-->
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3>Change Password</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="old_pass">Old Password:</label>
                            <input type="text" class="form-control" name="old_pass" id="old_pass" placeholder="Old Password">
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password:</label>
                            <input type="text" class="form-control" name="new_pass" id="new_password" placeholder="New Password (Min. 6 characters)">
                        </div>
                        <div class="form-group">
                            <label for="con_new_password">Confirm New Password:</label>
                            <input type="text" class="form-control" name="retype_new_pass" id="con_new_password" placeholder="Re-type New Password">
                        </div>
                        <button type="submit" name="change_pass" class="btn btn-block btn-info">Change</button>
                    </form>
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
