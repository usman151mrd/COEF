
<!DOCTYPE html>
<html lang="en">
  <head>
    

    <title>Programming</title>

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
  
                      <!--notification start-->
                      <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            Student Questions
                          </header>
						  
                            
            
            
            <!-- there was Questions Area Started-->
                       
                         
                          <?php
						  $sub = $_GET['sid'];
						  
						  $sql = "SELECT * FROM `common_topic` WHERE `subject`='$sub'";
						  $mydb->setQuery($sql);
						  $cur = $mydb->loadResultList();
						 foreach ($cur as $comm)
						  {
							  $ouid = $comm->user_id;
							  $time = $comm->cp_time;
							  $id = $comm->cp_id;
							  $question = $comm->cp_text;
							  $full = $us->fullname($ouid);
							  $path = $pc->profile($ouid,$us->username($ouid));
							  //SELECT `c_id`, `ct_id`, `user_id`, `comment`, `time` FROM `common_topic_comment` WHERE `ct_id`=$id
							  $mydb->setQuery("SELECT * FROM `common_topic_comment` WHERE `c_id`=".$id);
							   $mydb->selection();
							   $ttlansr = $mydb->rowcount();
							    echo '
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
								<input type="hidden" name="pid" value="'.$id.'">
								<input type="hidden" name="sub" value="'.$sub.'">
<input type="submit" class="btn btn-danger" name="dlt" value="Delete"></strong>
</form></center>
						</li>
                        </ul>
                    </li>
                    </ul>
                    </div>
							  <div class="text">
							   <a href=href="profile.php?id='.$ouid.'" class="activity-img"><img class="avatar" src="'.$path.'" alt=""></a>
                                                      <p class="attribution"><a href="profile.php?id='.$ouid.'">'.$full.'</a>'.date_toText($time).'</p>
							   
									<p style="margin-left:15px;">'.$question.'<br>
									 <a href="prodetail.php?id='.$id.'" ><button class="btn btn-default">Answer '.$ttlansr.'</button></a>
									
									</div></div></div>
								
							  '; 
							 
						   $sql = "SELECT * FROM `common_topic_comment` WHERE `cp_id`=$id order by c_id DESC LIMIT 2";
						   $mydb->setQuery($sql);
						   $result=$mydb->loadResultList();
						    echo ' <div class="row"><div class="col-lg-1"></div><div class="col-lg-11">';
						   foreach ($result as $subcomm){
							   $rid = $subcomm->c_id;
							   $uid = $subcomm->user_id;
							   $ctime = $subcomm->time;
							   $comm = substr($subcomm->comment,0,100);
							   $full = $us->fullname($uid);
							   $path = $pc->profile($uid,$us->username($uid));
							  echo '
							    <div class="act-time">                                      
							  <div class="activity-body act-in">
							  <span class="arrow"></span>
							  <div class="text">
							   <a href=href="profile.php?id='.$uid.'" class="activity-img"><img class="avatar" src="'.$path.'" alt=""></a>
                                                      <p class="attribution"><a href="profile.php?id='.$uid.'">'.$full.'</a>'.date_toText($ctime).'</p>
							   
									<p style="margin-left:15px;">'.$comm.'...
									</p> ; 
									</div>
									</div>
									</div>
									';
						   } 
			
									   echo '
									</div></div>
									  ';
									  
						  }
						  
							   ?>
                              
							  
                                              
			<!-- there was Questions Area Ended-->
                      <!--pagination start
                      <section class="panel">
                          <div class="panel-body">
                              <div>
                                  <ul class="pagination pagination-lg">
                                      <li><a href="#">«</a></li>
                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#">4</a></li>
                                      <li><a href="#">5</a></li>
                                      <li><a href="#">»</a></li>
                                  </ul>
                              </div>
                           
                          </div>
                      </section>
                      
                      <!--pagination end-->
                      <!--gritter notification end-->

                  </div>
              </div>
              
          </section>
 </div>        
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->

    <!-- javascripts -->
    <script src="../social/js/jquery.js"></script>
    <script src="../social/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../social/js/jquery.scrollTo.min.js"></script>
    <script src="../social/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
   
    <!-- custom gritter script for this page only-->
    <script src="../social/js/gritter.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="../social/js/scripts.js"></script>

    


  </body>
</html>
