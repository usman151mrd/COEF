<?php
if(isset($_POST['dlt']))
{
	
	$pid = $_POST['pid'];
	$cid = $_POST['cid'];
require_once("../db/database.php");
$mydb->setQuery("DELETE FROM `related_topic_status` WHERE `t_id`=".$cid);
	$mydb->delete();
$mydb->setQuery("DELETE FROM `related_topic_comment` WHERE `rtc_id`=".$cid);
$mydb->delete();
if($mydb->idaffected_rows() == 1){

	echo "<script type=\"text/javascript\">
		//alert(\"Comment Successfully deleted!.\");
		window.location='detail.php?id=$pid';
	</script>";
}else{
	echo "<script>
		alert('Comment deleted failed!.');
		window.location='detail.php?id=$pid';
		</script>";
	//	window.location='profile.php?lid=$lid&id=$sid&page=comment';
	

}
}
else
{
	header("location:logout.php");
}

?>