
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Home</title>

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
  <!-- container section start -->
  <section id="container" class="">
     
      
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
           <div class="row" style="padding:4%; margin-top:-15px;">
		    <div class="col-lg-12">
			<div class="row" style="background:#150CDF;">
			<div class="col-lg-12">		
			<h1>
			<div class="row">
			<div class="col-lg-2" align="right">
			<img src="img/coms.png" class="img-responsive img-circle" />
			</div>
			<div class="col-lg-10">
			<div align="left" style="padding-top:5%;">
			               COMSATS Online Education Forum
						   
			 </div>
			 
			 <div >
					<span style="padding-left:20%;">(</span>
					<span style="color:orange;">
					 Connect All
					 </span> 
					 <span>)</span>
					
			 </div>
			 
			   </div>
			   </div>
			</h1>
			</div>
			</div>	
			<h2 align="center" style="color:#FF8040;">
			
			</h2>
			<p style="font-size:16px; color:#000000;" align="justify">
			The <strong><b>COMSATS Online Education Forum</b></strong> is a discussion forum that gives information about various programming languages, general knowledge related questions, information related to Asp.net,Vb.net ,Java,Php,Os related questions,etc.<br><br>

This forum is useful for the students to get information related to various topics. There is a centralized database in which all the information is managed. The administrator acts as the highest authority and has the rights to update, delete and edit the database. The user has to create the account to access the data. Once the user has created the account in the database he becomes the connected user. When some other user asks the questions these connected user if knows the answer can reply the answer . The user who logged in can select the questions according to the category. The administrator can insert new topic dynamically. The connected user while logged in can exchange messages with each other. If the message is present in the database the answer is received to the person who asked the question immediately. When the user asks the question related to any topic all the related question and their answers will be displayed. This site also gives the number of times the question is viewed and number of times the question is answered. Student Can also upload his status and other people can like and comment on that status. This site also gives us information who had asked the questions and which users has replied to those question.This forum provides a platform to the students to get online education and get the solutions of their problems without leaving home. This forum allows students to share and ask questions within a meritocracy that does not need social connections to flourish.
			</p>
				
				
              </div>
			   </div>
			   
			     </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    
	 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>

   

  </body>
</html>
