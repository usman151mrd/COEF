
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
                          <header class="panel-heading">
                              Coef Users
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Serial No. </th>
                                  <th>Title </th>
                                   <th>View Title </th>
                                  <th>Update Title</th>
                                  <th>Delete Title</th>
                                </tr>
                              </thead>
                              <tbody>
                              <script>
								function cnfirm()
								{
									var r = confirm('Are you sure to Delete');
									return r;
								}
							</script>
                              <?php
							  $i = 0;
							
									  $sql2 = "SELECT `pid`, `pname` FROM `programming`";
									  $mydb->setQuery($sql2);
									  $cur2 = $mydb->loadResultList();
									  
									  foreach($cur2 as  $sub)
									  {							  
										  $pid = $sub->pid;
										  $pname = $sub->pname;
										  $i++;
										  echo "
												<tr>
												  <td> $i </td>
												  <td> $pname </td>
												  <td>
												  <a class=\" btn btn-success \" href=\"prom.php?sid=$pid \"><i>View</i></a>
												  </td>
												  <td> <a class= \" btn btn-primary \" href=\"utitle.php?id=$pid&name=$pname \"><i >Update</i></a> </td>
												  
												   <td>
												   <div class=\" btn-group \" align=\"center\">
                                      
                                      					<form action=\"dtitle.php?id=$pid\" onSubmit=\"return cnfirm();\" ><input type=\"submit\" class=\" btn btn-danger \" value=\"Delete \" /></form>
                                 					 </div>
												   </td>
												</tr>";
							  		}
							
							
									?>
                            
                              </tbody>
                            </table>
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
<!--

for 
<a class= \" btn btn-primary \" href=\"# \"><i class=\" icon_plus_alt2 \"></i></a>
                                      <a class=\" btn btn-success \" href=\"# \"><i class=\" icon_check_alt2 \"></i></a>
                                      
                                      for add and approve data
                                      -->
