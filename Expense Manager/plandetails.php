<?php
  if(!isset($_SESSION)){
    session_start();
  }
  if(isset($_SESSION['user_login'])){
    $email = $_SESSION['user_email'];
  }else{
    header('location:index.php');
  }
    require 'assets/includes/common.php';

    $rand_num = $_SESSION['rand_num'];
    $select = "SELECT * FROM plandetails WHERE rand_num='$rand_num'";
    $run = mysqli_query($con, $select);
    $row = mysqli_fetch_array($run);
      $user_id = $row['plan_id'];
          

    if(isset($_POST['next'])){
      $plan_title = mysqli_real_escape_string($con, $_POST['plan_title']);
      $user_email = $_POST['user_email'];
      $fromdate = $_POST['fromdate'];
      $todate = $_POST['todate'];
      $plan_budget = $_POST['plan_budget'];
      $people = $_POST['people'];
      $first_person = mysqli_real_escape_string($con, $_POST['first_person']);
      $second_person = mysqli_real_escape_string($con, $_POST['second_person']);

      $update = "UPDATE plandetails SET user_email='$user_email', plan_title='$plan_title', plan_from_date='$fromdate', plan_to_date='$todate', first_person='$first_person', second_person='$second_person' WHERE rand_num='$rand_num'";
      $run_update = mysqli_query($con, $update);
      if($run_update){
        echo "update Success.." . mysqli_error($con) ;
        echo "<script>location.href='home.php' </script>";
      }else{
        echo "update Error.." . mysqli_error($con);
      }

    }else{
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
          <div class="panel-body">
            <form action="plandetails.php" method="POST">
              <div class="form-group col-md-12">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="plan_title" id="plan_title" placeholder="Enter Title (Ex. Trip to Goa)">
                <input type="hidden" class="form-control" name="user_email" value="<?php echo $email; ?>">
              </div>


              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="fromdate">From</label>
                  <input type="date" class="form-control" name="fromdate" id="fromdate" min="2021-04-01" max="2021-04-20" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="todate">To</label>
                  <input type="date" class="form-control" name="todate" id="todate" min="2021-04-01" max="2021-04-20" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label for="budget">Initial Budget</label>
                  <input type="text" class="form-control" name="plan_budget" id="plan_budget" value="<?php echo $row['plan_budget']; ?>" readonly required>
                </div>
                <div class="form-group col-md-4">
                  <label for="people">No. Of People</label>
                  <input type="text" class="form-control" name="people" id="people" value="<?php echo $row['no_of_people']; ?>" readonly required>
                </div>
              </div>

              <?php
              $rand_num = $_SESSION['rand_num'];
              $select = "SELECT * FROM plandetails WHERE rand_num='$rand_num'";
              $run = mysqli_query($con, $select);
              ?>

              <div class="form-group col-md-12">
                <label for="person">Person 1</label>
                <input type="text" class="form-control" name="first_person" id="first_person" placeholder="Person 1 Name" required>
              </div>

              <div class="form-group col-md-12">
                <label for="todate">Person 2</label>
                <input type="text" class="form-control" name="second_person" id="second_person" placeholder="Person 2 Name">
              </div>

              <button type="submit" name="next" class="btn btn-block btn-success">Next</button>
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