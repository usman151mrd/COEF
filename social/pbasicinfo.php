<?php
session_start();
$ssid = $_SESSION['id'];
require_once("../db/database.php");
$network   = $_POST['network'];
$gender    = $_POST['gender'];
$month 	   = $_POST['mm'] + 1; 
$bday      = $_POST['yr'].'-'.$month.'-'. $_POST['dd'];
$interest  = $_POST['interested'];
$rel_stats = $_POST['relstatus'];
$language  = $_POST['language'];
$religion  = $_POST['Religion'];
$reldesc   = $_POST['Reldesc'];
$political = $_POST['politicalviews'];
$poldesc   = $_POST['poldesc'];
global $mydb;
//check if theres a current information for every user
$mydb->setQuery("SELECT * FROM `basic_info` WHERE `user_id`=$ssid");
$cur = $mydb->selection();
$row_count = $mydb->rowCount();//get the number of count

//if the row count is equal to one therefore there is an existing data for the user
if ($row_count == 1){
//then it will simply do the editing of the user's information
$mydb->setQuery("UPDATE `basic_info` SET 
		`networks`      =  '{$network}',
		`interested_in` =  '{$interest}',
		`rel_stats`     =  '{$rel_stats}',
		`language`      =  '{$language}',
		`religion`      =  '{$religion}',
		`rel_desc`      =  '{$reldesc}',
		`political_view` =  '{$political}',
		`pol_desc`      =  '{$poldesc}'
		 WHERE user_id=".$ssid);
$mydb->update();
//check if the update statement has been executed successfully in the database
if ($mydb->uaffected_rows() == 1) {

echo "<script type=\"text/javascript\">
		//alert(\"Basic Information Updated successfully.\");
		window.location='profile.php?page=info';
	</script>";

} else{
echo "<script type=\"text/javascript\">
		//alert(\"Updating Basic information Failed!\");
		window.location='profile.php?page=info';
	</script>";
}
//this code will update the birthday and gender of the user in the users_table
$mydb->setQuery("UPDATE `registration` SET `user_dob`='{$bday}',`user_gender`='{$gender}' WHERE `user_id`=".$ssid);
$mydb->update();

}else{
//else no results user's information found then it will insert the user's information in the database
$mydb->setQuery("INSERT INTO `basic_info`( `networks`, `interested_in`, `rel_stats`, `language`, `religion`, `rel_desc`, `political_view`, `pol_desc`, `user_id`)
				VALUES ( '{$network}', '{$interest}', '{$rel_stats}', '{$language}',
						 '{$religion}', '{$reldesc}', '{$political}', '{$poldesc}', '{$ssid}');");
$mydb->insert();

if ($mydb->idaffected_rows() == 1) {
echo "<script type=\"text/javascript\">
		//alert(\"Basic Information created successfully.\");
		window.location='profile.php?page=info';
	</script>";

} else{
echo "<script type=\"text/javascript\">
		alert(\"Saving Basic information Failed!\");
	</script>";
}

}
$mydb->setQuery("UPDATE `registration` SET `user_dob`='{$bday}',`user_gender`='{$gender}' WHERE `user_id`=".$ssid);
$mydb->update();

?>