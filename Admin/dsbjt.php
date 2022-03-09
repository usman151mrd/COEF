<?php
include '../db/database.php';
$sql = "DELETE FROM `subjects` WHERE `sb_id`=".$_GET['id'];
$mydb->setQuery($sql);
$mydb->delete();
if($mydb->idaffected_rows()==1)
{
	header("location:viewsubject.php");
}
else
{
	echo "<script>alert('Oops !updation failed');</script>";
}
?>