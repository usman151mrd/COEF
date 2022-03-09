<?php
require_once("../db/database.php");
	if(isset($_POST['update']))	
	{
	 	$pid = $_POST['pid'];
		$sid = $_POST['user_id'];
 		$post = $_POST['upost'];
		$sql = "UPDATE `user_post` SET `post_text`='$post' WHERE `post_id`=$pid";
		$mydb->setQuery($sql);
		$mydb->update();
		if ($mydb->uaffected_rows() == 1) {

echo "<script type=\"text/javascript\">
		//alert(\"Post Updated successfully.\");
		window.location='profile.php?page=wall&id=$sid';
	</script>";

}
else 	
{
	
echo "<script type=\"text/javascript\">
		alert(\"Updating Basic information Failed!\");
		window.location='profile.php?page=wall&id=$sid';
	</script>";
	
	
}
	}
	
?>