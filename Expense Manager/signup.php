<?php
require("assets/includes/common.php");
// Redirects the user to products page if logged in.
if (isset($_SESSION['email'])) {
    header('location: home.php');
}
?>

<?php
    require "assets/includes/common.php";
    if(isset($_POST['sign_up'])){
        // get details
        $name = mysqli_real_escape_string($con, $_POST["name"]);
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $password = mysqli_real_escape_string($con, $_POST["password"]);
        $contact = mysqli_real_escape_string($con, $_POST["contact"]);


        // hash password
        $hashed_password = md5($password);


        $emailquery = "SELECT * FROM users WHERE email = '$email' ";
        $run_emailquery = mysqli_query($con, $emailquery);
        $row_user = mysqli_fetch_array($run_emailquery);        
        $email_count = mysqli_num_rows($run_emailquery);       
        if($email_count>0){
            echo "<script>alert('E-mail allready exit..')</script>";
        }else{
            $mobquery = "SELECT * FROM users WHERE contact = '$contact'";
            $run_mobquery = mysqli_query($con, $mobquery);
            $row_user = mysqli_fetch_array($run_mobquery);
            $mob_count = mysqli_num_rows($run_mobquery);
                if($mob_count>0){
                    echo "<script>alert('Mobile allready exit..')</script>";
                }else{
                    $query1 = "SELECT id FROM users WHERE email = '$email' AND password = '$hashed_password'";
                    $query2 = "INSERT INTO users (name, email, password, contact) VALUES ('$name', '$email', '$hashed_password', '$contact')";
        
                    // check if already registered user
                    $result = mysqli_query($con, $query1);
                    if(mysqli_num_rows($result) > 0){
                        // email already exists
                        echo "<script>alert('E-mail allready exit..')</script>";
                    }else{
                        // perform query operation
                        $result = mysqli_query($con, $query2);
                        $_SESSION["email"] = $email;
                        $_SESSION["id"] = mysqli_insert_id($con);
                         // Registration SuccessFul..
                         echo "<script>alert('Registration SuccessFul..')</script>";
                        
                    }
                    
                }
        }
    }
   
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<!--CSS Stylesheet-->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #dfe4ea;
            padding-top: 80px;
        }
    </style>
</head>
<body>
     <!-- Header -->
	 <?php
	 include 'assets/includes/header.php';
	 ?>
	 <!--Header end-->

    <!--Signup Form-->
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3>Sign Up</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name"  pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Valid Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Password (Min. 6 characters)"  pattern=".{6,}" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="phone" class="form-control" id="phone" placeholder="Enter Valid Phone Number" maxlength="10" size="10" pattern=".{10,}" title="Please enter 10 digit Number" name="contact" required>
                        </div>
                        
                        <button type="submit" name="sign_up" class="btn btn-sm btn-block" style="background: RGB(1,136,122); color:#fff;">Sign Up</button>
                    </form>
                    <div class="panel-footer">
                        <h5>Allready have an account?<a href="login.php"> Click here Login</a></h5>
                    </div>
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