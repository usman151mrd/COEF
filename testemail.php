<?php
include_once 'db/database.php';
try {
    $email = $_POST['email'];
    $sql = "SELECT * FROM `registration` WHERE `user_email`='$email'";
    $mydb->setQuery($sql);
    $mydb->selection();
    if ($mydb->rowcount()>0) {
        echo 'Email already exist. please try again with another email';
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
} 

