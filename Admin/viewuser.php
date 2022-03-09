
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
                                  <th>User Id </th>
                                  <th>User Name </th>
                                  <th>User Email </th>
                                  <th> Program</th>
                                  <th>Semester</th>
                                  <th>Geneder</th>
                                  <th>Date of Birth</th>
                                  <th>View User</th>
                                  <th>Delete User</th>
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
							  
							  $sql = "SELECT * FROM `registration`";
							  $mydb->setQuery($sql);
							  $cur = $mydb->loadResultList();
							  foreach($cur as  $user)
							  {
								  $sql1 = "SELECT  `p_name` FROM `program` WHERE `p_id`=".$user->user_program;
								  $mydb->setQuery($sql1);
								  $result = $mydb->selection();
								  $row = $result->fetch();
								  $program = $row->p_name;
								  $sql2 = "SELECT `s_name` FROM `semester` WHERE `s_id`=".$user->user_semester;
								  $mydb->setQuery($sql2);
								  $result = $mydb->selection();
								  $row = $result->fetch();
								  $semester = $row->s_name;
								  echo "
										<tr>
										  <td>$user->user_id </td>
										  <td> $user->user_fname $user->user_lname </td>
										  <td> $user->user_email </td>
										  <td> $program </td>
										  <td> $semester </td>
										  <td> $user->user_gender </td>
										  <td> $user->user_dob </td>
										  <td> <a class=\" btn btn-success \" href=\"profile.php?id=$user->user_id \" > <i>View</i> </a> </td>
										  <td> <form action=\" daccount.php?id=$user->user_id \" onSubmit=\"return cnfirm();\" ><input type=\"submit\" class=\" btn btn-danger \" value=\"Delete \" /></form> 
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
