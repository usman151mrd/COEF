<?php
if(isset($_POST['dlt']))
{
$sid = $_POST['id'];
require_once("../db/database.php");
//set the delete statement statement specifying the id based on ID 
//pass through URL thats why we use the $_GET['id'] variable
$mydb->setQuery("DELETE FROM `user_post_status` WHERE `post_id`=".$_POST['pid']);
$mydb->delete();
$mydb->setQuery("DELETE FROM `user_post_comment` WHERE `post_id`=".$_POST['pid']);
$mydb->delete();
$mydb->setQuery("DELETE FROM `user_post` WHERE `post_id`=".$_POST['pid']);
//we execute the query
$mydb->delete();
//we check if the affected rows during the deletion of data is equal to one
//meaning we succesfully delete the selected comment or post.
if($mydb->idaffected_rows() == 1){

	echo "<script type=\"text/javascript\">
		//alert(\"Comment Successfully deleted!.\");
		window.location='profile.php?id=$sid';
	</script>";
}else{
	echo "<script type=\"text/javascript\">
		alert(\"Comment deleted failed!.\");
		window.location='profile.php?id=$sid';
	</script>";

}
}
?>