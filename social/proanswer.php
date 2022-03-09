<?php
include '../db/database.php';
if(isset($_POST['answer']))
{
		 $ans = $_POST['ans'];
		 $qid = $_POST['qid'];
		 $uid = $_POST['uid'];
		// $sb = $_POST['sub'];
		 
		// $created =  strftime("%Y-%m-%d %H:%M:%S", time());
		
		
			global $mydb;
			$mydb->setQuery("INSERT INTO `common_topic_comment`(`c_id`, `cp_id`, `user_id`, `comment`) VALUES (NULL,$qid,$uid,'$ans')");
			$mydb->insert();
			
			if ($mydb->idaffected_rows()== 1) {
				
				header("location:prodetail.php?id=$qid&sub=$sb");
						
				
			} else{
				echo "<script type=\"text/javascript\">
							alert(\"Comment creation Failed!\");
						</script>";
			}
}