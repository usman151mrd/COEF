<?php
if(isset($_POST['dlt']))
{
	
	$pid = $_POST['pid'];

require_once("../db/database.php");
//
$mydb->setQuery("SELECT * FROM `common_topic_comment` WHERE `cp_id`=".$pid);
$result = $mydb->loadResultList();
foreach($result as $obj)
{
	$mydb->setQuery("DELETE FROM `common_topic_status` WHERE `c_id`=".$obj->c_id);
	$mydb->delete();
}
$mydb->setQuery("DELETE FROM `common_topic_comment` WHERE `cp_id`=".$pid);
$mydb->delete();
$mydb->setQuery("DELETE FROM `common_topic` WHERE `cp_id`=".$pid);
$mydb->delete();

//set the delete statement statement specifying the id based on ID 
//pass through URL thats why we use the $_GET['id'] variable
$mydb->setQuery("DELETE FROM `common_topic` WHERE `cp_id`=".$pid);
//we execute the query
$mydb->delete();
//we check if the affected rows during the deletion of data is equal to one
//meaning we succesfully delete the selected comment or post.
if($mydb->idaffected_rows() == 1){

	echo "<script type=\"text/javascript\">
		//alert(\"Comment Successfully deleted!.\");
		window.location='home.php';
	</script>";
}else{
	echo "<script type=\"text/javascript\">
		//alert(\"Comment deleted failed!.\");
		window.location='home.php';
	</script>";

}
}
?>