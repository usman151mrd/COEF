<div class="well">
					<form action="pbasicinfo.php" class="form-horizontal well span9" method="post">
				 
					 <fieldset>
						<legend>Basic Information</legend>
						<div class="rows">
						<!---- this is the area where we are going to add the code for modal>-->
							<div class="col-xs-12"><!--Start row for basic Information-->

							<div class="form-group">
								<div class="rows">
								  <div class="col-md-12">
									<div class="col-md-4" id="Networks">
									   <H4><strong><strong></h4>
									</div>
									
									<div class="col-md-8">
                                  
									</div>
								  </div>
								</div>
							  </div>

							  	
							<?php 
								$mydb->setQuery("SELECT * FROM `basic_info` WHERE `user_id`=".$sid);
								$info = $mydb->loadSingleResult();
								?>
									
								
						
							  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="Networks">
								   <h5>Registration No :</h5>
								</div>
							   <div class="col-md-8">
							   	  <h5><a><?php echo (isset($info->networks)) ? $info->networks : 'None'; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
                       
<?php  

$result=$us->userdata($sid);
 ?>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="gender">
								     <h5>Gender :</h5>
								</div>
							   <div class="col-md-8">
								<h5><a><?php echo $result->user_gender; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="bday">
								   <h5>Birth Day :</h5>
								</div>
							   <div class="col-md-8">
								  <h5><a><?php echo $result->user_dob; ?>
                                  
                                  </a></h5>
								</div>
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="interest">
								   <h5>Interested In:</h5>
								</div>
							   <div class="col-md-8">
								  <h5><?php echo (isset($info->interested_in)) ? $info->interested_in: 'None'; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="relstats">
								   <h5>City :</h5>

								</div>
							   <div class="col-md-8">
								  <h5><a><?php echo (isset($info->rel_stats)) ? $info->rel_stats : 'None'; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="language">
								   <h5>Favorite Language :</h5>
								</div>
							   <div class="col-md-8">
								   <h5><a><?php echo (isset($info->language)) ? $info->language : 'None'; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="religion">
								   <h5>Favorite Subject :</h5>
								</div>
							   <div class="col-md-8">
								   <h5><a><?php echo (isset($info->religion)) ? $info->religion : 'None'; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>

						<div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="reldesc">
								   <h5>Descriptions:</h5>
								</div>
							   <div class="col-md-8">
								   <h5><a><p><?php echo (isset($info->rel_desc)) ? $info->rel_desc : 'None'; ?><p></a></h5>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="politicalview">
								   <h5>Favorite Teacher:</h5>
								</div>
							   <div class="col-md-8">
								   <h5><a><?php echo (isset($info->political_view)) ? $info->political_view : 'None'; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>

						<div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="poldesc">
								   <h5>Descriptions:</h5>
								</div>
							   <div class="col-md-8">
								   <h5><a><p><?php echo (isset($info->pol_desc)) ? $info->pol_desc: 'None'; ?></p></a></h5>
								</div>
							  </div>
							</div>
						  </div>	
										  
							</div>  
							</div><!--End row for basic Information-->
                            <!-- /.modal -->
            
					</fieldset>
				</form>

				</div>
                <!-- Modal -->
                
												
                        