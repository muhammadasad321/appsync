<?php require('header.php');

$str=mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
	$get_product=get_product($con,'','','',$str);

}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$id='';
$added_on=date('Y-m-d h:i:s');


if($str!=''){
	mysqli_query( $con,"insert into searchterms(id,searchterms,added_on)values('$id','$str','$added_on')");
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
	

?>        
<div class="container-fluid" >
    <div class="soft-cat-margin">
<div class="soft-cat" style="">
    <div class="soft-cat-inner" id="cat-add-section" >
        <div class="cat-add-inner">
        <h2>advertisement</h2>
    </div>
        </div>
    <div class="soft-cat-inner" id="software-section">
	<?php if(count($get_product)>0){?>
 <?php
foreach($get_product as $list){

							?>

    <div class="cat-inner" style="padding-bottom:12px">
    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="<?php echo $list['name']?>">
       <div class="cat-title-inner"> 
       <h2><a href="soft-detail.php?id=<?php echo $list['id']?>&name=<?php echo $list['name']?>"><?php echo $list['name']?></a></h2>
       <label><?php echo $list['soft_comp']?></label>
       <h5><?php echo $list['Tag_line']?></h5>
</div>
<!--<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['cat_img']?>" alt="<?php echo $list['name']?>" class=catimg>-->
<div class="cat-inner" id="cat-down">
<a href="soft-detail.php?id=<?php echo $list['id']?>&name=<?php echo $list['name']?>"><button>Download</button></a>

</div>

</div>
<?php }?>
<?php }else { 
						echo "<h3 style='color:#00121b;font-weight:bold;font-size:2em;font-family:Ariel,;height:253px;float:left;width:100%;text-align:center;'>" .'Oops! Data not Found' . "</h3>";
					}?>

</div>

<div class="soft-cat-inner" id="latest-software">
<h2>Latest Software</h2>
<?php
							$get_product=get_product($con,7,'','','','','','','yes');
							foreach($get_product as $list){
							?>
        
<div class="lat-cat-inner">
<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="<?php echo $meta_title?>">
<p><a href="soft-detail.php?id=<?php echo $list['id']?>&name=<?php echo $list['name']?>"><?php echo $list['name']?></a></p>
</div>
<?php }?>
</div>
</div>
</div>
</div>

<?php require('footer.php')?>

















