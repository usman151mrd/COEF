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
                                    <?php if($sid==$_SESSION['id'])
									{
										echo '
									<a data-target="#EditBasicInfo" data-toggle="modal" href="" title="Click to edit Basic Information.">
                                    
									<button type="button" class="btn btn-default btn-sm pull-right" >
									  <span class="glyphicon glyphicon-pencil"></span> Edit
									</button>
									</a>
									';
									}
									?>
									</div>
								  </div>
								</div>
							  </div>

							  	
							<?php 
								$mydb->setQuery("SELECT * FROM `basic_info` WHERE `user_id`=".$sid);
								$info = $mydb->loadSingleResult();
								?>
								<div class="modal fade" id="EditBasicInfo" tabindex="-1">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button class="close" data-dismiss="modal" type="button">×</button>

																<h4 class="modal-title" id="myModalLabel">Basic Information</h4>
															</div>

																<div class="modal-body">
																	<div class="form-group">
																		<div class="rows">
																			<div class="col-md-12">
																				<div class="rows">
																					<div class="form-group">
																						<div class="rows">
																						  <div class="col-md-12">
																							<div class="col-md-4" id="Networks">
																							   <label for="network">Registration No: :</label>
																							</div>
																						   <div class="col-md-8">
																							  <input class="form-control input-sm" id="network" name="network" placeholder=
																							  "network" type="text" value="<?php echo (isset($info->networks)) ? $info->networks : 'None'; ?>">
																							</div>
																							
																						  </div>
																						</div>
																					  </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="gender">
																   <label for="sex">Gender :</label>
																</div>
															   <div class="col-md-8">
																 <!-- <input class="form-control input-sm" id="sex" name="sex" placeholder="sex" type="text" >-->
																	<select class="form-control input-sm" name="gender" id="gender">
																		<option value="Male">Male</option>
																		<option value="Female">Female</option>	
																	</select>	

																</div>
															  </div>
															</div>
														  </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="bday">
																   <label for="bday">Birth Day :</label>
																</div>
															   <div class="col-md-8">
																	<div class="rows">
																		<div class="col-md-12">
																			<div class="col-md-4">
																				<select class="form-control input-sm" name="mm">
																					<?php 
														                               $m = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
														                                foreach ($m as $month=>$value) {
														                                  echo '<option value='.$month.'>'.$value .'</option>';
														                                }
														                                ?>
																				</select>
																			</div>
																			<div class="col-md-4">
																				<select class="form-control input-sm" name="dd">
																					<?php 
																						$d = range(31, 1);
																						foreach ($d as $day) {
																							echo '<option value='.$day.'>'.$day.'</option>';
																						}
																					
																					?>
																				</select>
																			</div>
																			<div class="col-md-4">
																				<select class="form-control input-sm" name="yr">
																					<?php 
																						  $years = range(2010, 1900);
																						  foreach ($years as $yr) {
																							  echo '<option value='.$yr.'>'.$yr.'</option>';
																						  }
																					  
														    						  ?>
																				</select>
																			</div> 
																		</div>
																	</div>


																</div>
															  </div>
															</div>
														  </div>
												
														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="">
																   <label for="interested">Interested In :</label>
																</div>
															   <div class="col-md-8">
																<select class="form-control input-sm" name="interested" >
																		<option value="Women">Women</option>
																		<option value="Men">Men</option>	
																	</select>	

																</div>
															  </div>
															</div>
														  </div>

														   <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="">
																   <label for="status">City :</label>
																</div>
															   <div class="col-md-8">
																<input class="form-control input-sm" name="relstatus" >
																		

																</div>
															  </div>
															</div>
														  </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="language">
																   <label for="language">Favorite Language: :</label>
																</div>
															   <div class="col-md-8">
																  <Select class="form-control input-sm" id="language" name="language" >
                                                                   <?php
					 
					 $sql = "SELECT `pid`, `pname` FROM `programming`";
					 $mydb->setQuery($sql);
					 $result = $mydb->selection();
					 while($row = $result->fetch())
					 {
						 $subject = $row->pname;
							  echo '
								  <option value="'.$subject.'">
								  '.$subject.'
								  </option>   
								  ';    
					 }
						  ?>
                          </Select>
																</div>
															  </div>
															</div>
														  </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="Religion">
																   <label for="Religion">Favorite Subject :</label>
																</div>
															   <div class="col-md-8">
																  <input class="form-control input-sm" id="Religion" name="Religion" placeholder="What are your religious beliefs?" type="text" value="<?php echo (isset($info->religion)) ? $info->religion : 'None'; ?>">

																</div>
															  </div>
															</div>
														  </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="Reldesc">
																   <label for="Reldesc">Description :</label>
																</div>
															   <div class="col-md-8">
																  <textarea class="form-control input-sm" id="Reldesc" name="Reldesc" placeholder="" >
																	<?php echo (isset($info->rel_desc)) ? $info->rel_desc : 'None'; ?>
																</textarea>
																</div>
															  </div>
															</div>
														  </div>
														    <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="politicalviews">
																   <label for="politicalviews">Favorite Teacher :</label>
																</div>
															   <div class="col-md-8">
																  <input class="form-control input-sm" id="politicalviews" name="politicalviews"
																   placeholder="What are your political beliefs?" type="text"value="<?php echo (isset($info->political_view)) ? $info->political_view : 'None'; ?>">

																</div>
															  </div>
															</div>
														  </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="poldesc">
																   <label for="poldesc">Description :</label>
																</div>
															   <div class="col-md-8">
																  <textarea class="form-control input-sm" id="poldesc" name="poldesc" placeholder="" >
																	<?php echo (isset($info->pol_desc)) ? $info->pol_desc : 'None'; ?>
																</textarea>
																</div>
															  </div>
															</div>
														  </div>
														<div class="col-md-4"></div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button class="btn btn-default" data-dismiss="modal" type="button">Close</button> 
										<button class="btn btn-primary" name="savebasicinfo" type="submit">Save</button>
									</div>
							<!--	</form>-->
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
						</div>	
								
						
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
                
												
                        