<?php 
	include '../db/database.php';
	
	$query = "SELECT * FROM chat ORDER BY msg_id DESC";
	$mydb->setQuery($query);
	$r = $mydb->selection();
	while($row = $r->fetch()) :
		?>
			<div id="chat_data">
				<span style="color:green;"><?php echo $row->Sender_name; ?></span> :
				<span style="color:brown;"><?php echo $row->Msg; ?></span>
				<span style="float:right;"><?php echo formatDate($row->Date); ?></span>
			</div>
			<?php endwhile;?>