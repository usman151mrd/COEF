      <!DOCTYPE html>
<html lang="en">
  <head>
    

    <title>Contact US</title>

    <!-- Bootstrap CSS -->    
    <link href="../Social/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../Social/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../Social/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../Social/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../Social/css/style.css" rel="stylesheet">
    <link href="../Social/css/msg.css" rel="stylesheet">
    <link href="../Social/css/style-responsive.css" rel="stylesheet" />
    <style>
	#contain {
	width:80%;
	background:#B5B1B1; 
	margin: 0 auto;
	padding:20px;

}
#chat_box {
	width:90%; 
	height:auto;
}
#chat_data {
	width:100%; 
	padding:5px; 
	margin-bottom:5px;
	border-bottom:1px solid silver;
	font-weight:bold;
}
input[type='text']{
	width:100%; 
	height:40px;
	border:1px solid gray; 
	border-radius:5px;
}
input[type='submit']{
	width:100%; 
	height:40px;
	border:1px solid gray; 
	border-radius:5px;
}
textarea{
	width:100%; 
	height:40px;
	border:1px solid gray; 
	border-radius:5px;
}
	
	</style>
    <script>
		function admin(){
		//alert('call');
		var req = new XMLHttpRequest();
		
		req.onreadystatechange = function(){
		
		if(req.readyState == 4 && req.status == 200){
		
		document.getElementById('admin').innerHTML = req.responseText;
		} 
		}
		req.open('GET','admin.php',true); 
		req.send();
		
		}
		setInterval(function(){ajax()},1000);
	</script>
  </head>

  <body onload="admin();">

  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
       
      <?php    
	  include 'header.php';
	  ?>      
      <!--header end-->

      <!--sidebar start-->
       <?php    
	  include 'aside.php';
	  ?>  
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
    
                <div class="row">
      <div class="col-lg-12" >
      <div id="contain">
		<div id="chat_box">
		<div id="admin"></div>
		</div>
        <script>
		function valid()
		{
			var val = document.getElementById('msg').value;
			if(val =='')
			{
				alert('you cannot send empty message');
				return false;	
			}
		}
		</script>
		<form method="post" action="msg.php" onSubmit="return valid();">
		<input type="hidden" name="name" value="Admin"/>
        <input type="hidden" name="id" value="0"/> 
		<textarea name="msg" id="msg" placeholder="enter message"></textarea>
		<input type="submit" name="submit" value="Send it" class="btn btn-success"/>
		
		</form>
		<?php 
		if(isset($_POST['submit'])){ 
		$id = $_POST['id'];
		$name = $_POST['name'];
		$msg = $_POST['msg'];
		
		$query = "INSERT INTO `chat`(`msg_id`, `user_id`, `Sender_name`, `Msg`) VALUES (NULL,'$id','$name','$msg')";
		$mydb->setQuery($query);
		$mydb->insert();
		if ($mydb->idaffected_rows()== 1) {
				
			echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
		}
		
		
		}
		?>

</div>
      
      </div>
      </div>
         
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->

    <!-- javascripts -->
    <script src="../Social/js/jquery.js"></script>
    <script src="../Social/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../Social/js/jquery.scrollTo.min.js"></script>
    <script src="../Social/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
   
    <!-- custom gritter script for this page only-->
    <script src="../Social/js/gritter.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="../Social/js/scripts.js"></script>
      </body>
</html>