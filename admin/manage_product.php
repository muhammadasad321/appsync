<?php
require('top.inc.php');
$condition='';
$condition1='';
if($_SESSION['ADMIN_ROLE']==1){
	$condition=" and product.added_by='".$_SESSION['ADMIN_ID']."'";
	$condition1=" and added_by='".$_SESSION['ADMIN_ID']."'";
}
$id='';
$categories_id='';
$name='';
/*$mrp='';
$price='';
$qty='';*/
$soft_comp='';
$comp_url='';
$Tag_line='';
$image='';
$filename='';
$description='';
$meta_title	='';
$meta_desc	='';
$meta_keyword='';
$popular='';
$latest='';
$best_deal='';
$sub_categories_id='';
$added_on=date('Y-m-d h:i:s');
$msg='';
$image_required='required';
$filename_required='required';



if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$filename_required='';

	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id' $condition1 ");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['categories_id'];
		$sub_categories_id=$row['sub_categories_id'];
		$name=$row['name'];
		$soft_comp=$row['soft_comp'];
		$comp_url=$row['comp_url'];
		$Tag_line=$row['Tag_line'];
		$description=$row['description'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
		$popular=$row['popular'];
		$latest=$row['latest'];
		$best_deal=$row['best_deal'];
        
	}else{
		header('location:product.php');
		die();
	}
}
if(isset($_POST['submit'])){
    $categories_id=get_safe_value($con,$_POST['categories_id']);
	$sub_categories_id=get_safe_value($con,$_POST['sub_categories_id']);
	$name=get_safe_value($con,$_POST['name']);
	/*$mrp=get_safe_value($con,$_POST['mrp']);
	$price=get_safe_value($con,$_POST['price']);
	$qty=get_safe_value($con,$_POST['qty']);*/
	$soft_comp=get_safe_value($con,$_POST['soft_comp']); 
	$comp_url=get_safe_value($con,$_POST['comp_url']); 
	$Tag_line=get_safe_value($con,$_POST['Tag_line']);
	$description=get_safe_value($con,$_POST['description']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$meta_desc=get_safe_value($con,$_POST['meta_desc']);
	$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
	$popular=get_safe_value($con,$_POST['popular']);
	$latest=get_safe_value($con,$_POST['latest']);
	$best_deal=get_safe_value($con,$_POST['best_deal']);
	

	$res=mysqli_query($con,"select * from product where name='$name' $condition1 ");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Software already exist";
			}
		}else{
			$msg="Software already exist";
		}
	}
	
	if(isset($_GET['id']) && $_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}

	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				if($_FILES['filename']['name']!=''){
				$filename=rand(111111111,999999999).'_'.$_FILES['filename']['name'];
				move_uploaded_file($_FILES['filename']['tmp_name'],SOFTWARE_FILE_SERVER_PATH.$filename);
					
 $update_sql="update product set categories_id='$categories_id',name='$name',soft_comp='$soft_comp',comp_url='$comp_url',Tag_line='$Tag_line',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image',filename='$filename',latest='$latest',popular='$popular',best_deal='$best_deal',sub_categories_id='$sub_categories_id' where id='$id'";
				}}else{
				 $update_sql="update product set categories_id='$categories_id',name='$name',soft_comp='$soft_comp',comp_url='$comp_url',Tag_line='$Tag_line',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',latest='$latest',popular='$popular',best_deal='$best_deal',sub_categories_id='$sub_categories_id' where id='$id'";
			}
			if(isset($update_sql)) {
			mysqli_query($con,$update_sql);}
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			$filename=rand(111111111,999999999).'_'.$_FILES['filename']['name'];
			move_uploaded_file($_FILES['filename']['tmp_name'],SOFTWARE_FILE_SERVER_PATH.$filename);
		
			mysqli_query($con,"insert into product(categories_id,name,soft_comp,comp_url,Tag_line,	description,meta_title,meta_desc,meta_keyword,status,image,filename,popular,latest,best_deal,sub_categories_id,added_by,added_on) values('$categories_id','$name','$soft_comp','$comp_url','$Tag_line','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image','$filename','$latest','$popular','$best_deal','$sub_categories_id','".$_SESSION['ADMIN_ID']."','$added_on')");
			}
header('location:product.php');
die();
	}
}

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Software</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block" style="">
							    	<div class="col-md-12" style="display:flex">
							   <div class="form-group" style="width:100%;">
									<label for="categories" class=" form-control-label">Software Categories</label>
									<select class="form-control" name="categories_id" id="categories_id" onchange="get_sub_cat('')" required>
										<option>Select Software Category</option>
										<?php
										$res=mysqli_query($con,"select id,categories from categories order by categories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								
								<div class="form-group" style="width:100%;">
									<label for="categories" class=" form-control-label">Software Sub Categories</label>
									<select class="form-control" name="sub_categories_id" id="sub_categories_id">
										<option>Select Sub Category</option>
									</select>
								</div>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Software Name</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Software Company</label>
									<input type="text" name="soft_comp" placeholder="Enter Software company name" class="form-control" required value="<?php echo $soft_comp?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Software Company Url</label>
									<input type="text" name="comp_url" placeholder="Enter Software company url" class="form-control" required value="<?php echo $comp_url?>">
								</div>
                            	
								<div class="form-group">
									<label for="categories" class=" form-control-label">Tag Line</label>
									<input type="text" name="Tag_line" placeholder="Enter Software Tag Line" class="form-control" required value="<?php echo $Tag_line?>">
								</div>
                            				  <?php if($_SESSION['ADMIN_ROLE']!=1){?>

								<div class="flex-row" style="">
								<div class="form-group"style="width:100%;">
									<label for="categories" class=" form-control-label">Popular Software</label>
									<select class="form-control" name="popular" required>
										<option value=''>Select</option>
										<?php
										if($popular==1){
											echo '<option value="1" selected>Yes</option>
												<option value="0">No</option>';
										}elseif($popular==0){
											echo '<option value="1">Yes</option>
												<option value="0" selected>No</option>';
										}else{
											echo '<option value="1">Yes</option>
												<option value="0">No</option>';
										}
										?>
									</select>
								</div>
								<div class="form-group"style="width:100%;">
									<label for="categories" class=" form-control-label">Latest Software</label>
									<select class="form-control" name="latest" required>
										<option value=''>Select</option>
										<?php
										if($latest==1){
											echo '<option value="1" selected>Yes</option>
												<option value="0">No</option>';
										}elseif($latest==0){
											echo '<option value="1">Yes</option>
												<option value="0" selected>No</option>';
										}else{
											echo '<option value="1">Yes</option>
												<option value="0">No</option>';
										}
										?>
									</select>
								</div>
								<div class="form-group"style="width:100%;">
									<label for="categories" class=" form-control-label">Best Deal of the Day</label>
									<select class="form-control" name="best_deal" required>
										<option value=''>Select</option>
										<?php
										if($best_deal==1){
											echo '<option value="1" selected>Yes</option>
												<option value="0">No</option>';
										}elseif($best_deal==0){
											echo '<option value="1">Yes</option>
												<option value="0" selected>No</option>';
										}else{
											echo '<option value="1">Yes</option>
												<option value="0">No</option>';
										}
										?>
									</select>
								</div>
								</div>
                            	  <?php } ?>
                           										<div class="flex-row">
								<div class="form-group">
									<label for="categories" class=" form-control-label">Software Image</label>
									<input type="file" name="image" accept=".jpg,.png,.pdf" class="form-control" >
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Software file</label>
									<input type="file" name="filename" accept=".exe,.rar,.zip" class="form-control">
								</div>
								 </div>
								
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="description" placeholder="Enter product description" class="form-control" id="editor1" ><?php echo $description?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Title</label>
									<textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Description</label>
									<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Keyword</label>
									<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 
		 <script>
			function get_sub_cat(sub_cat_id){
				var categories_id=jQuery('#categories_id').val();
				jQuery.ajax({
					url:'get_sub_cat.php',
					type:'post',
					data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
					success:function(result){
						jQuery('#sub_categories_id').html(result);
					}
				});
			}
		
		 </script>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckfinder/ckfinde.js"></script>
<script>
CKEDITOR.replace('editor',{
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});
CKEDITOR.replace('editor1',{
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});
</script>
<style>
			 
			 #flex {display:flex;width:100%;}
			 .form-group {width:100%;
				 padding:2px;
			 }
    .flex-row {
display: flex}
    @media only screen and (max-width:800px){
        .flex-row {
display: block;}
    }
		 </style>
<?php
require('footer.inc.php');
?>
<script>
		 <?php
if(isset($_GET['id'])){
?>
get_sub_cat('<?php echo $sub_categories_id?>');
	<?php } ?>
    
    	function get_sub_cat(sub_cat_id){
				var categories_id=jQuery('#categories_id').val();
				jQuery.ajax({
					url:'get_sub_cat.php',
					type:'post',
					data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
					success:function(result){
						jQuery('#sub_categories_id').html(result);
					}
				});
			}
    	
			function remove_attr(attr_count,id){
				jQuery.ajax({
					url:'remove_product_attr.php',
					data:'id='+id,
					type:'post',
					success:function(result){
						jQuery('#attr_'+attr_count).remove();
					}
				});
			}
    var attr_count=1;
			function add_more_attr(){
				attr_count++;
				
				var size_html=jQuery('#attr_1 #size_id').html();
				size_html=size_html.replace('selected','');
				
				var color_html=jQuery('#attr_1 #color_id').html();
				color_html=color_html.replace('selected','');
				
				var html='<div class="row mt20" id="attr_'+attr_count+'"> <div class="col-lg-2"><label for="categories" class=" form-control-label">MRP</label><input type="text" name="mrp[]" placeholder="MRP" class="form-control" required="" value=""> </div> <div class="col-lg-2"><label for="categories" class=" form-control-label">Price</label><input type="text" name="price[]" placeholder="Price" class="form-control" required="" value=""> </div> <div class="col-lg-2"><label for="categories" class=" form-control-label">Qty</label><input type="text" name="qty[]" placeholder="Qty" class="form-control" required="" value=""> </div> <div class="col-lg-2"><label for="categories" class=" form-control-label">Size</label><select class="form-control" id="size_id" name="size_id[]">'+size_html+'</select> </div> <div class="col-lg-2"><label for="categories" class=" form-control-label">Color</label><select class="form-control" id="color_id" name="color_id[]">'+color_html+'</select> </div> <div class="col-lg-2"><label for="categories" class=" form-control-label">&nbsp;</label><button id="" type="button" class="btn btn-lg btn-danger btn-block" onclick=remove_attr("'+attr_count+'")><span id="payment-button-amount">Remove</span></button> </div><input type="hidden" name="attr_id[]" value=""/></div>';
				jQuery('#product_attr_box').append(html);
			}
			
</script>
