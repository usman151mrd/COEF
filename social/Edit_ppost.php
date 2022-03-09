<?php 
if(!isset($_POST['pdt']))
{
	header("location:logout.php");
}
else
{
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
  <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
       <script>
		function ajax1(){
		
		var req = new XMLHttpRequest();
		var mid = document.getElementById('mid').value;
		req.onreadystatechange = function(){
		
		if(req.readyState == 4 && req.status == 200){
		
		document.getElementById('headchat').innerHTML = req.responseText;
		} 
		}
		req.open('GET','headchat.php',true); 
		req.send();
		
		}
		setInterval(function(){ajax1()},1000);
	</script>
</head>
<body>
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
              <!--overview start-->	
      

<div class="row" style="clear:both">
			
<?php

	
	
		$pid = $_POST['pid'];
		$sql = "SELECT cp_text FROM `common_topic` WHERE `cp_id`=$pid";
		$mydb->setQuery($sql);
		$res=$mydb->selection();
		$row = $res->fetch();
		$text = $row->cp_text;
	

?>
				<div class="col-md-12">
					
                    
                    <form action="pupdatepost.php" method="POST">
						
						  <div class="panel-body">
                            <input type="hidden" name="pid" value="<?php echo $pid; ?>">
							<textarea class="form-control input-lg" rows="5" name="upost"><?php echo $text;  ?></textarea>
								
						</div>
						<div class="panel-footer" align="right">
							<button class="btn btn-primary btn-sm" type="submit" name="update">update</button>
						</div>
						</form>
                    </div>

	</div>
    
     </section>
              
              </section>
      
      
  </section>
  <!-- container section end -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
   
    <!-- custom gritter script for this page only-->
    <script src="js/gritter.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>

</body>
</html>
<?php }