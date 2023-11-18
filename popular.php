<?php require('header.php');

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
$record=mysqli_num_rows(mysqli_query($con,"select * from product where popular='1' and status='1'"));
$pagi=ceil($record/$per_page);

$sql="select * from product where popular='1' and status='1' limit $start,$per_page";
$res=mysqli_query($con,$sql);


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

<div class="cat-inner" id="cat-down">
<a href="soft-detail.php?id=<?php echo $row['id']?>&name=<?php echo $row['name']?>"><button>Download</button></a>

</div>

</div>
<?php } } else {?>
	No records found
	<?php } ?>
  </ul>              
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

    

</div>
<style>
    .page-item {
        margin-top:30px;
        padding-bottom:12px;
        list-style-type:none;
    }
    .page-item a{
        background-color:purple;
        color:white;
        text-decoration:none;
        padding:8px;
        border-radius:5px;
    }
</style>    
<div class="soft-cat-inner" id="latest-software">
<h2>Advertisement</h2>
</div>
</div>
</div>


<?php require('footer.php')?>

















