<?php
session_start();
include '../db/database.php';
include '../class/user.php';

if(isset($_POST['mess']))
{
	 	 
		 $mid =  $_POST['mid'];
		 $msg = $_POST['msg'];
		 $sid = $_SESSION['id'];
		 $muser = $us->username($mid);
		 $mfull = $us->fullname($mid);
		 $suser = $us->username($sid);
		 $sfull = $us->fullname($sid);
		 try
		{
			/*$sql1 = "INSERT INTO $suser (`with_id`, `to_id`, `to_name`, `from_id`, `from_name`, `Msg`) VALUES ($mid,$mid,'$mfull',$sid,'$sfull','$msg')";
			$mydb->setQuery($sql1);
			$mydb->insert();
			//echo '<p  style="color:green">message send</p>';*/
		//	$sql2 = "INSERT INTO $muser (`with_id`, `to_id`, `to_name`, `from_id`, `from_name`, `Msg`) VALUES ($sid,$mid,'$mfull',$sid,'$sfull','$msg')";
			$sql2 = "INSERT INTO message (`with_id`, `to_id`, `to_name`, `from_id`, `from_name`, `Msg`) VALUES ($mid,$mid,'$mfull',$sid,'$sfull','$msg')";
			$mydb->setQuery($sql2);
			$mydb->insert();
		}
		catch(Exception $ex)
		{
			echo $ex;
		}
		header("location:msg.php?mid=$mid");
 
 }

/*
echo 	'form id'.$mid =  $_POST['mid'].'<br>';
		echo	'Message'.$msg = $_POST['msg'].'<br>';
		echo	'Session id'.$sid = $_SESSION['id'].'<br>';
		echo	'target username'.$muser = $us->username($mid).'<br>';
		echo	'target name'.$mfull = $us->fullname($mid).'<br>';
		echo	'own username'.$suser = $us->username($sid).'<br>';
		echo	'own name'.$sfull = $us->fullname($sid).'<br>';
*/
?>