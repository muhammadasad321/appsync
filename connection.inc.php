<?php
session_start();
$con=mysqli_connect("localhost","root","","software");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/');
define('SITE_PATH','/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'source/software-images/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'source/software-images/');
//product images save here

define('SOFTWARE_FILE_SERVER_PATH',SERVER_PATH.'Software-files/');
define('SOFTWARE_FILE_SITE_PATH',SITE_PATH.'Software-files/');


?>