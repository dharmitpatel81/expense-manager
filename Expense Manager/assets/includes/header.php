<!--Navigation-->
<nav class="navbar navbar-default navbar-fixed-top">
    	<div class="container">
    		<div class="navbar-header">
    			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-index" aria-expanded="false">
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    			</button>
    			<a href="home.php" class="navbar-brand">Ct&#8377I Budget</a>
    		</div>  
    		<div class="collapse navbar-collapse" id="navbar-index">
    			<ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a href="aboutus.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a>
                </li>

                <?php                       
                        if (isset($_SESSION['user_email'])){
                            echo ' <li class="nav-item">
                                <a href="changepassword.php"><span class="glyphicon glyphicon-cog"></span> Change Password</a>
                            </li>
                            <li class="nav-item">
                                <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                            </li> ';

                        }
                        else {
                            echo ' <li class="nav-item">
                                <a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
                            </li>
                            <li class="nav-item">
                                <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                            </li>';
                        }
                    ?>
    			</ul>
    		</div>  		
    	</div>
    </nav>
    <!--Navigation end-->