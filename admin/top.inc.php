<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){
}else{
	header('location:login.php');
	die();
}
//$sql="select * from users order by id desc";
//$res=mysqli_query($con,$sql);
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	
	
   <body>
	   <script>
	function check() {
		document.getElementById("cat").style.width = "144px";
	}
	</script>
      <aside id="left-panel" class="left-panel" style="">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" style="color:black" class="main-menu collapse navbar-collapse">
             <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  
				  <li class="menu-item-has-children dropdown">
                     <a href="product.php" style="color:#111" >Add Software</a>
                  </li>
                  
				  <li class="menu-item-has-children dropdown">
                     <a href="categories.php" style="color:#111">Software Categories</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="sub_categories.php" style="color:#111">Software Sub Categories </a>
                  </li>
              
				  <li class="menu-item-has-children dropdown">
                  
                  </li>
				  <?php if($_SESSION['ADMIN_ROLE']!=1){?>
               <li class="menu-item-has-children dropdown">
                     <a href="Windows.php"style="color:#111;" >Windows app</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="Android.php"style="color:#111;" >Android app</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="Drivers.php"style="color:#111;" >Drivers app</a>
                  </li>
                  
                  <li class="menu-item-has-children dropdown">
                     <a href="Linux.php"style="color:#111;" >Linux software</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="Mac.php"style="color:#111;" >Mac IOS</a>
                  </li>
               <li class="menu-item-has-children dropdown">
                     <a href="banner.php"style="color:#111" >Banner</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="searchterms.php"style="color:#111" >What people are searching?</a>
                  </li>
				  
				  <?php } ?>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="product.php"><h1 style="font-family: Roboto,Ariel,sans-serif;font-size:30px;padding-top:2px;"> <span style="padding: 4px; padding-left: 20px; padding-right: 20px; font-size: 1em; background: purple;border-radius: 120px;"><span style="color: orange;">S</span><span style="color: #fff;">oftware</span></span></h1></a>
                  <a class="navbar-brand hidden" href="index.php">Softare</a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
   				        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false style="background:#111;padding:12px;"">Welcome <?php echo $_SESSION['ADMIN_USERNAME']?></a>	  
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
          <style>
          </style>