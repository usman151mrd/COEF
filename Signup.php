<!DOCTYPE html>
<?php  include 'db/database.php';
if(isset($_GET['err']))
$err = $_GET['err'];
else
$err = '';
  ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Signup Window</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
                <script src="js/jquery-3.1.1.js"></script>
                <script>
                $(document).ready(function(e){
                  
                    $('#form-email').focusout(function(e) {
						var testemail = $('#form-email').val();
						
                        $.post("testemail.php",{email:testemail},function(data){
						$('#testemail').html(data);	
						});
                    });
					 $('#username').focusout(function(e) {
						var username = $('#username').val();
                        $.post("testuser.php",{user:username},function(data){
						$('#testuser').html(data);	
						});
                    });
                });
                </script>
                  <script>
  // select semester according to program
function showUser(str)
{
if (str==0)
{
document.getElementById().innerHTML="<option>select one</option>";
return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById('Semester').innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","sem.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
	 function validfname()
				{
					var firstname = document.getElementById('form-firstname');
					var fnam=/^[a-zA-Z]{3,15}$/;
					if(firstname.value.search(fnam)==-1)
					{
						 document.getElementById('tfname').innerHTML ="Please enter at least 3 characters";
						 firstname.focus();
						 return false;
					 }
					 else
					 {
						document.getElementById('tfname').innerHTML ="";
						return true; 
					 }
				}
				function validlname()
				{
					 var lastname = document.getElementById('lastname');
					 var lnam=/^[a-zA-Z]{3,15}$/;
					 if(lastname.value.search(lnam)==-1)
					 {
						 document.getElementById('tlname').innerHTML ="Please enter at least 3 characters";
						 lastname.focus();
						 return false;
					 }
					  else
					 {
						document.getElementById('tlname').innerHTML ="";
						return true; 
					 }
				}
				function validuname()
				{
					 var username = document.getElementById('username');
					 var unam=/^[a-zA-Z]{6,15}$/;
					 if(username.value.search(unam)==-1)
					 {
						 document.getElementById('tuname').innerHTML ="Please enter at least 6 characters. Digits and spicial symbol are not allowed";
						 lastname.focus();
						 return false;
					 }
					  else
					 {
						document.getElementById('tuname').innerHTML ="";
						return true; 
					 }
				}
				function email()
				{
					var vilidemail = document.getElementById('form-email');
					var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
					if(vilidemail.value.search(email)==-1)
					 {
						 document.getElementById('temail').innerHTML ="Please enter a valid email address.";
						 vilidemail.focus();
						 return false;
					 }
					  else
					 {
						document.getElementById('temail').innerHTML ="";
						return true; 
					 }
				} 
				function pass()
				{
					var validpass = document.getElementById('form-password');
					var pass=/^[a-zA-Z0-9-_]{6,16}$/;
				   if(validpass.value.search(pass)==-1)
					{
						 document.getElementById('tpass').innerHTML ="Your password must be at least 6 characters long.";
						 validpass.focus();
						 return false;
					 }
					  else
					 {
						document.getElementById('tpass').innerHTML ="";
						return true; 
					 }
				 }
				 function rpass()
				{
					var rpass = document.getElementById('form-rpassword');
					var validpass = document.getElementById('form-password');
				   if(rpass.value!=validpass.value)
					{
						 document.getElementById('temail').innerHTML ="Please enter the same password as above.";
						 rpass.focus();
						 return false;
					 }
					  else
					 {
						document.getElementById('temail').innerHTML ="";
						return true; 
					 }
				 }
				function reg()
				{
					var reg = document.getElementById('roll').value;
					var phn=/^[0-9]{1,3}$/;
					if(reg.search(phn)==-1)
					{
					 alert("enter correct reg no");
					 document.getElementById('regs').focus();
					 return false;
					 }
				}
				function final()
				 {
					var firstname = document.getElementById('form-firstname');
					var fnam=/^[a-zA-Z]{3,15}$/;
					var lastname = document.getElementById('lastname');
					var lnam=/^[a-zA-Z]{3,15}$/;
					var vilidemail = document.getElementById('form-email');
					var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
					var validpass = document.getElementById('form-password');
					var pass=/^[a-zA-Z0-9-_]{6,16}$/;
					var rpass = document.getElementById('form-rpassword');
					var pass=/^[a-zA-Z0-9-_]{6,16}$/;
					var phone = document.getElementById('form-phone');
					var phn=/^[0-9]{9,14}$/;
					var program = document.getElementById('form-department');
					var semester = document.getElementById('form-semester');
					var username = document.getElementById('username');
					var unam=/^[a-zA-Z]{6,15}$/;
					var reg = document.getElementById('roll').value;
					var phn=/^[0-9]{1,3}$/;
					if(firstname.value.search(fnam)==-1)
					{
							alert("enter correct  first name");
							firstname.focus();
							return false;
					}
					else if(lastname.value.search(lnam)==-1)
					{
						 alert("enter correct  last name");
						 lastname.focus();
						 return false;
					}
					else  if(username.value.search(unam)==-1)
					 {
						 document.getElementById('tuname').innerHTML ="Please enter at least 6 characters. Digits and spicial symbol are not allowed";
						 lastname.focus();
						 return false;
					 }
					else if(vilidemail.value.search(email)==-1)
					 {
						 alert("enter correct email");
						 vilidemail.focus();
						 return false;
					}
					else if(validpass.value.search(pass)==-1)
					{
						 alert("enter correct password");
						 validpass.focus();
						 return false;
					 }
					 else if(rpass.value!==validpass.value)
					{
						 alert("You New and repeat password not matched");
						 rpass.focus();
						 return false;
					 }
					 else if(phone.value.search(phn)==-1)
					{
						 alert("enter correct phone no");
						 phone.focus();
						 return false;
					 }
					 else if(program.value==="")
					{
						 alert("Select Any program");
						 phone.focus();
						 return false;
					 }
					 else if(semester.value==="")
					{
						 alert("Select Any semester");
						 phone.focus();
						 return false;
					}
					 else if(reg.search(phn)==-1)
					{
					 alert("enter correct reg no");
					 document.getElementById('regs').focus();
					 return false;
					 }
					 else
					 {
						 return true;
					 }
			   }


</script>
    </head>
    <body>
       <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                   
                    <div class="row">
                        <div class="col-sm-7 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Sign up to Cosef</h3>
                            		<p>Enter your Accurate Information to Sign up:</p>
                                    <p style="color:#DF0307;"><?php echo  $err; ?></p>
                        		</div>
                        		<div class="form-top-right">
                        		<!--	<i class="fa fa-key"></i>-->
                                     <img src="Social/img/coms.png" width="50" height="50" class="img-circle">
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="up.php" method="post" class="login-form" id="signup" name="signup" onSubmit="return final()">
			                    	<div class="form-group">
                                    <div class="row">
                                    <div class="col-xs-3">
			                    		<label  for="form-firstname">First Name :</label>
                                        </div>
                                        <div class="col-xs-9">
			                        	<input type="text" name="form-firstname" placeholder="First Name..." class="form-control" id="form-firstname" onChange="return validfname()">
                                        </div>
                                        </div>
                                        <div id="tfname" style="font-size: 20;color: red;"></div>
			                        </div>
                                    
			                        <div class="form-group">
                                    <div class="row">
                                    <div class="col-xs-3">
			                        	<label  for="form-lastname">Last Name :</label>
			                        	 </div>
                                        <div class="col-xs-9">
                                                        <input type="text" name="form-lastname" placeholder="Last Name..." class="form-control" id="lastname" onChange="return validlname()">
                                                        <div id="tlname" style="font-size: 20;color: red;"></div>
                                                        </div>
                                        </div>
                                                </div>
                                                <div class="form-group">
                                                <div class="row">
                                   			    <div class="col-xs-3">
			                        	<label  for="form-lastname">User Name :</label>
			                        	 </div>
                                        <div class="col-xs-9">
                                                        <input type="text" name="form-username" placeholder="User Name..." class="form-control" id="username" onChange="return validuname()">
                                                        <div id="testuser" style="font-size: 20;color: red;"></div>
                                                        <div id="tuname" style="font-size: 20;color: red;"></div>
                                                </div>
                                                </div>
                                       			 </div>
                                                <div class="form-group">
                                                <div class="row">
                                    			<div class="col-xs-3">
                                                        <label  for="form-email">Email :</label>
                                                         </div>
                                       					 <div class="col-xs-9">
                                                        <input type="email" name="form-email" placeholder="Email..."  class="form-control" id="form-email" onChange="return email()">
                                                        <div id="testemail" style="font-size: 20;color: red;"></div>
                                                        <div id="temail" style="font-size: 20;color: red;"></div>
                                                </div>
                                                </div>
                                                </div>
			                        <div class="form-group">
                                    <div class="row">
                                    <div class="col-xs-3">
			                        	<label  for="form-password">Password :</label>
                                         </div>
                                        <div class="col-xs-9">
			                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password" onChange="return pass()">
                                        <div id="tpass" style="font-size: 20;color: red;"></div>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                         <div class="row">
                                        <div class="col-xs-3">
                                        <label  for="form-rpassword">Repeat Password :</label>
                                        </div>
                                        <div class="col-xs-9">
                                        <input type="password" name="form-rpassword" placeholder="Repeat Password..." class="form-control" id="form-rpassword" onChange="return rpass()">
                                        <div id="trpass" style="font-size: 20;color: red;"></div>
			                        </div></div>
                                        </div>
                                        
                                     <div class="form-group">
			                        <div class="rows">
                      <div class="col-md-12 col-xs-12  col-sm-12">
                      <div class="row">
                        <div class="col-lg-3">
                          <label>Registration Number:</label>
                        </div>

                        <div class="col-lg-4">
                     <select class="form-control input-lg" name="batch" id="month">
                           
                            <option value="SP12">SP12</option>
                            <option value="FA12">FA12</option>
                            <option value="SP13">SP13</option>
                            <option value="FA13">FA13</option>
                            <option value="SP14">SP14</option>
                            <option value="FA14">FA14</option>
                            <option value="SP15">SP15</option>
                            <option value="FA15">FA15</option>
                            <option value="SP16">SP16</option>
                            <option value="FA16">FA16</option>
                            <option value="SP17">SP17</option>
                          </select>

                       </div>

                        <div class="col-lg-4">
                          <select class="form-control input-lg" name="program" id="program">
                           
                                        <?php 
                              
											  $sql = "SELECT `p_id`, `p_name` FROM `program`";
											  $mydb->setQuery($sql);
											  $result =  $mydb->loadResultList();
											  foreach ($result as $row){
											  echo '<option value='.$row->p_id.'>'.$row->p_name.'</option>';
											}	
											?>
                          </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
						<div class="col-lg-3"></div>
                        <div class="col-lg-9">
						        	<input type="text"  class="form-control"   placeholder="Reg Number" name="roll" id="roll" onChange="return reg();">
                          
                        </div>
                        </div>
                      </div> 
                    </div>
                     </div>
                     <br>
                     <br>
                                        <div class="form-group">
                                        <div class="row">
                                    <div class="col-xs-3">
                                        <label  for="form-department">Program :</label>
                                         </div>
                                        <div class="col-xs-9">
			                        	<select name="form-department" class="form-control input-lg" id="program" onChange="showUser(this.value);">
                                        <option value=0>Program</option>
                                        <?php 
                              
											  $sql = "SELECT `p_id`, `p_name` FROM `program`";
											  $mydb->setQuery($sql);
											  $result =  $mydb->loadResultList();
											  foreach ($result as $row){
											  echo '<option value='.$row->p_id.'>'.$row->p_name.'</option>';
											}	
											?>
                                        </select>
                                    	</div>
                                         </div>
                                          </div>
			                         <div class="form-group">
                                     <div class="row">
                                    <div class="col-xs-3">
                                        <label  for="form-semester">Semester :</label>
                                         </div>
                                        <div class="col-xs-9">
			                        	<select name="form-semester" id="Semester" class="form-control input-lg" id="form-semester">
                                       
                                        </select>
                                    	</div>
                                         </div>
                                          </div>
			                                       <div class="form-inline">
                    <div class="rows">
                      <div class="col-md-12 col-xs-12  col-sm-12">
                        <div class="col-md-3">
                          <label>Birthday</label>
                        </div>

                        <div class="col-lg-3">
                     <select class="form-control input-lg" name="month" id="month">
                           
                            <option value="">Month</option>
                               <?php 
                               $m = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                                foreach ($m as $month=>$value) {
                                  echo '<option value='.$month.'>'.$value .'</option>';
                                }
                                ?>
                          </select>

                       </div>

                        <div class="col-lg-3">
                          <select class="form-control input-lg" name="day" id="day">
                           
                         <option value="">Day</option>
            							<?php 
            								$d = range(31, 1);
            								foreach ($d as $day) {
            									echo '<option value='.$day.'>'.$day.'</option>';
            								}
            							
            							?>
                          </select>
                        </div>

                        <div class="col-lg-3">
						        	<select class="form-control input-lg" name="yr" id="yr">
                           <option value="">Year</option>
            							<?php 
            								  $years = range(2010, 1900);
            								  foreach ($years as $yr) {
            									  echo '<option value='.$yr.'>'.$yr.'</option>';
            								  }
            							  
                						  ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <div class="form-group">
			                        	<label  for="form-gender">Gender :</label>
			                        	<input type="Radio"  name="form-gender"  id="form-gender" value="Male" checked>
			                        	Male                              
                                        <input type="Radio"  name="form-gender"  id="form-gender" value="Female">Female
			                        </div>
			                        <button type="submit" name="submit" class="btn">Sign up</button>
                                     
			                    </form>
		                    </div>
                        </div>
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


