<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form enctype="multipart/form-data" method="post" action="image.php">
  <p>
    <label for="fileField">File:</label>
    <input type="file" name="fileField" id="fileField">
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
</form>
</body>
</html>
<?php
include "../db/database.php";
if(isset($_POST['submit']))
{
	echo $name = $_FILES['fileField']['name'].'<br>';
	echo $size = $_FILES['fileField']['size'].'<br>';
	echo $imageFileType = $_FILES['fileField']['type'].'<br>';
	echo $tname = $_FILES['fileField']['tmp_name'].'<br>';
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
}