<?php
include '../db/database.php';
if(isset($_POST['answer']))
{
		echo $ans = $_POST['ans'];
		echo  $qid = $_POST['qid'];
		echo  $uid = $_POST['uid'];
		 
		// $created =  strftime("%Y-%m-%d %H:%M:%S", time());
		
		
			global $mydb;
			$mydb->setQuery("INSERT INTO `related_topic_comment`( `t_id`, `user_id`, `comment`) VALUES ($qid,$uid,'$ans')");
			$mydb->insert();
			
			if ($mydb->idaffected_rows()== 1) {
				
				header("location:detail.php?id=$qid");
						
				
			} else{
				echo "<script type=\"text/javascript\">
							alert(\"Comment creation Failed!\");
						</script>";
			}
}