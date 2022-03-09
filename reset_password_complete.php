<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
<p
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script>
        	function pass()
			{
				var validpass = document.getElementById('form-password');
				var pass=/^[a-zA-Z0-9-_]{6,16}$/;
			   if(validpass.value.search(pass)==-1)
				{
					 alert("enter correct password");
					 validpass.focus();
					 return false;
				 }
			 }
			 function rpass()
			{
				var rpass = document.getElementById('form-rpassword');
				var validpass = document.getElementById('form-password');
				var pass=/^[a-zA-Z0-9-_]{6,16}$/;
			   if(rpass.value!=validpass.value)
				{
					 alert("You New and repeat password not matched");
					 rpass.focus();
					 return false;
				 }
                          
			 }
                         function  validation()
                         {
                             	var validpass = document.getElementById('form-password');
                                var rpass = document.getElementById('form-rpassword');
				var pass=/^[a-zA-Z0-9-_]{6,16}$/;
                                if(validpass.value.search(pass)==-1)
				{
					 alert("enter correct password");
					 validpass.focus();
					 return false;
				 }
                                if(rpass.value!==validpass.value)
				{
					 alert("You New and repeat password not matched");
					 rpass.focus();
					 return false;
				 }
                         }
        </script>
    </head>
    <body>
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                 
			<div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            
                            
                                <?php
                            
                            if ($_GET['code']) {
                                if ($_GET['email']) {
                                    $code = trim($_GET['code']);
                                    $email = trim($_GET['email']);
                                    if(!isset($_POST['submit']))
                                    {
                            echo '
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Reset Password</h3>
                            		<p>Enter your New password:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
							<div class="form-bottom">
			 <form  action="reset_password_complete.php?code=$code&&email=$email" method="post" class="login-form" onsubmit="return validation()">
                                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password :</label>
			                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password" onChange="return pass()">
                                        </div>
                                        <div>
                                        <label class="sr-only" for="form-rpassword">Repeat Password :</label>
			                <input type="text" name="form-rpassword" placeholder="Repeat Password..." class="form-control" id="form-rpassword" onChange="return rpass()">
                                          <button type="submit" name="submit" class="btn">Update password</button>
			          </div>
                           </form>
                                                               </div>
                                                               
                            ';
                            
                                    }
                                      }
                            }
                            
                           
                            
                            ?>
                        </div>
                    </div>
                   
                </div>
                </div>
                </div>
	
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/jquery-3.1.1.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <?php
        if(isset($_POST['post']))
        {
            $code = $_GET['code'];
            $email = $_GET['email'];
            $email = $_POST['femail'];
            $param = $_POST['form-password'];
            $str = password($param);
            $pswd = password_hash($str,PASSWORD_DEFAULT);
                    $state =$con->prepare("SELECT * FROM `registration` WHERE user_email='$email' and user_reset=$code");
                    $state->setFetchMode(PDO::FETCH_BOTH);
                    $state->execute();
                    $count = $state->rowCount();
                    if($count==1)
                    {
                        
                         $state =$con->prepare("update `registration` set user_pass='$pswd' and user_reset='0' WHERE user_email='$email'");
                         $state->execute();
                         
                         echo '<h1>A password reset link send to your Email address please check your inbox</h1>'
                         . '<a href="index.php">click here to go login page</a>';
                    }
 else {
      echo '<h1>Your link was Expired try again!</h1>';
 }
        }
        ?>
        <a href=""
    </body>
</html>
