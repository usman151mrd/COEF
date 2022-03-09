<?php
include '../db/database.php';
if(isset($_POST['share']))
{
	
         $user_id = $_POST['user_id'];
		 $content = $_POST['content'];
		 $author = $_POST['author'];
		// $destination = $_POST['to'];
		// $created =  strftime("%Y-%m-%d %H:%M:%S", time());
			$mydb->setQuery("INSERT INTO `user_post`(`post_id`, `user_id`, `post_text`, `Author`, `post_time`)
								VALUES (NULL, '$user_id', '$content', '$author', NULL);");
			$mydb->insert();
			
			if ($mydb->idaffected_rows()== 1) {
				
						header("location:profile.php");
				
			} else{
				
				echo "<script>
							alert('Comment creation Failed');
						</script>";
			}
}

?>