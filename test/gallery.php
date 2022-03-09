
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
			<div class="row">
		<div class="col-md-4">
						<a data-target="#myModal" data-toggle="modal" href="" title=
						"Click here to Change Image.">
				<?php
				$user = $us->username($sid);
				 $path = $pc->profile($sid,$user);
				 ?>
                  <img src="<?php echo $path; ?>" class="img-thumbnail"/>
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
					    <a href="gallery.php" class="list-group-item">
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
							<p class="text-muted">Networks:</p>	<p><?php echo (isset($info['networks'])) ? $info['networks'] : 'None'; ?></p>
							<p class="text-muted">Relationship Status:</p><p><?php echo (isset($info['rel_stats'])) ? $info['rel_stats'] : 'None'; ?></p>
							<p class="text-muted">Birthday:</p>	<p><?php echo bdate_toText($_SESSION['dob']); ?></p>
											            					            		
						</div>
					          
					</div>
					
					<div class="panel panel-primary">
					  <div class="panel-heading"> <h3 class=" panel-heading">Friends</h3></div>
					  <div class="panel-body">
					   <?php 
						$mydb->setQuery("Select * from user_info ");
						$cur = $mydb->loadResultList();
						foreach($cur as $object):
					

						?>
						

						<?php endforeach;?>
					  </div>
					</div>

				</div>		
		<div class=" col-md-8">
			<div class="panel panel-default">
			   <div class="panel-heading"><h3 class="panel-title">List of Photos</h3></div>
				<div class="panel-body">		
       
    
					<?php
					
					$mydb->setQuery("SELECT * FROM `user_pro_pic` WHERE `user_id`=$sid");
					$cur = $mydb->loadResultList();
					foreach($cur as $object): ?>
							<a data-target="#myModall" data-toggle="modal" >
                           <?php  $path = $pc->gallery($object->profile_id,$user); ?>
					   		<img src="<?php echo $path; ?> " class="img-thumbnail" width="200" height="200" />
					  	 	</a>
					<?php endforeach;?>

					<!-- Modal -->

						<div class="modal fade" id="myModall" tabindex="-1">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-body">
								
										</div>

								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
				</div>
				</div>		
			</div>
	</div>	
     </section>
              
              </section>
      
      
  </section>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="js/tooltip.js"></script>
	<script src="assets/js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	 <script src="js/popover.js"></script>
	 <script>
		$(document).ready(function(){
           $('a img').on('click',function(){
                var src = $(this).attr('src');
                var image = '<img src="' + src + '" class="img-responsive"/>';
                $('#myModall').modal();
                $('#myModall').on('shown.bs.modal', function(){
                    $('#myModall .modal-body').html(image);
                });
                $('#myModall').on('hidden.bs.modal', function(){
                    $('#myModall .modal-body').html('');
                });
           });  
        })
	</script>
	
  </body>
</html>
