
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>home</title>

    <!-- Bootstrap CSS -->    
    <link href="../social/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../social/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../social/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../social/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../social/css/style.css" rel="stylesheet">
    <link href="../social/css/style-responsive.css" rel="stylesheet" />
                      

  </head>
    <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <?php    
	  include 'header.php';
	  ?>      
      <!--header end-->
		<?php
		if(isset($_POST['add']))
		{
			$name = $_POST['title'];
			$sql = "insert into `programming`(`pname`)  values('$name')";
			$mydb->setQuery($sql);
			$mydb->insert();
			if($mydb->idaffected_rows()==1)
			{
				header("location:vprosb.php");
				
			}
			else
			{
				echo "<script>alert('Oops !updation failed');</script>";
			}
		}
		?>
      <!--sidebar start-->
       <?php    
	  include 'aside.php';
	  ?>  
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->	
				   
          <div class="row">
          	<div class="col-lg-12">
             	<section class="panel">
                <div class="panel-heading">
                Add Subject
                </div>
                <div class="panel-body">
                    <script>
				function valid()
				{
					var firstname = document.getElementById('title');
					var fnam=/^[a-zA-Z]{3,15}$/;
					if(firstname.value.search(fnam)==-1)
					{
						 alert('please Enter A valid value');
						 return false;
					 }
				}
				</script>
                <form method="post" action="addtitle.php" class="form" onSubmit="return valid();">
               <div class="form-group">
                                        <label class="col-lg-2"  for="title">Subject :</label>
                                        <div class="col-lg-10">
                                          <input type="text" name="title" id="title" " class="input-lg">
                  </div>
                  </div>                
					<div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                          <button class="btn btn-primary" name="add" type="submit">Add</button>
                      </div>
                     </div>
                </form>
                
                
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
    
	 <script src="../social/js/jquery.js"></script>
    <script src="../social/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../social/js/jquery.scrollTo.min.js"></script>
    <script src="../social/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
    <!--custome script for all page-->
    <script src="../social/js/scripts.js"></script>

   

  </body>
</html>
