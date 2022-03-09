<?php
require_once("../db/database.php");
	if(isset($_POST['update']))
	{
		$pid = $_POST['pid'];
		$cid = $_POST['cid'];
		$post = $_POST['upost'];
		$sql = "UPDATE `related_topic_comment` SET `comment`='$post' WHERE `rtc_id`=$cid";
		$mydb->setQuery($sql);
		$mydb->update();
		if ($mydb->uaffected_rows() == 1) {

echo "<script type=\"text/javascript\">
		//alert(\"Post Updated successfully.\");
		window.location='detail.php?id=$pid';
	</script>";
//'detail.php?id=$pid'
}
else{
echo "<script type=\"text/javascript\">
		alert(\"Updating Basic information Failed!\");
		window.location='detail.php?id=$pid';
	</script>";
}
		
	}


?>