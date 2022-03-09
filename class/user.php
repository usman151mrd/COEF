<?php
//include '../db/database.php';
$us = new user();
class user
{
	private $mydb;
	public function __construct()
	{
		$this->mydb = new Database();
	}
	public function userdata($mid)
	{
	  	$query = "SELECT * FROM `registration` WHERE user_id=$mid";
		$this->mydb->setQuery($query);
		$res=$this->mydb->selection();
		return $res->fetch();
	}
	public function username($mid)
	{
		$row = $this->userdata($mid);
		return (isset($row->user_name)) ? $row->user_name : 'None'; //(isset($info->interested_in)) ? $info->interested_in : 'None';
	}
    public function fullname($sid)
	{
		$row = $this->userdata($sid);
		return $row->user_fname.' '.$row->user_lname;
	}
 }
 