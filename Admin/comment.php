<?php
$postid = $_GET['lid'];
$page =  $_GET['page'];


?>
<div class="well">
				<div class="row">
				<div class="col-md-12">
               
				
					<?php
					$user = $user = $us->username($sid);
					global $mydb;
				    $sql = "SELECT `post_id`, `user_id`, `post_text`, `Author`, `post_time`, `priority` FROM `user_post` where post_id=".$postid;
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
						
							   
							   echo '
							    </span>';
						echo '
									</div>';
					/* this area is for listing of sub-comment*/
						  echo ' <div class="row"><div class="col-lg-1"></div><div class="col-lg-11">';
						$mydb->setQuery("SELECT * FROM `user_post_comment` WHERE `post_id` = ".$comm->post_id);
						$sub = $mydb->loadResultList();
						foreach ($sub as $subcomm){
							$user = $user = $us->username($subcomm->user_id);
									echo '<div class="act-time">                                      
							  <div class="activity-body act-in">
							  <span class="arrow"></span>
							 <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
<ul>
<li  class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                       
							
                            <li>
                                <a href="delete_sub.php?id='.$comm->user_id.'&pid='.$subcomm->c_id.'&lid='.$comm->post_id.'&cid='.$subcomm->c_id.'"  >
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
							  <a href=href="profile.php?id='.$subcomm->user_id.'" class="activity-img"><img class="avatar" src="'.$pc->profile($subcomm->user_id,$user).'" alt=""></a>
							  <p class="attribution"><a href="profile.php?id='.$subcomm->user_id.'">'.$subcomm->Author.'</a>'.date_toText($comm->post_time).'</p>
							  <p style="margin-left:15px;">'.$subcomm->comment.'
									</p>
									<p>&nbsp;</p>
								
									</div>
									</div>
									</div>
									
							  ';
													
																			
						} 
					
							//This area is for creating a new comment
							
							
								
							//echo '</div>';
						
					//	End of New sub comment.
												
						// this div for outer  
						echo  "</div></div></div>";
								
					}
					
					?>
						
		</div>
				
				</div>
			</div>
