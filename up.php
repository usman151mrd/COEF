<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['submit']))
{
    include 'db/database.php';
	include 'db/db.php';
    $fname = valid($_POST['form-firstname']);
    $lname = valid($_POST['form-lastname']);
    $email = valid($_POST['form-email']);
    $param=valid($_POST['form-password']);
    $str = password($param);
    $pswd =  password_hash($str,PASSWORD_DEFAULT);
    $username = valid($_POST['form-username']);
    $program = valid($_POST['form-department']);
    $semester = valid($_POST['form-semester']);
	$month    = $month + 1;
	$day	  = $_POST['day'];
	$yr	      = $_POST['yr'];
    $dob = $yr . '-' . $month . '-' .  $day;
    $gender = valid($_POST['form-gender']);
    
    try {
            $sql = "SELECT * FROM `registration` WHERE `user_email`='$email'";
            $mydb->setQuery($sql);
			$mydb->selection();
            if ($mydb->rowcount()>=1) {
                header("location:signup.php?err=your email already exist");
				exit();
            }
			$sql = "SELECT * FROM `registration` WHERE `user_name`='$username'";
			$mydb->setQuery($sql);
			$mydb->selection();
			if ($mydb->rowcount()>0) {
				header("location:signup.php?err=Username already exist. please try again with another username");
				exit();
			}
        
        
         $q ="INSERT INTO `registration`( `user_fname`, `user_lname`, `user_email`, `user_name`, `user_pass`, `user_program`, `user_semester`, `user_dob`, `user_gender`, `user_reset`) VALUES"
                 . " ('$fname','$lname','$email','$username','$pswd','$program','$semester','$dob','$gender',0)";
     $mydb->setQuery($q);
   	 $mydb->insert();
	 if($mydb->idaffected_rows()>0)
	 {/*
		$sql = "create table ".$username." (Msg_ID int NOT NULL AUTO_INCREMENT,
		with_id int not null,
		to_id int not null,
		to_name varchar(100) not null,
		from_id int not null,
		from_name varchar(100) not null,
		Msg text,
		status varchar(50) default 'send',
		date TIMESTAMP,
		PRIMARY KEY (Msg_ID)
		)";
		$mydb->setQuery($sql);
		$mydb->ctable();*/
		$path = "Users/".$username."/";
		mkdir($path, 0, true);
	 }
         header("location:index.php");
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    } 
   
}
