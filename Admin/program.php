
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
if(isset($_POST['sb']))
{
	$pro = $_POST['pro'];
	$limit = $_POST['sem'];
	$sql = "INSERT INTO `program`( `p_name`) VALUES ('$pro')";
	$mydb->setQuery($sql);
	$mydb->insert();
	$id = $mydb->insert_id();
	$arr  = array("1st","2nd","3rd","4th","5th","6th","7th","8th");
	for($i=0; $i<$limit; $i++)
	{
		$sql = "INSERT INTO `semester`(`s_name`, `p_id`) VALUES ('$arr[$i]','$id')";
		$mydb->setQuery($sql);
		$mydb->insert();
	}
	header("location:home.php");
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
					var firstname = document.getElementById('pro');
					var fnam=/^[a-zA-Z]{3,15}$/;
					if(firstname.value.search(fnam)==-1)
					{
						 alert('please fill all field');
						 return false;
					 }
				}
				</script>
                <form method="post" action="program.php" class="form" onSubmit="return valid();">
                <div class="form-group">
                       <label for="pro" class="control-label col-lg-2">program Name :</label>
                       <div class="col-lg-10">
                        <input type="text" name="pro" id="pro" class="form-control input-lg" placeholder="Program Name">
                        </div>
                 </div>
                 <br/>
                 <div class="form-group">
                   <label for="sem" class="control-label col-lg-2">Semesters :</label>
                      
                       <div class="col-lg-10">
                          <select name="sem" id="sem" class="form-control input-lg">
                          <option value="4">4</option>
                          <option value="8">8</option>
                       </select>
                       </div>
                  </div>
					<div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                          <button class="btn btn-primary" name="sb" type="submit">Save</button>
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
