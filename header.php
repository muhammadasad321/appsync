<?php
if(isset($_SERVER['HTTP_REFERER'])){
    $previous = $_SERVER['HTTP_REFERER'];
    } 
require('connection.inc.php');
require('functions.inc.php');
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}




$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="Fringoman.in | Download software of your choice";
$meta_desc="";
$meta_keyword="fringoman.in,download software for windows, download latest versions of software, software download, download,download the,software downloading website, software for windows,  android application,apps,mac ios, download software in india, indian softwares, software download from indian website";
if($mypage=='soft-detail.php'){
	$product_id=get_safe_value($con,$_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));
	$meta_title=$product_meta['meta_title'];
	$meta_desc=$product_meta['meta_desc'];
	$meta_keyword=$product_meta['meta_keyword'];
}
?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/x-icon" href="/images/favicon.png">
<!-- Adsense Code-->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7009276487769931"
     crossorigin="anonymous"></script>
     
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-202014705-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-202014705-1');
</script>

    <!--styles -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
<!-- font awesome cdn-->   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title><?php echo $meta_title?></title>
    <meta name="description" content="<?php echo $meta_desc?>">
    <meta name="keywords" content="<?php echo $meta_keyword?>"> 
<link href="newstyles.css" rel="stylesheet">
<style>
 
</style>
</head>
<body>
    <div class="header">
<a href="index.php" class="logo" style="">Fringoman</a>
<ul class="navigation">
    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
<!--    <li><a href="Android.php"><i class="fa fa-android"></i> Android</a></li>-->
    <li><a href="index.php"><i class="fa fa-windows" aria-hidden="true"></i>
 Windows</a></li>
   
</ul>
<form action="search.php" method="get" style="">
<div class="search">
    <input type="search" name="str" class="" placeholder="Search here...">
   <i class="fa fa-search" aria-hidden="true"></i>
</div>
</form>
</div>
</body>
</html>