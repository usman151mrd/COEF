                                                            <?php
include 'db/database.php';
include 'db/db.php';
$err = "";
// if(isset($_REQUEST['req']))
if(isset($_REQUEST['submit']))
                {
					
     
     $min = 100000;
     $max = 999999;
                    $email = $_POST['femail'];
                    $mydb->setQuery("SELECT * FROM `registration` WHERE user_email='$email'");
                    $mydb->selection();
                    if($mydb->rowcount()==1)
                    {
                        $code = rand($min, $max);
                         $mydb->update("update `registration` set user_reset=$code WHERE user_email='$email'");
                         $to = $email;
                         $subject = "Reset Password";
                         $message = "Auto generated Email Please do not reply <br>"
                                 . "click to below link to reset your password<br>"
                                 . "http://localhost/Cosef/reset_password_complete.php?code=$code&&email=$email";
                         mail($to, $subject, $message);
                         $err = "A password reset link send to your Email address please check your inbox";
                    }
                     else 
                     {
                         $err = "your email was not exist";
                           
                     }
                    
                }
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
    <head>
        <meta charset="UTF-8">
        <title>Reset Password</title>
         <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script>
        
        	function email()
			{
				var vilidemail = document.getElementById('form-email');
				var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
				if(vilidemail.value.search(email)==-1)
				 {
					 alert("enter correct email");
					 vilidemail.focus();
					 return false;
				 }
                           
                                
			}
       </script>
    </head>
    <body>
      <!-- Top content -->
        
                <div class="container">
                 
			<div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Reset Password</h3>
                            		<p>Enter your Email to Reset password:</p>
                                        <div style="color: red;font-size: 18px"><span class="text-center"><?php echo $err;   ?></span></div>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
							<div class="form-bottom">
                                                            <form  action="reset_password.php" method="post" class="login-form" onsubmit="return email()">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="femail">Email</label>
			                        	<input type="email" name="femail" placeholder="Email..." class="form-username form-control" id="femail">
			                        </div>
									
									 <button type="submit" name="submit" class="btn">Search</button>
									 </form>

			    </div>
                        </div>
                    </div>
                   
                </div>
	
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery-3.1.1.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>

