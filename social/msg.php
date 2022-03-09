
<!DOCTYPE html>
<html lang="en">
  <head>
    

    <title>Chat</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
     <link href="css/msg.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
<script src="jquery-3.1.1.js"></script>
 <script>
 /*
   $(document).ready(function(e){
             $('#sndmsg').click(function(){
				 
				 var nam = $('#name').val();
				 var sid = $('#id').val();
				 var mg = $('#msg').val();
				  $.post("message.php",{name:nam,id:sid,msg:mg},function(data){
						$('#status').html(data);
						document.getElementById('msg').value="";	
						});
				 });
                });
			*/	
  </script>
<script>
		function ajax(){
		
		var req = new XMLHttpRequest();
		var mid = document.getElementById('mid').value;
		req.onreadystatechange = function(){
		
		if(req.readyState == 4 && req.status == 200){
		
		document.getElementById('chat').innerHTML = req.responseText;
		} 
		}
		req.open('GET','chat.php?mid='+mid,true); 
		req.send();
		
		}
		setInterval(function(){ajax()},1000);
	</script>
    </head>
  <body onload="ajax();">
  <!-- container section start -->
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
       
       <div class="col-md-4 portlets">
            <div class="panel panel-default">
				<div class="panel-heading">
                  <div class="pull-left">Messages</div>
            </div>
            </div>
            <div id="msgbar">
            <ul class="msg-menu">  
            <!--  <span class="photo1"><img alt="avatar" src="'.$path.'"> -->              
                   <?php
				   //substr($row->post_content,0,100);
				  
				   
				  
				   // $myq = "SELECT DISTINCT with_id FROM $uname ORDER BY Msg_ID DESC ";
				    $myq = "SELECT DISTINCT with_id FROM message where with_id!=$ssid  ORDER BY Msg_ID DESC ";
					$mydb->setQuery($myq);
					$res=$mydb->selection();
					if($mydb->rowCount()==0)
					{
						$ttid = 0;
					}
						
						while($rw = $res->fetch())
						{
							$ttid = $rw->with_id;
							
							$sql = "select * from message where (to_id=$ttid and from_id=$sid) or (from_id=$ttid and to_id=$sid) ORDER BY Msg_ID DESC";
							  $mydb->setQuery($sql);
							  $result=$mydb->selection();
							  $row=$result->fetch();
								  $tid=$row->to_id;
								  $tname=$row->to_name;
								  $fid=$row->from_id;
								  $fname=$row->from_name;
								  $Msg=substr($row->Msg,0,30);
								  $Date=$row->date;
								  $user =  $us->username($ttid);
								  $path = $pc->profile($ttid,$user);
							   if($tid!=$_SESSION['id'])
							   {
								   echo '
									<li>                     
									<a class="" href="msg.php?mid='.$ttid.'">
									<span class="subject1">
									<span class="photo1"><img  src="'.$path.'" alt="">
									<span class="from1">'.$tname.'</span>
									<span class="time1">'.formatDate($Date).'</span>
									
									<span class="message1">
										<b>You</b> :'.$Msg.'
									</span>
									</span>
									</span>
									
									 
							  </a>
												 
						  </li>
								   
								   ';
							  }
								   else
								   {
										echo '
									<li>                     
									<a class="" href="msg.php?mid='.$ttid.'">
									<span class="subject1">
									<span class="photo1"><img  src="'.$path.'" alt="">
									<span class="from1">'.$fname.'</span>
									<span class="time1">'.formatDate($Date).'</span>
									<span class="message1">
										'.$Msg.'
									</span>
									 </span>
									 </span>
									
									
							  </a>
												 
						  </li>
								   
								   ';
								   }
						}
						
					
				   ?>
                      
              </ul>
              </div>
            </div>
            <?php
if(isset($_GET['mid']))
{
 $mid = $_GET['mid']; 
}
else
{
	$mid=$ttid;
}

  ?>
            <div class="col-md-7 portlets">
              <!-- Widget -->
             
              <div class="panel panel-default">
				<div class="panel-heading">
                  <div class="pull-left">Chat</div>
                 
                 <!-- start -->
                 			  <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
<!--<ul>
<li  class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href=""  >
                                <p class="text-center">
                                 <strong> Delete</strong>
                                 </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    </ul> -->
                    </div>
                 
                 <!-- end -->
                  <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                  <!-- Widget content -->
                  <?php   
				  $sql = "SELECT * FROM `registration` WHERE `user_id`=$mid";
				  $mydb->setQuery($sql);
				  $r =  $mydb->selection();
				  $c1 = $mydb->rowcount();
				   $sql = "SELECT * FROM `registration";
				  $mydb->setQuery($sql);
				  $r =  $mydb->selection();
				  $c2 = $mydb->rowcount();
				  if($c1==1)
				  {
				   ?>
                   <div class="widget-foot">
                   <!--  Message validation  -->
                      <script>
					  function valid()
					  {
						  var val = document.getElementById('msg').value;
						  if(val=='')
						  {
							  alert('You can not send empty message');
							  return false;
						  }
					  }
					  
					  </script>
                      <form method="post" action="ssmg.php" onSubmit="return valid()">
                      
                       <div class="panel-body">
							 <input type="hidden" name="mid" id="mid" value="<?php echo $mid; ?>">
							<textarea class="form-control input-sm" id="msg" name="msg" placeholder="Type your message here..."></textarea>
								
						</div>
                       <div class="panel-footer" align="right">
							<button class="btn btn-primary btn-sm" type="submit" name="mess">Send</button>
						</div>
                       
                      </form>
 
                  </div>
          <?php  }
		  else if($c2==0)
		  {
		   ?>
            <input type="hidden" name="mid" id="mid" value="<?php echo $mid; ?>">
           <p style="color:red;"> you cannot send message to this user </p>
           
           <?php } 
		   else
		   {
			   ?>
                <input type="hidden" name="mid" id="mid" value="<?php echo $mid; ?>">
           
	   <?php
	    }
		   ?>
                  <div class="padd sscroll">
                    
                    <ul class="chats">

                      <!-- Chat by us. Use the class "by-me". -->
                    <div id="chat">
                    </div>
                    </ul>
					 <?php

?>
                  </div>
                  <!-- Widget footer -->
                 
                </div>


              </div> 
            
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
