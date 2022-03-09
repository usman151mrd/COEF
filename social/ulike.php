<?php
session_start();
require("../db/database.php");
if(isset($_GET['lid']))
{
	$id = $_GET['id'];
	$pg= $_GET['page'];
	$lid = $_GET['lid'];
	$user_id = $_SESSION['id'];
	$sql = "SELECT * FROM `user_post_status` WHERE `user_id`=$user_id AND `post_id`=$lid";
	
	$mydb->setQuery($sql);
	$mydb->selection();
	$count = $mydb->rowcount();
	if($count==0)
	{
		$sql = "INSERT INTO `user_post_status`(`post_id`, `user_id`, `status`) VALUES($lid,$user_id,'like')";
		$mydb->setQuery($sql);
		$mydb->insert();
		if($mydb->idaffected_rows()>0)
		{
			header("location:profile.php?id=$id&page=$pg&lid=$lid");
		}
		else
		{
			 echo "<script>alert('Error to Inserting record:');</script>";
		}
	}
	else
	{
		$sql = "UPDATE `user_post_status` SET `status`='like' WHERE `user_id`=$user_id AND post_id=$lid";
		$mydb->setQuery($sql);
		$mydb->update();
		if($mydb->uaffected_rows()>0)
		{
			header("location:profile.php?id=$id&page=$pg&lid=$lid");
		}
		else
		{
			 echo "<script>alert('Error updating record:');</script>";
		}
	}
}

