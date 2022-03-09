<?php
session_start();
require("../db/database.php");
if(isset($_GET['lid']))
{
	$id = $_GET['id'];
	$lid = $_GET['lid'];
	$user_id = $_SESSION['id'];
	$sql = "SELECT * FROM `common_topic_status` WHERE user_id=$user_id and c_id=$lid";
	$mydb->setQuery($sql);
	$mydb->selection();
	$count = $mydb->rowcount();
	if($count==0)
	{
		$sql = "INSERT INTO `common_topic_status`(`c_id`, `user_id`, `status`) VALUES($lid,$user_id,'unlike')";
		$mydb->setQuery($sql);
		$mydb->insert();
		if($mydb->idaffected_rows()>0)
		{
			header("location:prodetail.php?id=$id");
		}
		else
		{
			 echo "<script>alert('Error to Inserting record:');</script>";
		}
	}
	else
	{
		$sql = "UPDATE `common_topic_status` SET `status`='unlike' WHERE `user_id`=$user_id AND `c_id`=$lid";
		$mydb->setQuery($sql);
		$mydb->update();
		if($mydb->uaffected_rows()>0)
		{
			header("location:prodetail.php?id=$id");
		}
		else
		{
			 echo "<script>alert('Error updating record:');</script>";
		}
	}
}

