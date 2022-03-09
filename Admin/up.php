<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "up was failed";
if(isset($_POST['admin']))
{
    include '../db/database.php';
	include '../db/db.php';
    $fname = valid($_POST['fullname']);
    
    $email = valid($_POST['email']);
    $param=valid($_POST['password']);
    $str = password($param);
    $pswd =  password_hash($str,PASSWORD_DEFAULT);
    try {
            $sql = "SELECT * FROM `Admin` WHERE `add_email`='$email'";
            $mydb->setQuery($sql);
			$mydb->selection();
            if ($mydb->rowcount()>=1) {
                header("location:addadmin.php?err=your email already exist");
				exit();
            }
			
        
        
         $q ="INSERT INTO `admin`( `add_name`, `add_email`, `add_pass`) VALUES ('$fname','$email','$pswd')";
     $mydb->setQuery($q);
   	 $mydb->insert();
	 if($mydb->idaffected_rows()>0)
	 {
		  header("location:home.php");
	 }
	 else
	 {
		  header("location:addadmin.php?err=user addition Failed");
	 }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    } 
   
}
