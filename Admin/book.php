<!DOCTYPE html>
<html lang="en">
  <head>
    

    <title><?php echo $_GET['subject'];  ?></title>

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
                  <!--
                  <div class="col-lg-6 col-lg-push-6">
                      <section class="panel">                        
                        <header class="panel-heading">
                              Informatiom from your teacher
                          </header>
                      <h4>this part reserve for teacher. where there tell something about any topic to students.
                      teacher can upload books slides or any other type helping matrial.


                  </div>
                  
				<div class="col-lg-6 col-lg-pull-6">
                -->
                
                      <!--notification start-->
                      <div class="col-lg-12" >
                      <section class="panel">
                          <header class="panel-heading">
                            Student Questions
                          </header>
						
                                      
                                  
                               
                 
            <!-- there was Questions Area Started-->
                                   
                 
                                     <?php
									  $sub = $_GET['subject'];
						   $sql = "SELECT * FROM `related_topic` WHERE subject='$sub'";
						  $mydb->setQuery($sql);
						  $cur = $mydb->loadResultList();
						 foreach ($cur as $commt)
						  {
							  $uid = $commt->user_id;
							  $time = $commt->time;
							  $id = $commt->t_id;
							  $question = $commt->discription;
							  $full = $us->fullname($uid);
							  $path = $pc->profile($uid,$us->username($uid));
							   // to get total answer for target post
							  // echo "SELECT * FROM `related_topic_comment` WHERE `t_id`".$id;
							   $mydb->setQuery("SELECT * FROM `related_topic_comment` WHERE `t_id`=".$id);
							   $mydb->selection();
							   $ttlansr = $mydb->rowcount();
							    echo '
							   <div class="row"><div class="col-lg-12">
							      <div class="act-time">                                      
							  <div class="activity-body act-in">
							 <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
<ul>
<li  class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                          
                            <li>
                                <center>
                                <form action="delete_rpost.php"  onSubmit="return cnfirm()"  method="post">
								<input type="hidden" name="pid" value="'.$id.'">
								<input type="hidden" name="sub" value="'.$sub.'">
<input type="submit" class="btn btn-danger" name="dlt" value="Delete">
</form>
 
                                    </center>
                            </li>
                        </ul>
                    </li>
                    </ul>
                    </div>
							  <div class="text">
							   <a href=href="profile.php?id='.$uid.'" class="activity-img"><img class="avatar" src="'.$path.'" alt=""></a>
                                                      <p class="attribution"><a href="profile.php?id='.$uid.'">'.$full.'</a>'.date_toText($time).'</p>
							   
									<p style="margin-left:15px;">'.$question.'<br>
									 <a href="detail.php?id='.$id.'" ><button  class="btn btn-default">Answer '.$ttlansr.'</button></a>
									
									</div></div></div>
									
							  '; 
							 
						   $sql = "SELECT `rtc_id`, `t_id`, `user_id`, `comment` FROM `related_topic_comment` WHERE t_id=$id order by `rtc_id` DESC LIMIT 2";
						   $mydb->setQuery($sql);
						  $cur = $mydb->loadResultList();
						  echo ' <div class="row"><div class="col-lg-1"></div><div class="col-lg-11">';
						 foreach ($cur as $subcommt)
						   {
							   $rid = $subcommt->rtc_id;
							   $uid = $subcommt->user_id;
							   $comm = substr($subcommt->comment,0,200);
							   $full = $us->fullname($uid);
							   $path = $pc->profile($uid,$us->username($uid));
							  echo '
							
							    <div class="act-time">                                      
							  <div class="activity-body act-in">
							  <span class="arrow"></span>
							  <div class="text">
							   <a href=href="profile.php?id='.$uid.'" class="activity-img"><img class="avatar" src="'.$path.'" alt=""></a>
                                                      <p class="attribution"><a href="profile.php?id='.$uid.'">'.$full.'</a>'.date_toText($time).'</p>
							   
									<p style="margin-left:15px;">'.$comm.'...
									</p> ; 
									</div>
									</div>
									</div>
									';
									/*
									Link for detail page
									<a href="detail.php?id='.$id.'">Read More...</a>
									*/
						   } 
						 /*  echo '<div class="form">
                                          <form action="book.php?subject='.$sub.'" class="form-horizontal" method="post">
                                              <div class="form-group">
                                                  <label class="control-label col-sm-2 col-lg-1">Answer :</label>
                                                  <div class="col-sm-10 col-lg-11">
                                                      <textarea class="form-control" name="ans" rows="6"></textarea>
                                                      <input type="hidden" name="qid" value="'.$id.'">
                                                      <input type="hidden" name="uid" value="'.$ssid.'">
													   <div class="form-group" style=" margin-left:10px;">
                                              <button type="submit" name="answer" class="btn btn-info">Publish</button>
                                                  </div>
                                              </div>
                                             
                                              </div>
                                          </form>
                                      </div>*/
									 echo '
									</div></div>
									  ';
						  }
						  
							   ?>    
                               
                 
        
			<!-- there was Questions Area Ended-->
                      
                  </div>
              </div>
              
          </section>
         
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
   
    <!-- custom gritter script for this page only-->
    <script src="../Social/js/gritter.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="../Social/js/scripts.js"></script>

    


  </body>
</html>
