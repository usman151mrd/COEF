<?php
 
 		session_start(); 
		
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
        if(isset($_POST['submit']))
        {
			include 'db/db.php';
		    include 'db/database.php';
            $code = $_POST['confirm'];
                    $mydb->setQuery("SELECT * FROM `registration` WHERE user_email='{$_SESSION['email']}' AND user_reset='$code'");
                    $r = $mydb->selection();
                    $count = $mydb->rowcount();
                    if($count==1)
                    {
					   $row = $r->fetch();
                       $id = $row->user_id;
					   $fname = $row->user_fname;
					   $lname = $row->user_lname;
					   $name = $row->user_name;
				  	   $email = $row->user_email;
				       $program = $row->user_program;
					   $sem = $row->user_semester;
					   $dob = $row->user_dob;
					   $_SESSION['id']=$id;
					   $_SESSION['fname']=$fname;
					   $_SESSION['lname']=$lname;
					   $_SESSION['unmae']=$name;
					   $_SESSION['email']=$email;
					   $_SESSION['sem']=$sem;
					   $_SESSION['pid']=$program;
					   $_SESSION['dob']=$dob;
                         $mydb->setQuery("UPDATE registration SET user_reset='0' WHERE user_id=".$id);
                         $mydb->update();
                         if($mydb->uaffected_rows()==1)
						 {
                        	header("location:social/index.php");
							
						 }
						 else
						 {
							 header("location:confirm.php?err=Oops ! there occur an error");
 
						 }
                    }
 else {
      	header("location:confirm.php?err=Your Code was wrong! please check your email and try again");
 }
        }
        ?>

<?php
if(isset($_GET['err']))
{
 $err = $_GET['err'];
}  else {
    $err = "";
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
        <title>Confirmation Password</title>
         <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script>
        
        	function email()
			{
				var vilidemail = document.getElementById('form-email');
				var email=/^[0-9]{6,6}$/;
				if(vilidemail.value.search(email)==-1)
				 {
					 alert("enter correct Confirmation code");
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
                        			<h3>Confirmation Code</h3>
                            		<p>Enter Confirmation code to continue:</p>
                                        <div style="color: red;font-size: 18px"><span class="text-center"><?php echo $err;   ?></span></div>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
							<div class="form-bottom">
                                                            <form  action="confirm.php" method="post" class="login-form" onsubmit="return email()">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="femail">Confirmation Code</label>
			                        	<input type="text" name="confirm" placeholder="Confirmation Code..." class="form-username form-control" id="femail">
			                        </div>
									
									 <button type="submit" name="submit" class="btn">Submit</button>
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


