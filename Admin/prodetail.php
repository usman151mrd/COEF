<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Detail</title>
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
	function cnfirm()
	{
		var r = confirm('Are you sure to Delete');
		return r;
	}
</script>
</head>
<body>

  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
       
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
    
              <div class="row">
				<div class="col-lg-12">
                      <!--notification start-->
                        <?php
						  $sub = $_GET['id'];
						  $sql = "SELECT * FROM `common_topic` WHERE cp_id='$sub'";
						  $mydb->setQuery($sql);
						    $cur = $mydb->loadResultList();
						   foreach ($cur as $comm)
						  {
							  
							  $uid = $comm->user_id;
							  $question = $comm->cp_text;
							  $ttime = $comm->cp_time;
							  $full = $us->fullname($uid);
							  $path = $pc->profile($uid,$us->username($uid));
							  echo '
							  <section class="panel">
                          
						  <div class="portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Question</div>
				    </div>
                <div class="panel-body">
							   <div class="row"><div class="col-lg-12">
							      <div class="act-time">                                      
							  <div class="activity-body act-in">
							  <span class="arrow"></span>
							  <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
<ul>
<li  class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                          
                            <li>
                                <center>
                                <form action="delete_ppost.php"  onSubmit="return cnfirm()"  method="post">
								<input type="hidden" name="pid" value="'.$sub.'">
<input type="submit" class="btn btn-danger" name="dlt" value="Delete"></strong>
</form></center>
                            </li>
                        </ul>
                    </li>
                    </ul>
                    </div>
							  <div class="text">
							  <a href=href="profile.php?id='.$uid.'" class="activity-img"><img class="avatar" src="'.$path.'" alt=""></a>
                                                      <p class="attribution"><a href="profile.php?id='.$uid.'">'.$full.'</a>'.date_toText($ttime).'</p>
							   
									<p style="margin-left:15px;">'.$question.'<br>
									 
									<p>&nbsp;</p>
									</div></div></div>
							   '; 
							   	// area for border
									echo '
             		 </div>
                  '; 
						 
						   echo '<div class="row"><div class="col-lg-1"></div><div class="col-lg-11">';
						   $sql = "SELECT * FROM `common_topic_comment` WHERE `cp_id`=$sub";
						   $mydb->setQuery($sql);
						   $cur = $mydb->loadResultList();
						   foreach ($cur as $row)
						   {
							   $rid = $row->c_id;
							   $uid = $row->user_id;
							   $time = $row->time;
							   $comm = $row->comment;
							   $full = $us->fullname($uid);
							   $path = $pc->profile($uid,$us->username($uid));
							   // to get total like for that post
							 
							
							   echo '
							   <div class="act-time">                                      
							  <div class="activity-body act-in">
							  <span class="arrow"></span>
							 <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
<ul>
<li  class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                        
                            <li>
                                <center>
                                <form action="delete_pans.php" onSubmit="return cnfirm()"  method="post">
								<input type="hidden" name="pid" value="'.$sub.'">
								<input type="hidden" name="cid" value="'.$rid.'">
<input type="submit" class="btn btn-danger" name="dlt" value="Delete"></strong>
</form></center>
                            </li>
                        </ul>
                    </li>
                    </ul>
                    </div>
							  <div class="text">
							   <a href=href="profile.php?id='.$uid.'" class="activity-img"><img class="avatar" src="'.$path.'" alt=""></a>
                                                      <p class="attribution"><a href="profile.php?id='.$uid.'">'.$full.'</a>'.date_toText($time).'</p>
							   
									<p>'.$comm.'</p>
							   
							   <span class="text-center" style="margin-left:10px;">';
						
							   
							   echo '
							    
							   </span>
							     </div>
                                              </div>
                                          </div>
							   
							   ';
						   }
						   
						 
						   
						   
						   echo '
									</div>
									</div>
             		 </div>
                            
                  </div>
              </div>
              
          </section>
									
									
									  '; 
						   }
						   ?>
                           </div>
                           </section>
                          </div>
                          </div>
                           <!-- php div and section -->
                                </div>
                          </section>   
            </div>
         
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
  <!-- javascripts -->
    <script src="../Social/js/jquery.js"></script>
    <script src="../Social/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../Social/js/jquery.scrollTo.min.js"></script>
    <script src="../Social/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
    <script type="text/javascript" src="../Social/assets/ckeditor/ckeditor.js"></script>
    <!-- custom gritter script for this page only-->
    <script src="../Social/js/gritter.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="../Social/js/scripts.js"></script>
  </body>
</html>
