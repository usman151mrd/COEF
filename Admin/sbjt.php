<?php
include '../db/database.php';
		if(isset($_POST['subjct']));
		{
			$pro_id = $_POST['program'];
			$sem_id = $_POST['semester'];
			foreach($_POST['sub'] as $subj)
			{
				if($subj=='')
				{
					echo "<script>alert('your insertion skiped due to empty textbox')</script>";
				}
				else
				{
					$sql = "INSERT INTO `subjects`( `sb_name`, `s_id`) VALUES ('$subj','$sem_id')";
					$mydb->setQuery($sql);
					$mydb->insert();
				}
			}
			//header("location:home.php");
			echo "<script type=\"text/javascript\">
			//alert(\"Comment deleted failed!.\");
			window.location='home.php';
			</script>";
		}
		?>
		