      <!DOCTYPE html>
<html lang="en">
  <head>
    

    <title><?php echo $_GET['subject'];  ?></title>

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
 
  </head>

  <body>

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
    
              <div class="row">
      <div class="col-lg-12" >
                      <section class="panel">
                          
						  <div class="portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">My Question</div>
                    
                  
                </div>
                <div class="panel-body">
                <div id="msgbar">
           		 <ul class="msg-menu"> 
                <?php
				   //include '../db/database.php';
					//include '../class/user.php';
				    $myq = "SELECT DISTINCT with_id FROM $uname ORDER BY Msg_ID DESC ";
					$mydb->setQuery($myq);
					$res=$mydb->selection();
					$mydb->rowCount();
					
					while($rw = $res->fetch())
					{
						$ttid = $rw->with_id;
						$sql = "select * from $uname where (to_id=$ttid and from_id=$sid) or (from_id=$ttid and to_id=$sid) ORDER BY Msg_ID DESC";
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
						 
				echo '
                 		<li>                     
								<a class="" href="msg.php?mid='.$ttid.'">
								<span class="subject1">
								<span class="photo1"><img  src="'.$path.'" alt="">
								<span class="from1">Muhammad Usman</span>
								<span class="time1">'.formatDate($Date).'</span>
								</span>
								</span>
								<span class="message1">
									'.$Msg.'
								</span>
								 
						  </a>
											 
					  </li>
					
					  ';
					}
					  ?>
                      </ul>
                      </div>
             		 </div>
                            
                  </div>
              </div>
              
          </section>
          </div>
          </div>
         
      </section>
      <!--main content end-->
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
