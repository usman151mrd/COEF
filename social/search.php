<?php
include '../db/database.php';
$email = $_POST['email'];
$sql = "SELECT `user_id`  FROM `registration` WHERE `user_email`='$email'";
$mydb->setQuery($sql);
$result= $mydb->selection();
if($mydb->rowcount()>0)
{
	$row = $result->fetch();
	$uid = $row->user_id;
	header("location:profile.php?id=$uid");
}
else
{
	echo "
	<script>
	alert('Not any user Exist to related email which you provide');
	window.location='index.php';
	</script>
	";
}