      <?php
							//include '../db/database.php';
							include '../class/dp.php';
							include '../class/user.php';
							session_start();
							$uname = $_SESSION['unmae'];
							$sid = $_SESSION['id'];
							                     
						$myq = "SELECT DISTINCT with_id,Msg_ID FROM message where status='send' ORDER BY Msg_ID DESC";
							$mydb->setQuery($myq);
							$res=$mydb->selection();
							$count = $mydb->rowCount();
							echo $count;