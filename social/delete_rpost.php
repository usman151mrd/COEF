<?php
if(isset($_POST['dlt']))
{
	
	$pid = $_POST['pid'];
	$sub = $_POST['sub'];
	require_once("../db/database.php");
	$mydb->setQuery("SELECT * FROM `related_topic_comment` WHERE `t_id`=".$pid);
	$result = $mydb->loadResultList();
	foreach($result as $obj)
	{
		$mydb->setQuery("DELETE FROM `related_topic_status` WHERE `t_id`=".$obj->rtc_id);
		$mydb->delete();
	}
	$mydb->setQuery("DELETE FROM `related_topic_comment` WHERE `t_id`=".$pid);
	$mydb->delete();
	//set the delete statement statement specifying the id based on ID 
	//pass through URL thats why we use the $_GET['id'] variable
	$mydb->setQuery("DELETE FROM `related_topic` WHERE `t_id`=".$pid);
	//we execute the query
	$mydb->delete();
	//we check if the affected rows during the deletion of data is equal to one
	//meaning we succesfully delete the selected comment or post.
	if($mydb->idaffected_rows() == 1){
	
		echo "<script type=\"text/javascript\">
			//alert(\"Post Successfully deleted!.\");
			window.location='book.php?sid=$sub';
		</script>";
	}else{
		echo "<script type=\"text/javascript\">
			alert(\"Comment deleted failed!.\");
			window.location='book.php?sid=$sub';
		</script>";
	
	}
	
}
?>