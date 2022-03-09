  <?php 
	include '../class/dp.php';
	include '../class/user.php';
	
	session_start();
	$mid = $_GET['mid'];
	$sid = $_SESSION['id'];
	$uname = $_SESSION['unmae'];
				   //   $sql = "select * from $uname where (to_id=$mid and from_id=$sid) or (from_id=$mid and to_id=$sid) ORDER BY Msg_ID DESC";
					 
					  $sql = "select * from message where (to_id=$mid and from_id=$sid) or (from_id=$mid and to_id=$sid) ORDER BY Msg_ID DESC";
					  $mydb->setQuery($sql);
					  $result=$mydb->selection();
					  
					  while($row=$result->fetch())
					  {
						  $withid = $row->with_id;
						  $tid=$row->to_id;
						  $tname=$row->to_name;
						  $fid=$row->from_id;
						  $fname=$row->from_name;
						  $Msg=$row->Msg;
						  $user =  $us->username($fid);
						  $path = $pc->profile($fid,$user);
						  $Date=$row->date;
					  if($sid==$tid) //if($withid!=$tid)
					  	{
							echo '
                      <!-- Chat by other. Use the class "by-other". -->
                      <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                          <img src="'.$path.'" alt="" width="35" height="35" />
                        </div>

                        <div class="chat-content">
                          <!-- In the chat meta, first include "time" then "name" -->
                          <div class="chat-meta">'.date_toText($Date).'<span class="pull-right">'.$fname.'</span></div>
                         '.$Msg.'
                          <div class="clearfix"></div>
                        </div>
                      </li>   ';
						}
						else
						 {
						  echo '
                      <li class="by-me">
                        <!-- Use the class "pull-left" in avatar -->
                        <div class="avatar pull-left">
                          <img src="'.$path.'" alt="" width="35" height="35" /><!-- this is my image-->
                        </div>

                        <div class="chat-content">
                          <!-- In meta area, first include "name" and then "time" -->
                          <div class="chat-meta">'.$fname.' <span class="pull-right">'.date_toText($Date).'</span></div>
                          '.$Msg.'
                          <div class="clearfix"></div>
                        </div>
                      </li> ';
					  }
					  }
					  $sql = "Update message set status='seen' where ((to_id=$mid and from_id=$sid) or (from_id=$mid and to_id=$sid))";
					  $mydb->setQuery($sql);
					  $mydb->update();
?>
                                                                                                  
