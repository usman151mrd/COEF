<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Detail</title>
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
       <script>
		function ajax1(){
		
		var req = new XMLHttpRequest();
		var mid = document.getElementById('mid').value;
		req.onreadystatechange = function(){
		
		if(req.readyState == 4 && req.status == 200){
		
		document.getElementById('headchat').innerHTML = req.responseText;
		} 
		}
		req.open('GET','headchat.php',true); 
		req.send();
		
		}
		setInterval(function(){ajax1()},1000);
	</script>
    <script>
	function validation()
	{
		var val = document.getElementById('ans').value;
		if(val=="")
		{
			alert('please write some answer first');
			return false;	
		}
		
	}
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
						  $sql = "SELECT * FROM `related_topic` WHERE t_id='$sub'";
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
							  ';
							    if($uid == $ssid)
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
                                <form action="edit_rpost.php"  method="post">
								<input type="hidden" name="pid" value="'.$id.'">
<input type="submit" class="btn btn-success" name="pdt" value="Update"></strong>
</form></center>
                            </li>
                            <li> 
                                   <center>
                                <form action="delete_rpost.php"  onSubmit="return cnfirm()"  method="post">
								<input type="hidden" name="pid" value="'.$id.'">
								<input type="hidden" name="sub" value="'.$sub.'">
<input type="submit" class="btn btn-danger" name="dlt" value="Delete"></strong>
</form>
 
                                    </center>
                            </li>
                        </ul>
                    </li>
                    </ul>
                    </div>';
							 }
							 echo '
							  <div class="text">
							   <a href=href="profile.php?id='.$uid.'" class="activity-img"><img class="avatar" src="'.$path.'" alt=""></a>
                                                      <p class="attribution"><a href="profile.php?id='.$uid.'">'.$full.'</a>'.date_toText($time).'</p>
							   
									<p style="margin-left:15px;">'.$question.'<br>
									 
									<p>&nbsp;</p><p>&nbsp;</p>
									</div></div></div>';
									// area for border
									echo '
             		 </div>
                  '; 
						   $sql = "SELECT `rtc_id`, `t_id`, `user_id`, `comment` FROM `related_topic_comment` WHERE t_id=$sub";
						   //start
						   $mydb->setQuery($sql);
						  $cur = $mydb->loadResultList();
						  echo '<div class="row"><div class="col-lg-1"></div><div class="col-lg-11">';
						 foreach ($cur as $subcommt)
						   {
							   $rid = $subcommt->rtc_id;
							   $uid = $subcommt->user_id;
							   $comm = $subcommt->comment;
							   $full = $us->fullname($uid);
							   $path = $pc->profile($uid,$us->username($uid));
						   
						   //end
							   // to get total like for that post
							   $que = "SELECT * FROM `related_topic_status` WHERE t_id=$rid and status='like'";
							   $mydb->setQuery($que);
							   $mydb->selection();
							   $count = $mydb->rowcount();
							   // to get total unlike for that post
							   $que = "SELECT * FROM `related_topic_status` WHERE (t_id=$rid and status='unlike')";
							   $mydb->setQuery($que);
							   $mydb->selection();
							   $ucount = $mydb->rowcount();
							   // to get like status was able for user
							   $que = "SELECT * FROM `related_topic_status` WHERE (user_id=$ssid and status='like' and t_id=$rid)";
							   $mydb->setQuery($que);
							   $mydb->selection();
							   $user = $mydb->rowcount();
							   // to get unlike status was able for user
							   $que = "SELECT * FROM `related_topic_status` WHERE (user_id=$ssid and status='unlike' and t_id=$rid)";
							   $mydb->setQuery($que);
							   $mydb->selection();
							   $unser = $mydb->rowcount();
							   echo '
							
							    <div class="act-time">                                      
							  <div class="activity-body act-in">
							  <span class="arrow"></span>
							   ';
							    if($uid == $ssid)
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
                                <form action="edit_rcomm.php"  method="post">
								<input type="hidden" name="pid" value="'.$id.'">
								<input type="hidden" name="cid" value="'.$rid.'">
<input type="submit" class="btn btn-success" name="pdt" value="Update"></strong>
</form></center>
                            </li>
                            <li>
                                   <center>
                                <form action="delete_rans.php"  onSubmit="return cnfirm()"  method="post">
								<input type="hidden" name="pid" value="'.$id.'">
								<input type="hidden" name="cid" value="'.$rid.'">
<input type="submit" class="btn btn-danger" name="dlt" value="Delete"></strong>
</form>
 
                                    </center>
                                
                            </li>
                        </ul>
                    </li>
                    </ul>
                    </div>';
							 }
							 echo '
							  <div class="text">
							   <a href=href="profile.php?id='.$uid.'" class="activity-img"><img class="avatar" src="'.$path.'" alt=""></a>
                                                      <p class="attribution"><a href="profile.php?id='.$uid.'">'.$full.'</a>'.date_toText($time).'</p>
							   
									<p style="margin-left:15px;">'.$comm.'
									</p> <p> &nbsp; </p> 
									
							   
							   <span class="text-center" style="margin-left:10px;">';
							   if($user==1)
							   {
								   echo '
							   <a href="rlike.php?lid='.$rid.'&id='.$id.'" class="btn disabled"><button  class="btn btn-default">Like '.$count.'</button></a>';
							   }
							   else
							   {
								    echo '
							   <a href="rlike.php?lid='.$rid.'&id='.$id.'"><button  class="btn btn-default">Like '.$count.'</button></a>';
							   }
							    if($unser>0)
							   {
								   echo '<a href="rulike.php?lid='.$rid.'&id='.$id.'" class="btn disabled"><button  class="btn btn-default">Unlike '.$ucount.'</button></a>';
							   }
							   else
							   {
								    echo '<a href="rulike.php?lid='.$rid.'&id='.$id.'"><button  class="btn btn-default">UnLike '.$ucount.'</button></a>';
							   }
							   
							   echo '
							    <a href="rdownload.php?cid='.$rid.'&qid='.$id.'"><button  class="btn btn-default">Download</button></a>
							   </span>
							   			</div>
							   		</div>
								</div>
							   
							   ';
						   }
						   
						   echo '
						      <div class="form" style="padding:2%;">
                                          <form action="ranswer.php" class="form-horizontal" method="post" onSubmit="return valid();">
                                              <div class="form-group">
                                                  <label class="control-label col-sm-2 col-lg-1">Answer :</label>
                                                  <div class="col-lg-10">
                                                      <textarea class="form-control" id="ans" name="ans"></textarea>
                                                      <input type="hidden" name="qid" value="'.$sub.'">
                                                      <input type="hidden" name="uid" value="'.$ssid.'">
                                                      <div align="right">
                                                      <button type="submit" name="answer" class="btn btn-info">Publish</button>
                                                      </div>
                                                  </div>
                                              </div>
                                              
                                              
                                             
                                          </form>
                                      </div>
						   
						   
						   ';
						   
						   
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
                            <script>
							  function valid()
							  {
								  var val = document.getElementById('ans').value;
								  if(val=='')
								  {
									  alert('You can not Insert Empty post');
									  return false;
								  }
							  }
					  
					  </script>
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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <!-- custom gritter script for this page only-->
    <script src="js/gritter.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
  </body>
</html>
