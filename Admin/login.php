<?php
session_start();


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
           include '../db/db.php';
		   include '../db/database.php';
           if (isset($_POST['submit'])) {
              // echo "<script>alert('username or password are invalid');</alert>";
               $email =  valid($_POST['form-username']) ;
               $pass = valid($_POST['form-password']);
               $str = password($pass);
               $sql1 = "SELECT * FROM `Admin` WHERE `add_email`='$email'";
               $mydb->setQuery($sql1);
               $result = $mydb->selection();
               $row = $result->fetch();
               $count =  $mydb->rowcount();
               if ($count==1) {
               $hash_pass = $row->add_pass;
               $hash = password_verify($str, $hash_pass);
               if ($hash==0) {
                  // header("location:index.php?err=Your password are invalid");
               }
 else {
               $sql = "SELECT * FROM `Admin`  WHERE add_email=:email and add_pass=:password";
               $mydb->setQuery($sql);
			   $result = $mydb->login($email,$hash_pass);
               
               if ($mydb->rowcount()==1) {
				    $min = 100000;
    			    $max = 999999;
                   $ip = getip();
                         $code = rand($min, $max);
                         $mydb->setQuery("UPDATE `Admin` SET `add_code`='$code',`login_ip`='$ip', login_time =NOW() WHERE `add_email`='$email'");
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