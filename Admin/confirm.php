 <?php
 
 		session_start(); 
		
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
        if(isset($_POST['submit']))
        {
			include '../db/db.php';
		    include '../db/database.php';
            $code = $_POST['confirm'];
                    $mydb->setQuery("SELECT * FROM `Admin` WHERE `add_email`='{$_SESSION['email']}' AND `add_code`='$code'");
                    $r = $mydb->selection();
                    $count = $mydb->rowcount();
                    if($count==1)
                    {
						$row = $r->fetch();
                        $_SESSION['add_id']= $row->add_id;
						$_SESSION['name']=$row->add_name;
                         $mydb->setQuery("UPDATE `Admin` SET `add_code`='0' WHERE `add_id`=".$row->add_id);
                         $mydb->update();
                         if($mydb->uaffected_rows()==1)
						 {
                        	header("location:home.php");
							
						 }
						 else
						 {
							 header("location:confirm.php?err=Oops ! there occur an error");
 
						 }
                    }
 else {
      	header("location:confirm.php?err=Your Code was wrong! please check your email and try again");
 }
        }
        ?>
<!DOCTYPE html>
<?php
if(isset($_GET['err']))
{
 $err = $_GET['err'];
}  else {
    $err = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Confirmation page</title>

    <!-- Bootstrap CSS -->    
    <link href="../social/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../social/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../social/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../social/css/style.css" rel="stylesheet">
    <link href="../social/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" action="confirm.php" method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="text" class="form-control" name="confirm" placeholder="Confirmation Code">
            </div>
             <div style="color: red;font-size: 18px"><span class="text-center"><?php echo $err;   ?></span></div>
            <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Submit</button>
        </div>
      </form>
    </div>


  </body>
</html>
