<?php
session_start();
include '../db/database.php';
$sql = "UPDATE `admin` SET `logout_time`=NOW() WHERE `add_id`=".$_SESSION['add_id'];
$mydb->setQuery($sql);
$mydb->update();
session_destroy() ;
header("location:index.php");

?>