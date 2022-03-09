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
            function cnfirm()
            {
                var r = confirm('Are you sure to Delete');
                return r;
            }
        </script>
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
		var val = document.getElementById('an').value;
		alert(val);
		if(val=="")
		{
			alert('please write some answer first');
			return false;	
		}
		
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
                                <form action="edit_ppost.php"   method="post">
								<input type="hidden" name="pid" value="'.$sub.'">
<input type="submit" class="btn btn-success" name="pdt" value="Update"></strong>
</form></center>
                            </li>
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
                    </div>';
							 }
							 echo '
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
							   $que = "SELECT * FROM `common_topic_status` WHERE `c_id`=$rid and status='like'";
							   $mydb->setQuery($que);
							   $mydb->selection();
							   $count = $mydb->rowcount();
							   // to get total unlike for that post
							   $que = "SELECT * FROM `common_topic_status` WHERE (`c_id`=$rid and status='unlike')";
							   $mydb->setQuery($que);
							   $mydb->selection();
							   $ucount = $mydb->rowcount();
							   // to get like status was able for user
							   $que = "SELECT * FROM `common_topic_status` WHERE (user_id=$ssid and status='like' and c_id=$rid)";
							   $mydb->setQuery($que);
							   $mydb->selection();
							   $user = $mydb->rowcount();
							   // to get unlike status was able for user
							   $que = "SELECT * FROM `common_topic_status` WHERE (user_id=$ssid and status='unlike' and c_id=$rid)";
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
                                <form action="edit_pcomm.php" method="post">
								<input type="hidden" name="pid" value="'.$sub.'">
								<input type="hidden" name="cid" value="'.$rid.'">
<input type="submit" class="btn btn-success" name="pdt" value="Update"></strong>
</form></center>
                            </li>
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
                    </div>';
							 }
							 echo '
							  <div class="text">
							   <a href=href="profile.php?id='.$uid.'" class="activity-img"><img class="avatar" src="'.$path.'" alt=""></a>
                                                      <p class="attribution"><a href="profile.php?id='.$uid.'">'.$full.'</a>'.date_toText($time).'</p>
							   
									<p>'.$comm.'</p>
							   </div>
							   <span class="text-center">';
							   if($user==1)
							   {
								   echo '
							   <a href="prolike.php?lid='.$rid.'&id='.$sub.'" class=" btn disabled"><button  class="btn btn-default disabled">Like '.$count.'</button></a>';
							   }
							   else
							   {
								    echo '
							   <a href="prolike.php?lid='.$rid.'&id='.$sub.'"><button  class="btn btn-default disabled">Like '.$count.'</button></a>';
							   }
							    if($unser>0)
							   {
								   echo '<a href="proulike.php?lid='.$rid.'&id='.$sub.'" class="btn disabled"><button  class="btn btn-default disabled">Unlike '.$ucount.'</button></a>';
							   }
							   else
							   {
								    echo '<a href="proulike.php?lid='.$rid.'&id='.$sub.'"><button  class="btn btn-default disabled">Unlike '.$ucount.'</button></a>';
							   }
							   
							   echo '
							    <a href="prodownload.php?cid='.$rid.'&qid='.$sub.'"><button class="btn btn-default">Download</button></a>
							   </span>
							     
                                              </div>
                                          </div>
							   
							   ';
						   }
						   
						   echo '
						      <div class="form" style="padding:2%;">
                                          <form action="proanswer.php" class="form-horizontal" method="post" onSubmit="return valid()">
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
