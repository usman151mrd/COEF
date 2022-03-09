
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
			<div class="row">
		<div class="col-md-3" style="background:#7BB2F4;" >
						
                        
				<?php
				$user = $us->username($sid);
				 $path = $pc->profile($sid,$user);
				 ?>
                 
                  <img src="<?php echo $path; ?>" class=" img-responsive img-rounded" style=" background:#159DE9; padding:10px;"/>
						
                     
				<!-- Modal -->
              
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
							<p class="text-muted">Networks:</p>	<p><?php echo (isset($info->networks)) ? $info->networks : 'None'; ?></p>
							<p class="text-muted">Relationship Status:</p><p><?php echo (isset($info->rel_stats)) ? $info->rel_stats : 'None'; ?></p>
							<p class="text-muted">Birthday:</p>	<p><?php echo bdate_toText($_SESSION['dob']); ?></p>
							<p class="text-muted">interested in:</p>	<p><?php echo (isset($info->interested_in)) ? $info->interested_in : 'None'; ?></p>
                            <p class="text-muted">Language:</p>	<p><?php echo (isset($info->language)) ? $info->language : 'None'; ?></p>
                            <p class="text-muted">Religion:</p>	<p><?php echo (isset($info->religion)) ? $info->religion : 'None'; ?></p>
                            <p class="text-muted">Political Views :</p>	<p><?php echo (isset($info->political_view)) ? $info->political_view : 'None'; ?></p>				            					            		
						</div>
					          
					</div>
					
					

				</div>
<?php  
$full = $us->fullname($sid);
  ?>
				<div class="col-md-9">
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
