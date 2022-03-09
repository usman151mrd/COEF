<?php
session_start();


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
           include 'db/db.php';
		   include 'db/database.php';
           if (isset($_POST['submit'])) {
              // echo "<script>alert('username or password are invalid');</alert>";
               $email =  valid($_POST['form-username']) ;
               $pass = valid($_POST['form-password']);
               $str = password($pass);
               $sql1 = "SELECT * FROM `registration` WHERE user_email='$email'";
               $mydb->setQuery($sql1);
               $result = $mydb->selection();
               $row = $result->fetch();
               $count =  $mydb->rowcount();
               if ($count==1) {
               $hash_pass = $row->user_pass;
               $hash = password_verify($str, $hash_pass);
               if ($hash==0) {
                   header("location:index.php?err=Your password are invalid");
               }
 else {
	 // start
	 
	 
	                    $min = 100000;
						$max = 999999;
					    $ip = getip();
                         $code = rand($min, $max);
                         $mydb->setQuery("UPDATE `registration` SET `user_reset`='$code',`user_ip`='$ip', login=NOW() WHERE user_email='$email'");
                         $mydb->update();
                         $to = $email;
                         $subject = "Reset Password";
                         $message = "
						 A Confirmation Code was Send to Email<br>
						 <center> $code </center>
						 ";
                         mail($to, $subject, $message);
                  
					$_SESSION['email'] = $email;
                   header("location:confirm.php");
	 
	 
	 // end
	 
               $sql = "SELECT user_email FROM `registration` WHERE user_email=:email and user_pass=:password";
               $mydb->setQuery($sql);
			   $result = $mydb->login($email,$hash_pass);
               
               if ($mydb->rowcount()==1) {
                   $row = $result->fetch();
                //   $id = $row->user_id;
				//   $fname = $row->user_fname;
				//   $lname = $row->user_lname;
				//   $name = $row->user_name;
				   $email = $row->user_email;
				//   $program = $row->user_program;
				//   $sem = $row->user_semester;
				//   $dob = $row->user_dob;
               //    $_SESSION['id']=$id;
				//   $_SESSION['fname']=$fname;
				//   $_SESSION['lname']=$lname;
				//   $_SESSION['unmae']=$name;
				   $_SESSION['email']=$email;
				 //  $_SESSION['sem']=$sem;
				//   $_SESSION['pid']=$program;
				//   $_SESSION['dob']=$dob;
                   header("location:confirm.php");
               }
 else {
                   header("location:index.php?err=username or password are invalid");
}
               
           }
           }
           else {
                   header("location:index.php?err=No account Exist related to  Your Email");
}
           }
           
        ?>