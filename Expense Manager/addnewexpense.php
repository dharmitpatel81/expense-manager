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
                <h3> Add New Expense<span class="glyphicon glyphicon-user" style="float:right; margin-right:1.5rem;"> <?php echo $row['no_of_people']; ?></span></h3>
            </div>
                <div class="panel-body">
                <form action="" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="name" placeholder=" Expense Name" name="name"  pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Date</label>
                            <input type="date" class="form-control" name="fromdate" id="fromdate" min="2021-04-01" max="2021-04-20" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Amount Spent</label>
                            <input type="text" class="form-control" id="password" placeholder="Amount Spent" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Upload Bill</label>
                            <input type="file" class="form-control" name="uploadedimage" required>
                        </div>
                        <script>
                            function GetImageExtension($imagetype){
                                if(empty($imagetype)) return false;
                                switch($imagetype){
                                case 'image/bmp': return '.bmp';
                                case 'image/gif': return '.gif';
                                case 'image/jpeg': return '.jpg';
                                case 'image/png': return '.png';
                                default: return false;
                                }
                                }
                                if (!empty($_FILES["uploadedimage"]["name"])) {
                                $file_name=$_FILES["uploadedimage"]["name"];
                                $temp_name=$_FILES["uploadedimage"]["tmp_name"];
                                $imgtype=$_FILES["uploadedimage"]["type"];
                                $ext= GetImageExtension($imgtype);
                                $imagename=date("d-m-Y")."-".time().$ext;
                                $target_path = "img/".$imagename;
                                if(move_uploaded_file($temp_name, $target_path)){
                                // Make a query to save data to your database.
                                }
                                }
                        </script>
                        
                        <button type="submit" name="sign_up" class="btn btn-sm btn-block" style="background: RGB(1,136,122); color:#fff;">Add</button>
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