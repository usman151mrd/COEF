<?php
require_once("../db/database.php");
	if(isset($_POST['update']))	
	{
	 	$pid = $_POST['pid'];
 		$post = $_POST['upost'];
		$sql = "UPDATE `common_topic` SET `cp_text`='$post' WHERE `cp_id`=$pid";
		$mydb->setQuery($sql);
		$mydb->update();
		if ($mydb->uaffected_rows() == 1) {

echo "<script type=\"text/javascript\">
		//alert(\"Post Updated successfully.\");
		window.location='prodetail.php?id=$pid';
	</script>";

}
else 	
{
	
echo "<script type=\"text/javascript\">
		alert(\"Updating Basic information Failed!\");
		window.location='prodetail.php?id=$pid';
	</script>";
	
	
}
	}
	
?>