<div class="well">
				<div class="row">
				<div class="col-md-12">
                <?php if($sid==$_SESSION['id'])
									{
										echo '
					<div class="panel-group" id="accordion">
					  <div class="panel panel-primary">
						<div class="panel-heading">
						  <h5 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" title="Whats on your mind?">
							 Update Status
							</a>
							</h5>
						</div>
						
						<form action="ipost.php" method="POST">
						<div id="collapseOne" class="panel-collapse collapse">
						  <div class="panel-body">
							<input type="hidden" name="user_id" value="'.$sid.'">
							<input type="hidden" name="author" value="'.$full.'">
							<textarea class="form-control input-sm" name="content" placeholder="Whats on your mind?"></textarea>
								
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
					$sql = "SELECT `post_id`, `user_id`, `post_text`, `Author`, `post_time`, `priority` FROM `user_post` where user_id=".$sid." ORDER BY post_time DESC";
					$mydb->setQuery($sql);
					$cur = $mydb->loadResultList();
					
					echo '<div class="table-responsive">';
				

					echo '<table border="0" class="table table-hover" >';
				
					echo '<tr>';
					foreach ($cur as $comm){
					
							echo '<td rowspan="2"><img src="'.$pc->profile($comm->user_id,$user).'"  class="img-object" width="50px" height=60px" /></td>';	
						
						 
						echo '<td><strong><a href="profile.php?id='.$sid.'">'.$comm->Author.'</a></strong> ';		
						
						echo '<br/><div style="font-size: 0.9em" ><p align="left">'.$comm->post_text. '</p><a>comment </a><span class="text-right" style="float:right;">'.date_toText($comm->post_time).'</span></div>';
						echo '</td>';
						if($sid==$_SESSION['id'])
						{
						echo '<td><a href="delete_post.php?id='.$comm->user_id.'&pid='.$comm->post_id.'"><button type="button" class="close" aria-hidden="true">&times;</button></a></td>';
						}
						echo '</tr>';
					
						echo '<tr>';
				
						echo '<td>';
						echo '<table border="0">';
						
						/* this area is for listing of sub-comment*/
						$mydb->setQuery("SELECT * FROM `user_post_comment` WHERE `post_id` = ".$comm->post_id);
						$sub = $mydb->loadResultList();
						foreach ($sub as $subcomm){
									echo '<tr>';
										
										$user = $user = $us->username($sid);
													echo '<td><img src="'.$pc->profile($comm->user_id,$user).'" class="img-object" width="30px" height=40px" /></td>';	
												
												
										echo '<td><p><a href="profile.php?id='.$subcomm->user_id.'">
												'.$subcomm->Author.'</a>  '.$subcomm->comment .'</p><div style="font-size: 0.9em"><p>'.date_toText($subcomm->Time).'</p> </div></td>';
												if($sid==$_SESSION['id'])
												{
													//echo '<td><a href="delete_sub.php?id='.$subcomm->c_id.'"><button type="button" class="close" aria-hidden="true">&times;</button></a></td>';
										echo '<td> <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                             <b class="caret"></b>
                       		 </a>
                              <ul class="dropdown-menu extended logout">
                            
                           
                            <li>
                                <a href="#">delete</a>
                            </li>
                            <li>
                                <a href="#"> Edit</a>
                            </li>
                           
                        </ul></td>';
										 
												}
										echo '';
										echo '<tr>';
										echo '</tr>';
									echo '</tr>';				
																			
						} 
					
							//This area is for creating a new comment
							
									echo '<tr>';
									echo '<form action="icomment.php?sid='.$sid.'" method="post">';
										echo '<input name="post_id" type="hidden" value="'.$comm->post_id.'">';
										echo '<input name="user_id" type="hidden" value="'.$ssid.'">';
										echo '<input name="subauthor" type="hidden" value="'. $us->fullname($ssid).'">';
										
											
											echo '<td><img src="'.$pc->profile($comm->user_id,$us->username($sid)).'" class="img-object" width="30px" height=30px" /></td>';	
										
										
									echo '<td><input name="subcontent" type="text" style="width: 400px;" class="form-control input-sm" placeholder="Write a comment...">';
									echo '</form>';
								echo '</tr>';				
								echo '</table>';
							//echo '</div>';
						/*
						End of New sub comment.
						*/							
						echo '</div>';
					
						echo '</div>';//end of col-lg-6
						echo '</div>';//end of row
						echo '</div>';//end of well
						echo  '</tr>';
						
							
					}
					echo '</table>';
					?>
						
		</div>
				
				</div>
			</div>
