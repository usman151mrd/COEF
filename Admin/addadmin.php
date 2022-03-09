
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Add Admin</title>

    <!-- Bootstrap CSS -->    
    <link href="../Social/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../Social/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../Social/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../Social/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../Social/css/style.css" rel="stylesheet">
    <link href="../Social/css/style-responsive.css" rel="stylesheet" />
 
    <script>
	 		 function validfname()
				{
					var firstname = document.getElementById('fullname');
					var fnam=/^[a-zA-Z ]{6,15}$/;
					if(firstname.value.search(fnam)==-1)
					{
						 document.getElementById('tfname').innerHTML ="Please enter at least 6 characters";
						 firstname.focus();
						 return false;
					 }
					 else
					 {
						document.getElementById('tfname').innerHTML ="";
						return true; 
					 }
				}
				function email()
				{
					alert('test');
					var vilidemail = document.getElementById('email');
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
    			function npass()
				{
					var validpass = document.getElementById('password');
					var pass=/^[a-zA-Z0-9-_]{6,16}$/;
					//alert(validpass);
				   if(validpass.value.search(pass)==-1)
					{
						 document.getElementById('pass').innerHTML ="Your password must be at least 6 characters long.";
						 validpass.focus();
						 return false;
					 }
					  else
					 {
						document.getElementById('pass').innerHTML ="";
						return true; 
					 }
				 }
				 function rpass()
				{
					var rpass = document.getElementById('confirm_password');
					var validpass = document.getElementById('password');
				   if(rpass.value!=validpass.value)
					{
						 document.getElementById('cpass').innerHTML ="Please enter the same password as above.";
						 rpass.focus();
						 return false;
					 }
					  else
					 {
						document.getElementById('cpass').innerHTML ="";
						return true; 
					 }
				 }
				 function final()
				 {
					    var pass=/^[a-zA-Z0-9-_]{6,16}$/;
						var rpass = document.getElementById('confirm_password');
						var validpass = document.getElementById('password'); 
						var firstname = document.getElementById('fullname');
						var fnam=/^[a-zA-Z ]{6,15}$/;
						var vilidemail = document.getElementById('email');
						var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
						if(firstname.value.search(fnam)==-1)
					{
						 document.getElementById('tfname').innerHTML ="Please enter at least 6 characters";
						 firstname.focus();
						 return false;
					 }
					 else if(vilidemail.value.search(email)==-1)
					 {
						 document.getElementById('temail').innerHTML ="Please enter a valid email address.";
						 vilidemail.focus();
						 return false;
					 }
					  else if(validpass.value.search(pass)==-1)
					{
						 document.getElementById('pass').innerHTML ="Your password must be at least 6 characters long.";
						 validpass.focus();
						 return false;
					 }
					 if(rpass.value!=validpass.value)
					{
						 document.getElementById('cpass').innerHTML ="Please enter the same password as above.";
						 rpass.focus();
						 return false;
					 }
					 
				 }
    
    </script>
  </head>
    <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <?php    
	  include 'header.php';
	  ?>      
      <!--header end-->

      <!--sidebar start-->
       <?php    
	  include 'aside.php';
	  ?>  
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->	
				           <?php 
						   if(isset($_GET['err']))
						   {
							    $err = $_GET['err'];
						   }
						   else
						   {
							   $err = "";
						   }
            				?>
		   <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Add Admin
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form action="up.php" class="form-validate form-horizontal"  method="post" onSubmit="return final()">
                                  <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">Full name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="fullname" name="fullname" type="text" onChange="return validfname()" />
                                              <div id="tfname"  class="required"></div>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="email" name="email" type="email" onBlur="return email()" />
                                              <div id="temail" class="required"></div>
                                          </div>
                                      </div>
                                    
                                   
                                      <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2">New Password <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control"  id="password" name="password" type="password" onChange="return npass()"/>
                                              <div id="pass" class="required"></div>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="confirm_password" class="control-label col-lg-2">Confirm New Password <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="confirm_password" name="confirm_password" type="password" onChange="return rpass()"/>
                                              <div id="cpass" class="required"></div>
                                          </div>
                                      </div>
                                     
                                     
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit" name="admin">Save</button>
                                              <button class="btn btn-default" type="reset">Reset</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>


          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    
	 <script src="../Social/js/jquery.js"></script>
    <script src="../Social/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../Social/js/jquery.scrollTo.min.js"></script>
    <script src="../Social/js/jquery.nicescroll.js" type="text/javascript"></script>
     <!-- jquery validate js -->
    <script type="text/javascript" src="../Social/js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="../Social/js/form-validation-script.js"></script>
    <!--custome script for all page-->
    <script src="../Social/js/scripts.js"></script>

   

  </body>
</html>
