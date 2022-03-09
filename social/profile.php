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
	function cnfirm()
	{
		var r = confirm('Are you sure to Delete');
		return r;
	}
</script>
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
<body onload="ajax1();">
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
				<div class="col-md-3" style="background:#7BB2F4;" >
						<a data-target="#myModal" data-toggle="modal" href="" title=
						"Click here to Change Image.">
                        
				<?php
				 $user = $us->username($sid);
				 $path = $pc->profile($sid,$user);
				 ?>
                 
                  <img src="<?php echo $path; ?>" class=" img-responsive img-rounded" style=" background:#159DE9; padding:10px;"/>
					</a>	
                     
				<!-- Modal -->
                <?php if($sid==$_SESSION['id'])
									{
										echo '
					<div class="modal fade" id="myModal" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button class="close" data-dismiss="modal" type=
									"button">×</button>

									<h4 class="modal-title" id="myModalLabel">Choose Your best
									picture for your Profile.</h4>
								</div>

								<form action="iphoto.php" enctype="multipart/form-data" method=
								"post">
									<div class="modal-body">
										<div class="form-group">
											<div class="rows">
												<div class="col-md-12">
													<div class="rows">
														<div class="col-md-8">
															  <input type="file" name="fileField" id="fileField">
														</div>

														<div class="col-md-4"></div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button class="btn btn-default" data-dismiss="modal" type=
										"button">Close</button> <button class="btn btn-primary"
										name="savephoto" type="submit">Save Photo</button>
									</div>
								</form>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					';
									}
									?>
					<div class="list-group">
					    <a href="gallery.php?id=<?php echo $sid;  ?>" class="list-group-item">
					      <span class="badge pull-right">
					      	<?php 
								echo $pc->row();
					        ?>
                            
					    </span>
					     View photos
                         
					    </a>
					    
				
					</div>
					<div class="panel panel-success">
					<?php
					$sql = "Select * from basic_info where user_id=".$sid;
					$mydb->setQuery($sql);
					$info = $mydb->loadSingleResult();
					
					?>
			  		<div class="panel-heading"><h3 class=" panel panel-heading">Information</h3></div>
					   <div class="panel-body">	
							<p class="text-muted" >Registration No: <?php echo (isset($info->networks)) ? $info->networks : 'None'; ?></p>
							<p class="text-muted">City : <?php echo (isset($info->rel_stats)) ? $info->rel_stats : 'None'; ?></p>
							<p class="text-muted">Birthday : <?php echo bdate_toText($_SESSION['dob']); ?></p>
							<p class="text-muted">Favorite Language : <?php echo (isset($info->language)) ? $info->language : 'None'; ?></p>
                            <p class="text-muted"></p>interested in : <?php echo (isset($info->interested_in)) ? $info->interested_in : 'None'; ?></p>
                            <p class="text-muted">Favorite Subject : <?php echo (isset($info->religion)) ? $info->religion : 'None'; ?></p>
                            <p>
                            
								   <p class="text-muted"> Descriptions: <?php echo (isset($info->rel_desc)) ? $info->rel_desc : 'None'; ?></p>
                            </p>
                            <p class="text-muted">Favorite Teacher : <?php echo (isset($info->political_view)) ? $info->political_view : 'None'; ?></p>
                             <p>
                            
								   <p class="text-muted"> Descriptions:  <?php echo (isset($info->political_view)) ? $info->political_view : 'None'; ?></p>
                            </p>				            					            		
						</div>
					          
					</div>
					
					

				</div>
<?php  
$full = $us->fullname($sid);
  ?>
				<div class="col-md-9">
					<div class="page-header">
						<h3><?php echo $full;?></h3>
					</div>

					<ul class="nav nav-tabs">
                    <?php
					if(isset($_GET['page']))
					{
						if($_GET['page']=='wall')
						{
							echo '<li class="active">';
						}
						else
						{
							echo '<li>';
						}
					}
					else
					{
							echo '<li class="active">';
					}
					?>
							<a href="profile.php?page=wall&id=<?php echo $sid; ?>">Wall</a>
						</li>

						 <?php
					if(isset($_GET['page']))
					{
						if($_GET['page']=='info')
						{
							echo '<li class="active">';
						}
						else
						{
							echo '<li>';
						}
					}
					else
					{
							echo '<li>';
					}
					?>
							<a href="profile.php?page=info&id=<?php echo $sid; ?>">Info</a>
						</li>
                        <?php
						if($sid!=$ssid)
						echo '
                        <li>
							<a href="msg.php?mid='.$sid.'">Message</a>
						</li> ';
						?>
					</ul>
				<?php
				if(isset($_GET['page']))
				{
					if($_GET['page']=='wall')
					{
						include 'wall.php';
					}
					else if($_GET['page']=='info')
					{
						include 'info.php';
					}
					else
					{
						include 'comment.php';
					}
				}
				else
				{
					include 'wall.php';
				}
				?>
            
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
