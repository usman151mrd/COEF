<?php
include '../db/database.php';
$sql = "DELETE FROM `programming` WHERE `pid`=".$_GET['id'];
$mydb->setQuery($sql);
$mydb->delete();
if($mydb->idaffected_rows()==1)
{
	header("location:vprosb.php");
}
else
{
	echo "<script>alert('Oops !updation failed');</script>";
	header("location:vprosb.php");
}
?>