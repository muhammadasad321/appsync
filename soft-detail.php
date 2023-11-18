<?php require('header.php');

if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}
}
?>
<style>


</style>
<div class="container-fluid">
    <div class="software-margin">
<div class="soft-detail">
    <div class="soft-detail-inner" id="soft-detail-section">
        <div class="soft-inner-title">
            
    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>">
    <div class="soft-inner-title-2">
    <h1><?php echo $get_product['0']['name']?></h1>
    <label><a href="<?php echo $get_product['0']['comp_url']?>"><?php echo $get_product['0']['soft_comp']?></a></label>
</div>
</div>

<button href=""><a href="download.php?id=<?php echo $get_product['0']['id']?>&name=<?php echo $get_product['0']['name']?>">Download: <?php echo $get_product['0']['name']?></a></button>
<p><?php echo $get_product['0']['description']?></p>
<div class="soft-inner-title">
    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>">
    <div class="soft-inner-title-2">
    <h2><?php echo $get_product['0']['name']?></h2>
    <label><a href="<?php echo $get_product['0']['comp_url']?>"><?php echo $get_product['0']['soft_comp']?></a></label>
</div>
</div>

<button href="#"><a href="download.php?id=<?php echo $get_product['0']['id']?>&name=<?php echo $get_product['0']['name']?>">Download: <?php echo $get_product['0']['name']?></a></button>
<div class="container-fluid">
<div class="explore-download">
<p>Explore related apps</p>
<?php 
$name=$_GET['name'];

    $sql2 = "Select product.* from product where product.name like '%$name%'  ";
    $res=mysqli_query($con,$sql2); ?>
    <?php
    while($rows=mysqli_fetch_assoc($res)){?>
    <div class="explore">
    
        <div class="explore-inner">
            <div class="explore-item">
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$rows['image']?>">
    <a href="" class="line-champ"><?php echo $rows['name']?></a>
    </div>   </div></div>
    
<?php
}

?>
</div>
</div>
    
</div>
    <div class="soft-cat-inner" id="latest-software">
<h2>Popular Softwares</h2>
<?php
							$get_product=get_product($con,7,'','','','','yes');
							foreach($get_product as $list){
							?>
        
<div class="lat-cat-inner" id="soft-detail-pop">
<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="<?php echo $meta_title?>">
<p><a href="soft-detail.php?id=<?php echo $list['id']?>&name=<?php echo $list['name']?>"><?php echo $list['name']?></a></p>
</div>
<?php }?>
</div>

</div>
</div>
</div>
<?php require('footer.php')?>