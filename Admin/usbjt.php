
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>home</title>

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
                      

  </head>
    <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <?php    
	  include 'header.php';
	  ?>      
      <!--header end-->
		<?php
		if(isset($_POST['updt']))
		{
			$id = $_POST['id'];
			$name = $_POST['subj'];
			$sql = "UPDATE `subjects` SET `sb_name`='$name' WHERE `sb_id`=".$id;
			$mydb->setQuery($sql);
			$mydb->update();
			if($mydb->uaffected_rows()==1)
			{
				header("location:viewsubject.php");
				
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
                <form method="post" action="usbjt.php" class="form">
               <div class="form-group">
                                        <label class="col-lg-2"  for="subj">Subject :</label>
                                        <div class="col-lg-10">
                                        <input type="hidden" name="id" value="<?php echo $_GET['id'];  ?>">
                                          <input type="text" name="subj" id="subj" value="<?php echo $_GET['name']; ?>" class="input-lg">
                  </div>
                  </div>                
					<div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                          <button class="btn btn-primary" name="updt" type="submit">Update</button>
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
    
	 <script src="../Social/js/jquery.js"></script>
    <script src="../Social/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../Social/js/jquery.scrollTo.min.js"></script>
    <script src="../Social/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
    <!--custome script for all page-->
    <script src="../Social/js/scripts.js"></script>

   

  </body>
</html>
