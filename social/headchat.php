  <?php
  include '../class/dp.php';
							include '../class/user.php';
							session_start();
							$uname = $_SESSION['unmae'];
							$sid = $_SESSION['id']; 
							
							//$myq = "SELECT DISTINCT with_id FROM $uname  ORDER BY Msg_ID DESC LIMIT 5";
							$myq = "SELECT DISTINCT with_id FROM message where with_id!=$sid  ORDER BY Msg_ID DESC LIMIT 5";
							$mydb->setQuery($myq);
							$res=$mydb->selection();
					while($rw = $res->fetch())
					{
						$ttid = $rw->with_id;
						
						//$sql = "select * from $uname where (to_id=$ttid and from_id=$sid) or (from_id=$ttid and to_id=$sid) ORDER BY Msg_ID DESC";
						$sql = "select * from message where (to_id=$ttid and from_id=$sid) or (from_id=$ttid and to_id=$sid) ORDER BY Msg_ID DESC";
						  $mydb->setQuery($sql);
						  $result=$mydb->selection();
						  $row=$result->fetch();
							  $tid=$row->to_id;
							  $tname=$row->to_name;
							  $fid=$row->from_id;
							  $fname=$row->from_name;
							  $Msg=substr($row->Msg,0,30);
							  $Date=$row->date;
							  $user =  $us->username($ttid);
							  $path = $pc->profile($ttid,$user);
						   if($tid!=$_SESSION['id'])
						   {
							   echo '
							   <li>
                                <a href="msg.php?mid='.$ttid.'">
                                    <span class="photo"><img alt="avatar" src="'.$path.'"></span>
                                    <span class="subject">
                                    <span class="from">'.$tname.'</span>
                                    <span class="time">'.formatDate($Date).'</span>
                                    </span>
                                    <span class="message">
                                       <b>You</b> : '.$Msg.'
                                    </span>
                                </a>
                            </li>
							';
						  }
							   else
							   {
									echo '
					      <li>
                                <a class="" href="msg.php?mid='.$ttid.'">
                                    <span class="photo"><img alt="avatar" src="'.$path.'"></span>
                                    <span class="subject">
                                    <span class="from">'.$fname.'</span>
                                    <span class="time">'.formatDate($Date).'</span>
                                    </span>
                                    <span class="message">
                                        '.$Msg.'
                                    </span>
                                </a>
                            </li>
							   
							   ';
							   }
					}
					?>