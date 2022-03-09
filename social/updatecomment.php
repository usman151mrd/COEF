<?php
require_once("../db/database.php");
	if(isset($_POST['update']))
	{
		$pid = $_POST['pid'];
		$cid = $_POST['cid'];
		$sid = $_POST['user_id'];
		$post = $_POST['upost'];
		$sql = "UPDATE `user_post_comment` SET `comment`='$post' WHERE `c_id`=$cid";
		$mydb->setQuery($sql);
		$mydb->update();
		if ($mydb->uaffected_rows() == 1) {

echo "<script type=\"text/javascript\">
		//alert(\"Post Updated successfully.\");
		window.location='profile.php?page=comment&id=$sid&lid=$pid';
	</script>";
//'profile.php?lid=$lid&id=$sid&page=comment'
}
else{
echo "<script type=\"text/javascript\">
		alert(\"Updating Basic information Failed!\");
		window.location='profile.php?page=comment&id=$sid&lid=$pid';
	</script>";
}
		
	}


?>