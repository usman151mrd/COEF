  <script>
					  function valid()
					  {
						  var val = document.getElementById('post').value;
						  if(val=='')
						  {
							  alert('You can not Insert Empty post');
							  return false;
						  }
					  }
					  
					  </script>
<div class="well">
				<div class="row">
				<div class="col-md-12">
                <?php if($sid==$_SESSION['id'])
									{
										echo '
					<div class="panel-group" id="accordion">
					  <div class="panel panel-primary">
						<div class="panel-heading">
						  <h5 class="panel-heading">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" title="Whats on your mind?">
							 Update Status
							</a>
							</h5>
						</div>
						
						<form action="ipost.php" method="POST" onSubmit="return valid();">
						<div id="collapseOne" class="panel-collapse collapse">
						  <div class="panel-body">
							<input type="hidden" name="user_id" value="'.$sid.'">
							<input type="hidden" name="author" value="'.$full.'">
							<textarea class="form-control input-sm" name="content" id="post" placeholder="Whats on your mind?"></textarea>
								
						</div>
						<div class="panel-footer" align="right">
							<button class="btn btn-primary btn-sm" type="submit" name="share">Share</button>
						</div>
						</div>
						</form>
					  </div>
					</div>	
                    ';
                    }
                    ?>
				
					<?php
					$user = $user = $us->username($sid);
					global $mydb;
					$sql = "SELECT * FROM `user_post` where user_id=".$sid." ORDER BY post_id DESC";
					$mydb->setQuery($sql);
					$cur = $mydb->loadResultList();
					foreach ($cur as $comm){
						$ouser = $user = $us->username($sid);
					echo ' <div class="act-time">                                      
							  <div class="activity-body act-in">
							  <span class="arrow"></span>
							  ';
							  if($sid == $ssid)
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
                                <form action="edit_upost.php"   method="post">
								<input type="hidden" name="id" value="'.$comm->user_id.'">
								<input type="hidden" name="pid" value="'.$comm->post_id.'">
<input type="submit" class="btn btn-success" name="pdt" value="Update">
</form></center>
                            </li>
                            <li>
                                <center>
                                <form action="delete_post.php"   method="post" onSubmit="return cnfirm();">
								<input type="hidden" name="id" value="'.$comm->user_id.'">
								<input type="hidden" name="pid" value="'.$comm->post_id.'">
<input type="submit" class="btn btn-danger" name="dlt" value="Delete">
</form></center>
                            </li>
                        </ul>
                    </li>
                    </ul>
                    </div>';
							 }
							  //id='.$comm->user_id.'&pid='.$comm->post_id. // ?id='.$comm->user_id.'&pid='.$comm->post_id.'&page=wall"
							  
							  echo '
							  <div class="text">
							  <a href="profile.php?id='.$sid.'" class="activity-img"><img class="avatar" src="'.$pc->profile($sid,$ouser).'" alt=""></a>
							  <p class="attribution"><a href="profile.php?id='.$sid.'">'.$comm->Author.'</a>'.date_toText($comm->post_time);  
							 
							 echo '
							  </p>
							  <p style="margin-left:15px;">'.$comm->post_text.'
									</p>
									
							  </div>';
							  //which button should like and unlike
							    // to get total like for that post
							   $que = "SELECT * FROM `user_post_status` WHERE `post_id`=$comm->post_id AND `status`='like'";
							   
							   $mydb->setQuery($que);
							   $mydb->selection();
							   $count = $mydb->rowcount();
							   // to get total unlike for that post
							   $que = "SELECT * FROM `user_post_status` WHERE `post_id`=$comm->post_id AND `status`='unlike'";
							   $mydb->setQuery($que);
							   $mydb->selection();
							   $ucount = $mydb->rowcount();
							   // to get total comment for target post
							   $mydb->setQuery("SELECT * FROM `user_post_comment` WHERE `post_id` = ".$comm->post_id);
							   $mydb->selection();
							   $ttlcmnt = $mydb->rowcount();
							   // to get like status was able for user
							   $que = "SELECT * FROM user_post_status WHERE `post_id`=$comm->post_id AND  `status`='like' AND`user_id`=$comm->user_id";
							   $mydb->setQuery($que);
							   $mydb->selection();
							   $user = $mydb->rowcount();
							   // to get unlike status was able for user
							   $que = "SELECT * FROM user_post_status WHERE `post_id`=$comm->post_id AND   `status`='unlike' AND`user_id`=$comm->user_id";
							   $mydb->setQuery($que);
							   $mydb->selection();
							   $unser = $mydb->rowcount();
							   //
							   
							  // start button code
						echo ' <span class="text-center" style="margin-left:10px;">';
							   if($user==1)
							   {
								   echo '
							   <a href="ulike.php?lid='.$comm->post_id.'&id='.$comm->user_id.'&page=wall" class="btn disabled"><button  class="btn btn-default">Like '.$count.'</button></a>';
							   }
							   else
							   {
								    echo '
							  <a href="ulike.php?lid='.$comm->post_id.'&id='.$comm->user_id.'&page=wall"><button  class="btn btn-default">Like '.$count.'</button></a>';
							   }
							    if($unser>0)
							   {
								   echo '<a href="unlike.php?lid='.$comm->post_id.'&id='.$comm->user_id.'&page=wall" class="btn disabled"><button  class="btn btn-default">unlike '.$ucount.'</button></a>';
							   }
							   else
							   {
								    echo '<a href="unlike.php?lid='.$comm->post_id.'&id='.$comm->user_id.'&page=wall" ><button  class="btn btn-default">unlike '.$ucount.'</button></a>';
							   }
							   echo '<a href="profile.php?lid='.$comm->post_id.'&id='.$sid.'&page=comment" ><button  class="btn btn-default">Comment '.$ttlcmnt.'</button></a>';
							   
							   echo '
							    </span>';
						echo '
									</div>';
					/* this area is for listing of sub-comment*/
						  echo ' <div class="row"><div class="col-lg-1"></div><div class="col-lg-11">';
						$mydb->setQuery("SELECT * FROM `user_post_comment` WHERE `post_id` = ".$comm->post_id." ORDER BY post_id DESC LIMIT 2");
						$sub = $mydb->loadResultList();
						foreach ($sub as $subcomm){
							$user = $user = $us->username($subcomm->user_id);
									echo '<div class="act-time">                                      
							  <div class="activity-body act-in">
							  <span class="arrow"></span>
							  <div class="text">
							  <a href="profile.php?id='.$subcomm->user_id.'" class="activity-img"><img class="avatar" src="'.$pc->profile($subcomm->user_id,$user).'" alt=""></a>
							  <p class="attribution"><a href="profile.php?id='.$subcomm->user_id.'">'.$subcomm->Author.'</a>'.date_toText($comm->post_time).'</p>
							  <p style="margin-left:15px;">'.$subcomm->comment.'
									</p>
								
									</div>
									</div>
									</div>
									
							  ';
													
																			
						} 
					
							//This area is for creating a new comment
							/*
									echo '<div class="act-time">                                      
							  <div class="activity-body act-in">
							  <span class="arrow"></span>
							  <div class="text">';
									echo '<form action="icomment.php?sid='.$sid.'" method="post">';
										echo '<input name="post_id" type="hidden" value="'.$comm->post_id.'">';
										echo '<input name="user_id" type="hidden" value="'.$ssid.'">';
										echo '<input name="subauthor" type="hidden" value="'. $us->fullname($ssid).'">';
										
											
											echo '<div class="row"><div class="col-lg-1"><a href=href="profile.php?id='.$sid.'" class="activity-img"><img class="avatar" src="'.$pc->profile($comm->user_id,$us->username($sid)).'" alt=""></a></div>';	
										
										
									echo '<div class="col-lg-11"><input name="subcontent" type="text" class="form-control input-sm" placeholder="Write a comment..."></div></div>';
									echo '</form>';
								
							//echo '</div>';
						
						End of New sub comment.
								*/				
						// this div for outer  
						echo  "</div></div></div>";
								
					}
					
					?>
						
		</div>
				
				</div>
			</div>
