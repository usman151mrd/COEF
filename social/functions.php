<?php
include '../db/database.php';
function profile($uid)
	{
		$mydb = new Database();
				$mydb->setQuery("SELECT `profile_id`, `pro_image`, `user_id`, `pri` FROM `user_pro_pic` WHERE user_id=$uid AND `pri`='yes'");
				$cur = $mydb->selection();
				if ($mydb->rowCount()== 0){
					$path ="../Users/uploads/p.jpg";	
				
				}
				else
				{
					$row = $cur->fetch();
					$image = $row ->pro_image;
					$path = "../Users/$user/$image";
					
				}
				return $path;
	}
	function userdata($mid)
	{
		$mydb = new Database();
		$query = "SELECT * FROM `registration` WHERE user_id=$mid";
		$mydb->setQuery($query);
		$res=$mydb->selection();
		return $res;
	}
	function username($mid)
	{
		$result = userdata($mid);
		$row = $result->fetch();
		return $row->user_name;
	}
    function fullname($sid)
	{
		$result = userdata($sid);
		$row = $result->fetch();
		return $row->user_fname.' '.$row->user_lname;
	}
