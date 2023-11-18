<?php require('header.php');

$catsub_res=mysqli_query($con,"select * from sub_categories where status='1' and categories_id='61'");
$catsub_arr=array();
while($row=mysqli_fetch_assoc($catsub_res)){
	$catsub_arr[]=$row;	
}

?>
<div class="web-banner">
   <div class="banner-inner">
<h2>The Latest Version of the Best Software</h2>
<ul>
<li>Get the best free versions for windows
</li>
<li>Download the latest versions for windows
</li>

</ul>
<div class="banner-btn">
<a href="popular.php">Popular software</a>
<a href="latest.php">Latest software</a>
</div>
</div>
<div class="banner-inner">
    
<img src="images/banner-logo.png" >        
    
</div>
</div>

<div class="container-fluid">
<div class="page-content">
    <div class="page-inner-content">
        <h2>Categories</h2>
        <?php
										foreach($catsub_res as $list){
											?>
                            
        <table>
            <tr><td><a href="categories.php?id=<?php echo $list['categories_id']?>&sub_categories=<?php echo $list['id']?>"><?php echo $list['sub_categories']?></a></td>   </tr>
            </table>
        <?php }?>
    </div>
    <div class="page-inner-content" >
        <h2>Popular programs</h2>
        <?php
							$get_product=get_product($con,10,'','','','','yes');
							foreach($get_product as $list){
							?>
        <div class="popular-index">
            <div class="img-container">
         <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?> " alt="<?php echo $list['name']?>"></div>
         <a href="soft-detail.php?id=<?php echo $list['id']?>&name=<?php echo $list['name']?>"><?php echo $list['name']?></a>
         </div>
<?php }?>
    </div>
    <div class="page-inner-content">
        <p class="add-p">advertisement</p>
    </div>
</div>

</div>
<?php require('footer.php')?>