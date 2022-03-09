<div class="well">
				<div class="row">
				<div class="col-md-12">

				
					<?php
					$user = $user = $us->username($sid);
					global $mydb;
					$sql = "SELECT `post_id`, `user_id`, `post_text`, `Author`, `post_time`, `priority` FROM `user_post` where user_id=".$sid." ORDER BY post_id DESC";
					$mydb->setQuery($sql);
					$cur = $mydb->loadResultList();
					foreach ($cur as $comm){
						$ouser = $user = $us->username($sid);
					echo ' <div class="act-time">                                      
							  <div class="activity-body act-in">
							  <span class="arrow"></span>
							 <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
<ul>
<li  class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                      
                            <li>
                                <a href="delete_post.php?id='.$comm->user_id.'&pid='.$comm->post_id.'&page=wall"  >
                                <p class="text-center">
                                 <strong> Delete</strong>
                                 </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    </ul>
                    </div>
							  <div class="text">
							  <a href=href="profile.php?id='.$sid.'" class="activity-img"><img class="avatar" src="'.$pc->profile($sid,$ouser).'" alt=""></a>
							  <p class="attribution"><a href="profile.php?id='.$sid.'">'.$comm->Author.'</a>'.date_toText($comm->post_time);  
							 
							 echo '
							  </p>
							  <p style="margin-left:15px;">'.$comm->post_text.'
									</p>
									
							  </div>';
							  //which button should like and unlike
							    // to get total like for that post
							
							   // to get total comment for target post
							   $mydb->setQuery("SELECT * FROM `user_post_comment` WHERE `post_id` = ".$comm->post_id);
							   $mydb->selection();
							   $ttlcmnt = $mydb->rowcount();
							   // to get like status was able for user
							   
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
							  <a href=href="profile.php?id='.$subcomm->user_id.'" class="activity-img"><img class="avatar" src="'.$pc->profile($subcomm->user_id,$user).'" alt=""></a>
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
