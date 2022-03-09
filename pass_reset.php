<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
    </body>
</html>
