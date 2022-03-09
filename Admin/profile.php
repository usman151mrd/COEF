<?php  
if(isset($_GET['id']))
{
	$sid = $_GET['id'];
}
else
{
	header("location:home.php");
}
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
    <link href="../Social/css/style-responsive.css" rel="stylesheet" />
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
							<p class="text-muted">Registration No:</p>	<p><?php echo (isset($info->networks)) ? $info->networks : 'None'; ?></p>
							<p class="text-muted">City :</p><p><?php echo (isset($info->rel_stats)) ? $info->rel_stats : 'None'; ?></p>
							<p class="text-muted">Birthday :</p>	<p><?php //echo bdate_toText($_SESSION['dob']); ?></p>
							<p class="text-muted">Favorite Language :</p>	<p><?php echo (isset($info->language)) ? $info->language : 'None'; ?></p>
                            <p class="text-muted"></p>interested in :	<p><?php echo (isset($info->interested_in)) ? $info->interested_in : 'None'; ?></p>
                            <p class="text-muted">Favorite Subject :  </p>	<p><?php echo (isset($info->religion)) ? $info->religion : 'None'; ?></p>
                            <p>
                            
								   <p class="text-muted"> Descriptions:</p>
								
								 <p>  <?php echo (isset($info->rel_desc)) ? $info->rel_desc : 'None'; ?></p>
                            </p>
                            <p class="text-muted">Favorite Teacher :</p>	<p><?php echo (isset($info->political_view)) ? $info->political_view : 'None'; ?></p>
                             <p>
                            
								   <p class="text-muted"> Descriptions:</p>
								
								 <p>  <?php echo (isset($info->political_view)) ? $info->political_view : 'None'; ?></p>
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

   <script src="../Social/js/jquery.js"></script>
    <script src="../Social/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../Social/js/jquery.scrollTo.min.js"></script>
    <script src="../Social/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
    <!--custome script for all page-->
    <script src="../Social/js/scripts.js"></script>


</body>
</html>
