<?php
session_start();
$id = $_SESSION['add_id'];
include '../db/database.php';
include '../db/db.php';
if(isset($_POST['pass']))
{

	   $pass = valid($_POST['opassword']);
	   $str = password($pass);
	   $sql1 = "SELECT * FROM `Admin` WHERE add_id='$id'";
	   $mydb->setQuery($sql1);
	   $result = $mydb->selection();
	   $row = $result->fetch();
	   $count =  $mydb->rowcount();
	   if ($count==1) 
	   {
			$hash_pass = $row->user_pass;
			$hash = password_verify($str, $hash_pass);
			if ($hash==0) 
			{
				header("location:chngpass.php?err=Your current password are invalid");
			}
			else 
			{
				   
			echo	$param=valid($_POST['password']);
				$str = password($param);
				$pswd =  password_hash($str,PASSWORD_DEFAULT);
				$sql2 = "UPDATE `Admin` SET `add_pass`='$pswd' WHERE `add_id`=$id";
				$mydb->setQuery($sql2);
				$mydb->update();
				if($mydb->uaffected_rows()==1)
				{
					header("location:index.php");
				}
				else
				{
					header("location:chngpass.php?err=password updation failed");
				}
				
				
			}
	 }
 }
