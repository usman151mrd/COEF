
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
                      <script>
  // select semester according to program
function showUser(str)
{
if (str==0)
{
document.getElementById('Semester').innerHTML="<option>select one</option>";
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
xmlhttp.open("GET","../sem.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function txtbox(val)
{

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
document.getElementById('subject').innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","txtbox.php?q="+val,true);
xmlhttp.send();
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
				   
          <div class="row">
          	<div class="col-lg-12">
             	<section class="panel">
                <div class="panel-heading">
                Add Subject
                </div>
                <div class="panel-body">
                <form method="post" action="sbjt.php" class="form">
               <div class="form-group">
                                        <label class="col-lg-2"  for="form-department">Program :</label>
                                        <div class="col-lg-10">
			                        	<select name="program" class="form-control input-lg" id="program" onChange="showUser(this.value);">
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
			                         <div class="form-group">
                                        <label class="col-lg-2" for="form-semester">Semester :</label>
                                        <div class="col-lg-10">
			                        	<select name="semester" id="Semester" class="form-control input-lg">
                                        <option value="">select any semester</option>
                                       
                                        </select>
                                        </div>
                                    	</div>
                                        <div class="form-group">
                                        <label class="col-lg-2" for="sb">NO. of Subjects :</label>
                                        <div class="col-lg-10">
			                        	<select name="sb" id="sb" class="form-control input-lg" onChange="txtbox(this.value);">
                                        <option value="0">Number of subject</option>
                                       <?php
									   for($i=1; $i<=7; $i++)
									   echo '<option value="'.$i.'">'.$i.'</option>';
									   ?>
                                        </select>
                                        </div>
                                    	</div>
                                        <div id="subject">
                                        </div>
					<div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                          <button class="btn btn-primary" name="subjct" type="submit">Save</button>
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
