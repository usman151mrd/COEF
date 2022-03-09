<?php
session_start();
if(!isset($_SESSION['add_id']))
{
	header("location:index.php");
}
if(isset($_POST['dlt']))
{
	require_once("../db/database.php");
	$pid = $_POST['pid'];
	$cid = $_POST['cid'];
	//DELETE FROM `common_topic_status` WHERE `ct_id`
	$mydb->setQuery("DELETE FROM `common_topic_status` WHERE `c_id`=".$cid);
	$mydb->delete();
	$mydb->setQuery("DELETE FROM `common_topic_comment` WHERE `c_id`=".$cid);
	$mydb->delete();
	if($mydb->idaffected_rows() == 1){
	
		echo "<script type=\"text/javascript\">
			//alert(\"Comment Successfully deleted!.\");
			window.location='prodetail.php?id=$pid';
		</script>";
	}else{
		echo "<script>
			alert('Comment deleted failed!.');
			
			</script>";
		//	window.location='profile.php?lid=$lid&id=$sid&page=comment';
		
	
	}
}
?>