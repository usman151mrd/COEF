
<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li>
                      <a class="" href="profile.php">
                          <i class="icon_profile"></i>
                          <span> My Profile </span>
                      </a>
                  </li>
                    <li>                     
                      <a class="" href="msg.php">
                           <i class="icon_mail_alt"></i>
                          <span>Messages</span>
                          
                      </a>
                                         
                  </li>
                    
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>My subjects</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                     <ul class="sub">
                      <?php
					  
					  $x =$_SESSION['sem'];
					 $sql = " SELECT `sb_id`, `sb_name`, `s_id` FROM `subjects` WHERE `s_id`=$x";
					 $mydb->setQuery($sql);
					 $result = $mydb->selection();
					 while($row = $result->fetch())
					 {
						 $subject = $row->sb_name;
						 $sbid = $row->sb_id;
							  echo '
								  <li><a class="" href="book.php?sid='.$sbid.'">
								  '.$subject.'
								  </a></li>   
								  ';    
					 }
						  ?>                   
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          Programming
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                       <ul class="sub">
                           <?php
					 
					 $sql = "SELECT `pid`, `pname` FROM `programming`";
					 $mydb->setQuery($sql);
					 $result = $mydb->selection();
					 while($row = $result->fetch())
					 {
						 $subject = $row->pname;
						 $sub = $row->pid;
							  echo '
								  <li><a class="" href="prom.php?sid='.$sub.'">
								  '.$subject.'
								  </a></li>   
								  ';    
					 }
						  ?>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="contactus.php">
                          <i class="icon_genius"></i>
                          <span>Contact Us</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="about.php">
                          <i class="icon_piechart"></i>
                          <span>About Us</span>
                          
                      </a>
                                         
                  </li>
                             
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Setting</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                         <li><a class="" href="chngpass.php">Change password</a></li>
                          <li><a class="" href="updatename.php">Update Name</a></li>
                          <li><a class="" href="daccount.php">Delete Account</a></li>
                      </ul>
                  </li>
                   <li>                     
                      <a class="" href="logout.php">
                          <i class="icon_key_alt"></i>
                          <span>Log out</span>
                          
                      </a>
                                         
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>