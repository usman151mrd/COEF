<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['id']))
{
	header("location:social/index.php");
}
if(isset($_GET['err']))
{
 $err = $_GET['err'];
}  else {
    $err = "";
}
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Window</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
       <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to COEF</h3>
                            		<p>Enter your username and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<!--<i class="fa fa-key"></i> -->
                                    <img src="Social/img/coms.png" width="50" height="50" class="img-circle">
                        		</div>
                                    <div style="color: red;font-size: 18px"><span class="text-center"><?php echo $err;   ?></span></div>
                            </div>
                            <div class="form-bottom">
                                <form  action="login.php" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
                                                        <input type="email" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
                                                <button type="submit" name="submit" class="btn">Sign in!</button>
                                                <a href="reset_password.php" class="text-right">Forgotten password</a>
			                    </form>
		                    </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            
        </div>
   <div class="row">
                        <div class="col-sm-12 social-login">
                        	<h3>...or Sign Up:</h3>
                        
	                        	<a class="btn btn-link-1" href="signup.php">
	                        		 Create New Account
	                        	</a>
                                <br>
                               
                        
                        </div>
                    </div>


        <script src="js/bootstrap.js"></script>
        <script src="js/jquery-3.1.1.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
