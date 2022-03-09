<?php
session_start();
$id = $_SESSION['id'];
include '../db/database.php';
if(isset($_POST['submit']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$sql = "UPDATE `registration` SET `user_fname`='$fname' , `user_lname`='$lname' WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->update();
	if($mydb->uaffected_rows()==1)
	{
		header("location:index.php");
	}
	else
	{
		echo "
		<script>
	    alert(\"Comment deleted failed!.\");
		window.location='updatename.php';
		</script>
	";
	}
}