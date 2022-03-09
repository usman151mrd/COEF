<?php
include_once 'db/database.php';
try {
    $user = $_POST['user'];
    $sql = "SELECT * FROM `registration` WHERE `user_name`='$user'";
    $mydb->setQuery($sql);
    $mydb->selection();
    if ($mydb->rowcount()>0) {
        echo 'Username already exist. please try again with another username';
    }
	
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
} 