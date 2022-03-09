<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<a href=""
<?php

if(isset($_POST['file']) && ($_POST['file']=='Upload'))
	{
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
    	$prod_img_path=$img_name;
    	move_uploaded_file($img_tmp_name,"../Users/".$user."/".$prod_img_path);
	}
?>
</body>
</html>