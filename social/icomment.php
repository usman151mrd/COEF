<?php
include '../db/database.php';

		 $user_id = $_POST['user_id'];
		 $post_id = $_POST['post_id'];
		 $content = $_POST['subcontent'];
		 $author = $_POST['subauthor'];
		 $sid = $_GET['sid'];
		// $created =  strftime("%Y-%m-%d %H:%M:%S", time());
		
		
			global $mydb;
			$mydb->setQuery("INSERT INTO `user_post_comment`(`c_id`, `post_id`, `user_id`, `comment`, `Author`, `Time`)
								VALUES (NULL,'$post_id', '$user_id', '$content','$author', NULL);");
			$mydb->insert();
			
			if ($mydb->idaffected_rows()== 1) {
				
				header("location:profile.php?id=$sid");
						
				
			} else{
				echo "<script type=\"text/javascript\">
							alert(\"Comment creation Failed!\");
						</script>";
			}
