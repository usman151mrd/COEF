<?php 
	include '../db/database.php';
	
	$query = "SELECT * FROM chat ORDER BY msg_id DESC";
	$mydb->setQuery($query);
	$r = $mydb->selection();
	while($row = $r->fetch()) :
		?>
			<div id="chat_data">
            <?php if($row->user_id>0){ ?>
				<span style="color:green;"><a href="../Admin/profile.php?id=<?php echo $row->user_id;  ?>"><?php echo $row->Sender_name; ?></a></span> :
                <?php }
				else
				{ ?>
                <span style="color:green;"><?php echo $row->Sender_name; ?></span> :
                <?php  } ?>
				<span style="color:brown;"><?php echo $row->Msg; ?></span>
				<span style="float:right;"><?php echo formatDate($row->Date); ?></span>
			</div>
			<?php endwhile;?>