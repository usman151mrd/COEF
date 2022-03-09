<?php
include '../db/database.php';
$pc = new picture();
class picture
{
	private $mydb;
	public function __construct()
	{
		$this->mydb = new Database();
	}
	public function profile($uid,$user)
	{
		
	           // $user = $us->username($sid);
				$this->mydb->setQuery("SELECT `profile_id`, `pro_image`, `user_id`, `pri` FROM `user_pro_pic` WHERE user_id=$uid AND `pri`='yes'");
				$cur = $this->mydb->selection();
				if ($this->mydb->rowCount()== 0){
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
	public function row()
	{
		return $this->mydb->rowcount();	
	}
	public function gallery($pid,$user)
	{
		$this->mydb->setQuery("SELECT `profile_id`, `pro_image`, `user_id`, `pri` FROM `user_pro_pic` WHERE profile_id=$pid");
		$cur = $this->mydb->selection();
		$row = $cur->fetch();
		$image = $row ->pro_image;
		$path = "../Users/$user/$image";
		return $path;
	}
}
