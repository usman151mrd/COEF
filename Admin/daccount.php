
<?php
require_once("../db/database.php");
require_once("../class/user.php");
session_start();
if(!isset($_SESSION['add_id']))
{
	header("location:index.php");
}
else
{	
	$id = $_GET['id'];
	$user = $us->username($id);
	$sql = "drop table $user";
	$mydb->setQuery($sql);
	$mydb->ctable();
	$sql = "DELETE FROM `basic_info` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	$sql = "DELETE FROM `common_topic_status` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	$sql = "DELETE FROM `common_topic_comment` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	$sql = "DELETE FROM `common_topic` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	$sql = "DELETE FROM `related_topic_status` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	$sql = "DELETE FROM `related_topic_comment` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	$sql = "DELETE FROM `related_topic` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	
	$sql = "DELETE FROM `user_post_comment` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	$sql = "DELETE FROM `user_post_status` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	$sql = "DELETE FROM `user_post` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	$sql = "DELETE FROM `user_pro_pic` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	$sql = "DELETE FROM `registration` WHERE `user_id`=$id";
	$mydb->setQuery($sql);
	$mydb->delete();
	header("location:viewuser.php");
}