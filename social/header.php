<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("location:../index.php");
}
include '../class/dp.php';
include '../class/user.php';
$uname = $_SESSION['unmae'];
if(isset($_GET['id']))
{
	$sid = $_GET['id'];
}
else
{
	$sid = $_SESSION['id'];
}
$ssid = $_SESSION['id'];
$ssname = $_SESSION['fname'].' '.$_SESSION['lname'];
?>
<script>
		function ajaax(){
		
		var req = new XMLHttpRequest();
		req.onreadystatechange = function(){
		
		if(req.readyState == 4 && req.status == 200){
		
		document.getElementById('not').innerHTML = req.responseText;
		} 
		}
		req.open('GET','not.php',true); 
		req.send();
		
		}
		setInterval(function(){ajaax()},1000);
	</script>
 <script>
		function hajax(){
		
		var req = new XMLHttpRequest();
		req.onreadystatechange = function(){
		if(req.readyState == 4 && req.status == 200){
		
		document.getElementById('headchat').innerHTML = req.responseText;
		} 
		}
		req.open('GET','headchat.php',true); 
		req.send();
		
		}
		setInterval(function(){hajax()},1000);
	</script>
      <header class="header facebook-bg" onLoad="ajaax();hajax();">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo"><img src="img/coms.png" alt="logo" width="35" height="35" class="img-circle"> <span class="lite">COEF</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form" action="search.php" method="post">
                            <input class="form-control" name="email" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- task notificatoin start -->
                    
                    <!-- task notificatoin end -->
                    <!-- inbox notificatoin start-->
                    <li id="mail_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important"><div id="not"></div></span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-blue"></div>
                          
                            <div id="headchat"></div>
                            <li>
                                <a href="msg.php">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                   
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li>
                        <a href="profile.php">
                            <span class="profile-ava">
                                <img alt="" src="<?PHP echo $pc->profile($ssid,$us->username($ssid));  ?>" width="30" height="30">
                            </span>
                           <span class="username"><?php echo $us->fullname($ssid); ?></span>
                            
                        </a>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->