<?php
session_start(); 
if(!isset($_SESSION['add_id']))
{
	header("location:index.php");
}
include '../class/dp.php';
include '../class/user.php';
?>
      <header class="header facebook-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="viewuser.php" class="logo"><img src="../social/img/coms.png" alt="logo" width="35" height="35" class="img-circle"> <span class="lite">COEF</span></a>
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
                    
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                   
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li>
                        <a href="#">
                            <span class="profile-ava">
                                <img alt="" src="../social/img/coms.png" width="30" height="30">
                            </span>
                           <span class="username"><?php echo $_SESSION['name']; ?></span>
                            
                        </a>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->