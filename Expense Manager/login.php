<?php
    require 'assets/includes/common.php';
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pass = mysqli_real_escape_string($con, $_POST['password']);
        $password = md5($pass);

        $select_query = "SELECT * FROM users WHERE email= '$email' AND password= '$password' ";
        $run_query = mysqli_query($con, $select_query);
        $row_count = mysqli_num_rows($run_query);

        if($row_count>0){
            $_SESSION['user_login'] = true;
            $_SESSION['user_email'] = $email;

        echo "<script>alert('Login Successfull..')</script>";
            header('location: home.php');
        }else{
            echo "<script>alert('Username and password are wrong..')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<!--CSS Stylesheet-->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&display=swap" rel="stylesheet">
    <style>
    body {
            background-color: #dfe4ea;
            padding-top: 100px;
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
            <div class="panel panel-default" style="margin-top:10px;">
                <div class="panel-heading text-center">
                    <h3>Login</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <button type="submit" name="login" class="btn btn-block" style="background: RGB(1,136,122); color:#fff;">Login</button>
                    </form>
                </div>
                
                <div class="panel-footer">
                    <h5>Don't have an account?<a href="signup.php"> Click here to Sign Up</a></h5>
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