<?php
session_start();
require("../db/database.php");


	$id = $_GET['id'];
	$lid = $_GET['lid'];
	$user_id = $_SESSION['id'];
	$que = "SELECT * FROM `common_topic_status` WHERE `c_id`=$lid and status='like'";
	$mydb->setQuery($que);
	$mydb->selection();
	$count = $mydb->rowcount();
	$sql = "SELECT * FROM `common_topic_status` WHERE user_id=$user_id and c_id=$lid";
	$mydb->setQuery($sql);
	$mydb->selection();
	$count = $mydb->rowcount();
	if($count==0)
	{
		$sql = "INSERT INTO `common_topic_status`(`c_id`, `user_id`, `status`) VALUES($lid,$user_id,'like')";
		$mydb->setQuery($sql);
		$mydb->insert();
		if($mydb->idaffected_rows()>0)
		{
			echo $count;
		}
		else
		{
			 echo "<script>alert('Error to Inserting record:');</script>";
		}
	}
	else
	{
		$sql = "UPDATE `common_topic_status` SET `status`='like' WHERE `user_id`=$user_id AND c_id=$lid";
		$mydb->setQuery($sql);
		$mydb->update();
		if($mydb->uaffected_rows()>0)
		{
			echo $count;
		}
		else
		{
			 echo "<script>alert('Error updating record:');</script>";
		}
	}


