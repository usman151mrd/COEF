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
	  echo	$query = "SELECT * FROM `registration` WHERE user_id=$mid";
		$this->mydb->setQuery($query);
		$res=$this->mydb->selection();
		return $res->fetch();
	}
	public function username($mid)
	{
		$row = $this->userdata($mid);
		return $row->user_name;
	}
    public function fullname($sid)
	{
		$row = $this->userdata($sid);
		return $row->user_fname.' '.$row->user_lname;
	}
 }
 