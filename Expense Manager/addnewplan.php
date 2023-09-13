<?php
    session_start();

    if(isset($_SESSION['user_email'])){
        $email = $_SESSION['user_email'];
    }

    include_once 'assets/includes/common.php';

   
    if(isset($_POST['next'])){
        $user_email = $_POST['user_email'];
        $plan_budget = $_POST['plan_budget'];
        $no_of_people = $_POST['no_of_people'];
        $first_person = $_POST['first_person'];
        $second_person = $_POST['second_person'];

         // Generate Random Number For unqie plandetails table                     
        $str = '465879';
        $shuffled = str_shuffle($str);
      
       
        $insert = "INSERT INTO plandetails (user_email, plan_budget, no_of_people, rand_num, first_person, second_person) VALUE ('$user_email', '$plan_budget', '$no_of_people','$shuffled', '$first_person', '$second_person')";
        $run_insert = mysqli_query($con, $insert);
        if($run_insert){
          echo "Insert Success.." . mysqli_error($con);
          $_SESSION['rand_num'] = $shuffled;
          echo "<script>location.href='plandetails.php'</script> ";
        }else{
          echo "Insert Error.." . mysqli_error($con);
        }
  
    }
    else{
        // echo "not click";
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
    <style>
        
        .next-btn:hover{
            background: RGB(1,136,122);
            color: #fff;
        }
    </style>

</head>
<body>
     <!-- Header -->
	 <?php
	 include 'assets/includes/header.php';
	 ?>
	 <!--Header end-->
	<!--Content-->
    <div class="container">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default" style="margin-top:2rem;">
                <div class="panel-heading text-center">
                    <h3>Create New Plan</h3>
                </div>
                <div class="panel-body ">
                    <form action="" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="initial_budget">Initial Budget</label>
                            <input type="number" min="50" class="form-control" name="plan_budget" id="initial_budget" placeholder="Initiial Budget (Ex. 4000)" required>
                        </div>
                        
                    
                        <div class="form-group">
                            <label for="noofpeople">How many peoples you want to add in your group ?</label>
                            <input type="number" min="1" max="2" class="form-control" name="no_of_people" id="col-md-4 col-md-offset-4" placeholder="No. of people"  required>
                            <input type="hidden" class="form-control" name="user_email" value="<?php echo $email; ?> ">
                            <input type="hidden" class="form-control" name="first_person" value="<?php echo "person 1"; ?> ">
                            <input type="hidden" class="form-control" name="second_person" value="<?php echo "person 2"; ?> ">
                        </div>
                        <button type="submit" name="next" class="next-btn btn btn-block ">Next</button>
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