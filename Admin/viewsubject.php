
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
                                  <th>program </th>
                                  <th>Semester </th>
                                  <th> Subject</th>
                                  <th>View Subjects Post</th>
                                  <th>Update Subjects</th>
                                  <th>Delete Subjects</th>
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
							  $sql = "SELECT * FROM `program`";
							  $mydb->setQuery($sql);
							  $cur = $mydb->loadResultList();
							  foreach($cur as  $pro)
							  {
								  $pname = $pro->p_name;
								  $pid = $pro->p_id;
								  $sql1 = "SELECT * FROM `semester` WHERE `p_id`=".$pid;
								  $mydb->setQuery($sql1);
								  $cur1 = $mydb->loadResultList();
								  foreach($cur1 as  $sem)
								  {							  
									  $sid = $sem->s_id;
									  $sname = $sem->s_name;
									  $sql2 = "SELECT `sb_id`, `sb_name`  FROM `subjects` WHERE `s_id`=".$sid;
									  $mydb->setQuery($sql2);
									  $cur2 = $mydb->loadResultList();
									  
									  foreach($cur2 as  $sub)
									  {							  
										  $sbid = $sub->sb_id;
										  $sbname = $sub->sb_name;
										  $i++;
										  echo "
												<tr>
												  <td> $i </td>
												  <td> $pname </td>
												  <td> $sname </td>
												  <td> $sbname </td>
												  <td> <a class=\" btn btn-success \" href=\" book.php?subject=$sbname \" ><i>View</i> </a> </td>
												   <td> <a class= \" btn btn-primary \" href=\" usbjt.php?id=$sbid&name=$sbname \" > <i >Update</i> </a> </td>
												   <td>
												   <div class=\" btn-group \" align=\"center\">
                                      
                                      					<form action=\" dsbjt.php?id=$sbid \" onSubmit=\"return cnfirm();\" ><input type=\"submit\" class=\" btn btn-danger \" value=\"Delete \" /></form> 
                                 					 </div>
												   </td>
												</tr>";
							  		}
							
							  }
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
<!--

for 
<a class= \" btn btn-primary \" href=\"# \"><i class=\" icon_plus_alt2 \"></i></a>
                                      <a class=\" btn btn-success \" href=\"# \"><i class=\" icon_check_alt2 \"></i></a>
                                      
                                      for add and approve data
                                      -->
