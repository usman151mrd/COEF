<?php
session_start();
require("../db/database.php");
if(isset($_GET['lid']))
{
	$id = $_GET['id'];
	$lid = $_GET['lid'];
	$user_id = $_SESSION['id'];
	$sql = "SELECT * FROM `related_topic_status` WHERE user_id=$user_id and t_id=$lid";
	$mydb->setQuery($sql);
	$mydb->selection();
	$count = $mydb->rowcount();
	if($count==0)
	{
		$sql = "INSERT INTO `related_topic_status`(`t_id`, `user_id`, `status`) VALUES($lid,$user_id,'unlike')";
		$mydb->setQuery($sql);
		$mydb->insert();
		if($mydb->idaffected_rows()>0)
		{
			header("location:detail.php?id=$id");
		}
		else
		{
			 echo "<script>alert('Error to Inserting record:');</script>";
		}
	}
	else
	{
		$sql = "UPDATE `related_topic_status` SET `status`='unlike' WHERE `user_id`=$user_id AND `t_id`=$lid";
		$mydb->setQuery($sql);
		$mydb->update();
		if($mydb->uaffected_rows()>0)
		{
			header("location:detail.php?id=$id");
		}
		else
		{
			 echo "<script>alert('Error updating record:');</script>";
		}
	}
}

