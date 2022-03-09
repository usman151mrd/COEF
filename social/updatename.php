
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Update Name</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
  </head>
  <script>
   function validfname()
				{
					var firstname = document.getElementById('fname');
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
					 var lastname = document.getElementById('lname');
					 var lnam=/^[a-zA-Z]{4,15}$/;
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
  				function final()
				{
					var firstname = document.getElementById('fname');
					var fnam=/^[a-zA-Z]{3,15}$/;
					var lastname = document.getElementById('lname');
					var lnam=/^[a-zA-Z]{4,15}$/;
					if(firstname.value.search(fnam)==-1)
					{
						 document.getElementById('tfname').innerHTML ="Please enter at least 3 characters";
						 firstname.focus();
						 return false;
					 }
					 if(lastname.value.search(lnam)==-1)
					 {
						 document.getElementById('tlname').innerHTML ="Please enter at least 3 characters";
						 lastname.focus();
						 return false;
					 }
				}
  
  
  </script>
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
				   $row = $us->userdata($ssid);
		?>        
            
		   <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            Update Name
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal "  method="post" action="uname.php" onSubmit="return final();">
                                    <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">First Name  <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                                  <input class=" form-control" id="fname" name="fname" type="text" value="<?php echo $row->user_fname; ?>" onChange="return validfname();" />
                                                  <div class="required" id="tfname"></div>
                                          </div>
                                      </div>
                                     <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                                  <input class=" form-control" id="lname" name="lname" type="text" value="<?php echo $row->user_lname; ?>" onChange="return validlname();" />
                                                  <div class="required" id="tlname"></div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" name="submit" type="submit">Save</button>
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
    
	 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
     <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>

   

  </body>
</html>
