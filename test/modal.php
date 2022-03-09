<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
									<!-- Modal -->
 <?php 
 require_once("../db/database.php");
 session_start();
 $sid = $_SESSION['id'];
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
																							   <label for="network">Networks :</label>
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
																   <label for="status">Relationship Status :</label>
																</div>
															   <div class="col-md-8">
																<select class="form-control input-sm" name="relstatus" >
																		<option value="Sinlge">Single</option>
																		<option value="In a Relationship">In a Relationship</option>
																		<option value="Maried">Maried</option>
																		<option value="Divorced">Divorced</option>
																		<option value="Engaged">Engaged</option>
																		<option value="It's Complicated">It's Complicated</option>
																		<option value="In an open Relationship">In an open Relationship</option>
																		<option value="Widowed">Widowed</option>

																	</select>	

																</div>
															  </div>
															</div>
														  </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="language">
																   <label for="language">Language :</label>
																</div>
															   <div class="col-md-8">
																  <input class="form-control input-sm" id="language" name="language" placeholder="Whats your language" type="text" value="<?php echo (isset($info->language)) ? $info->language : 'None'; ?>">
																</div>
															  </div>
															</div>
														  </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="Religion">
																   <label for="Religion">Religion :</label>
																</div>
															   <div class="col-md-8">
																  <input class="form-control input-sm" id="Religion" name="Religion" placeholder="What are your religious beliefs?" type="text" value="<?php echo (isset($info->religion)) ? $info['religion'] : 'None'; ?>">

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
																   <label for="politicalviews">Political Views :</label>
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
</body>
</html>