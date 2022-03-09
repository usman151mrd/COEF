<?php
    session_start();
	include "../db/database.php";
	include "../class/user.php";
	$sid = $_SESSION['id'];
	$user = $us->username($sid);
if(isset($_POST['savephoto']))
{
	
	$name = $_FILES['fileField']['name'];
	$size = $_FILES['fileField']['size'];
	$type = $_FILES['fileField']['type'];
	$tname = $_FILES['fileField']['tmp_name'];
	if(empty($name))
	{
		 echo "<script>alert('Please Select An Image')</script>";
		exit();
	}
    $target_file = "../Users/$user/$name";
	if (file_exists($target_file)) {
    echo "<script>alert('Sorry, file already exists')</script>";
	exit();
	}
	if ($size > 500000) {
    echo "<script>alert('Sorry, your file is too large')</script>";
    exit();
	}
	 if(move_uploaded_file($tname,"../Users/$user/$name"))
	 {
		 $mydb->setQuery("UPDATE `user_pro_pic` SET `pri`='no' WHERE `user_id`=$sid");
		 $mydb->update();
		$sql = "INSERT INTO `user_pro_pic`(`profile_id`, `pro_image`, `user_id`, `pri`) VALUES (NULL,'$name',$sid,'yes')";
		 $mydb->setQuery($sql);
		 $mydb->insert();
		 header("location:profile.php");
		 
	 }
	 else
	 {
		 echo 'image upload Failed'; 
	 }
}