<?php
if(isset($_POST['dlt']))
{
	require_once("../db/database.php");
	$sid = $_POST['id'];
	$pid = $_POST['pid'];
	$mydb->setQuery("DELETE FROM `user_post_comment` WHERE `c_id`=".$_POST['cid']);
	$mydb->delete();
	if($mydb->idaffected_rows() == 1){
	
		echo "<script type=\"text/javascript\">
			//alert(\"Comment Successfully deleted!.\");
			window.location='profile.php?lid=$pid&id=$sid&page=comment';
		</script>";
	}else{
		echo "<script>
			alert('Comment deleted failed!.');
			
			</script>";
		//	window.location='profile.php?lid=$lid&id=$sid&page=comment';
		
	
	}
}
?>