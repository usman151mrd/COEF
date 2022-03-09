<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>my test</title>
</head>
<?php  
include '../class/user.php';
$result=$us->userdata(5);
echo $result->user_gender;
echo $result->user_dob;
 ?>
<body>
</body>
</html>