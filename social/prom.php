
<!DOCTYPE html>
<html lang="en">
  <head>
    

    <title>Programming</title>

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

    <script src="jquery-3.1.1.js"></script>
<script>
$(document).ready(function(e) {
	 $('#down').hide();
    $('#up').click(function()
	{
		 $('#up').hide();
		 $('#post').slideUp();
		 $('#down').show();
	}
	);
	  $('#down').click(function()
	{
		 $('#down').hide();
		 $('#post').slideDown();
		 $('#up').show();
	}
	
	);
});

</script>
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
		<?php
        	$sub = $_GET['sid'];

			
        ?>
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
						  <div class="portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">My Question</div>
                  <div class="widget-icons pull-right">
                    <span class="wminimize" id="up"><i class="fa fa-chevron-up"></i> </span>
                    <span class="wminimize" id="down"><i class="fa fa-chevron-down"></i></span> 
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body" id="post">
                  <div class="padd">
                    
                      <div class="form quick-post">
                                      <!-- Edit profile form (not working)-->
                                        <script>
					  function valid()
					  {
						  var val = document.getElementById('content').value;
						  if(val=='')
						  {
							  alert('You can not Insert Empty post');
							  return false;
						  }
					  }
					  
					  </script>
                                      <form class="form-horizontal" method="post" action="prom.php?sid=<?php echo $_GET['sid']; ?>" onSubmit="return valid();">
                                           <!-- Cateogry -->
                                                      
                                          <!-- Tags -->
                                          <!-- Content -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="content">Question:</label>
                                            <div class="col-lg-10">
                                              <textarea class="form-control" name="qstn" id="content"></textarea>
                                            </div>
                                          </div>                           
                                          
                                          
                                          <!-- Buttons -->
                                          <div class="form-group">
                                             <!-- Buttons -->
											 <div class="col-lg-offset-2 col-lg-9">
												<button type="submit" name="sbjt" class="btn btn-info" >Publish</button>
												<button type="reset" class="btn btn-default">Reset</button>
											 </div>
                                          </div>
                                      </form>
                                      <?php
									  if(isset($_POST['sbjt']))
									  {
										  $sub = $_GET['sid'];
										  $qstn = $_POST['qstn'];
										  
									  $sql = "INSERT INTO `common_topic`(`cp_id`, `user_id`, `cp_text`,subject) VALUES (NULL,$ssid,'$qstn','$sub');";					
									  $mydb->setQuery($sql);
									  $mydb->insert();
									  }
									?>
                                    </div>
                                  

                  

                  
              
            </div>
            </div>
            
            
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
							  $mydb->setQuery("SELECT * FROM `common_topic_comment` WHERE `cp_id`=".$id);
							   $mydb->selection();
							   $ttlansr = $mydb->rowcount();
							    echo '
							   <div class="row"><div class="col-lg-12">
							      <div class="act-time">                                      
							  <div class="activity-body act-in">
							  <span class="arrow"></span>
							  ';
							    if($ouid == $ssid)
							 {
								 echo 
							  '<div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
<ul>
<li  class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                          <li>
                                <center>
                                <form action="edit_ppost.php"   method="post">
								<input type="hidden" name="pid" value="'.$id.'">
<input type="submit" class="btn btn-success" name="pdt" value="Update"></strong>
</form></center>
                            </li>
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
                    </div>';
							 }
							 
							 echo '
							  <div class="text">
							   <a href="profile.php?id='.$ouid.'" class="activity-img"><img class="avatar" src="'.$path.'" alt=""></a>
                                                      <p class="attribution"><a href="profile.php?id='.$ouid.'">'.$full.'</a>'.date_toText($time).'</p>
							   
									<p style="margin-left:15px;">'.$question.'<br>
									<p>&nbsp;</p>
									 <a href="prodetail.php?id='.$id.'&sub='.$sub .'"><button  class="btn btn-default">Answer '.$ttlansr.'</button></a>
									
									</div></div></div>
								
							  '; 
							 
						   $sql = "SELECT `c_id`, `cp_id`, `user_id`, `comment`, `time` FROM `common_topic_comment` WHERE `cp_id`=$id order by c_id DESC LIMIT 2";
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
							   <a href="profile.php?id='.$uid.'" class="activity-img"><img class="avatar" src="'.$path.'" alt=""></a>
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
                              
							  
                                              
	

                  </div>
              </div>
              
          </section>
 </div>        
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
   
    <!-- custom gritter script for this page only-->
    <script src="js/gritter.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>

    


  </body>
</html>
