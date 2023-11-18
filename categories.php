<?php require('header.php');

if(!isset($_GET['id']) && $_GET['id']!=''){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}

$cat_id=get_safe_value($con,$_GET['id']);

$sub_categories='';
if(isset($_GET['sub_categories'])){
	$sub_categories=get_safe_value($con,$_GET['sub_categories']);
}

$per_page=10;
$start=0;
$current_page=1;
if(isset($_GET['start'])){
	$start=$_GET['start'];
	if($start<=0){
		$start=0;
		$current_page=1;
	}else{
		$current_page=$start;
		$start--;
		$start=$start*$per_page;
	}
}
$record=mysqli_num_rows(mysqli_query($con,"select product.* from product where product.status=1 and product.categories_id=$cat_id and product.sub_categories_id=$sub_categories "));
$pagi=ceil($record/$per_page);

$sql="select product.* from product where product.status=1 and product.categories_id=$cat_id and product.sub_categories_id=$sub_categories  limit $start,$per_page";
$res=mysqli_query($con,$sql);

?>        
<div class="container-fluid" >
    <div class="soft-cat-margin">
<div class="soft-cat" style="">
    <div class="soft-cat-inner" id="cat-add-section" >
        <div class="cat-add-inner">
        <p class="add-p">advertistment</p>
    </div>
        </div>
        <div class="soft-cat-inner" id="software-section">
	
    <?php 
	if(mysqli_num_rows($res)>0){
	while($row=mysqli_fetch_assoc($res)){?>
	<div class="cat-inner pb-100">
    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt="<?php echo $row['meta_title']?>">
       <div class="cat-title-inner"> 
       <h2><a href="soft-detail.php?id=<?php echo $row['id']?>&name=<?php echo $row['name']?>"><?php echo $row['name']?></a></h2>
       <label><?php echo $row['soft_comp']?></label>
       <h5><?php echo $row['Tag_line']?></h5>
</div>
<!--<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['cat_img']?>" class="catimg">-->
<div class="cat-inner" id="cat-down">

<a href="soft-detail.php?id=<?php echo $row['id']?>&name=<?php echo $row['name']?>"><button>Download</button></a>

</div>

</div>
<?php } } else {?>
	Oops! data not found
	<?php } ?>
        
  <ul class="pagination mt-30">
	<?php 
	for($i=1;$i<=$pagi;$i++){
	$class='';
	if($current_page==$i){
		?><li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i?></a></li><?php
	}else{
	?>
		<li class="page-item"><a class="page-link" href="?start=<?php echo $i?>"><?php echo $i?></a></li>
	<?php
	}
	?>
    
	<?php } ?>
</ul>
    

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

















