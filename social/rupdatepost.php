<?php
require_once("../db/database.php");
	if(isset($_POST['update']))	
	{
	 	$pid = $_POST['pid'];
 		$post = $_POST['upost'];
		$sql = "UPDATE `related_topic` SET `discription`='$post' WHERE t_id=$pid";
		$mydb->setQuery($sql);
		$mydb->update();
		if ($mydb->uaffected_rows() == 1) {

echo "<script type=\"text/javascript\">
		//alert(\"Post Updated successfully.\");
		window.location='detail.php?id=$pid';
	</script>";

}
else 	
{
	
echo "<script type=\"text/javascript\">
		alert(\"Updating Basic information Failed!\");
		window.location='detail.php?id=$pid';
	</script>";
	
	
}
	}
	
?>