	<?php
    include '../db/database.php';
    try
	{
		$name = $_POST['fname'];
		$mid =  $_POST['mid'];
		$msg = $_POST['msg'];
		$id = $_SESSION['id'];
		$sname = $_SESSION['fname'].' '.$_SESSION['lname'];
		$sql = "INSERT INTO `chat`(`user_id`, `Sender_name`, `Msg`) VALUES ($id,'$name','$msg')";
		$mydb->setQuery($sql);
		$mydb->insert();
		echo '<p  style="color:green">message send</p>';
	}
	catch(Exception $ex)
	{
	    echo $ex;
	}