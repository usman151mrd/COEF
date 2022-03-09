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

	{
		$pid = $_POST['pid'];
		$cid =$_POST['cid'];
		$sql = "SELECT  `comment` FROM `common_topic_comment` WHERE `c_id`=$cid";
		$mydb->setQuery($sql);
		$res=$mydb->selection();
		$row = $res->fetch();
	}
?>
				<div class="col-md-12">
					
                    
                    <form action="pupdatecomment.php" method="POST">
						
						  <div class="panel-body">
                            <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                            <input type="hidden" name="cid" value="<?php echo $cid; ?>">
							<textarea class="form-control input-lg" rows="5" name="upost"><?php echo $row->comment; ?></textarea>
								
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