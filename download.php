<?php require('header.php');

if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}
}
$id = $_GET['id'];
if(!$id){
header('location: index.php');
}
?>

<body style=""> 
<div class="download-container">
    <p style="margin-bottom:12px;font-size:23px;font-family:Roboto,Ariel,sans-serif;">Thanks for downloading from our website</p>
    <?php 
    $sql = "Select * FROM product WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
 if($row = mysqli_fetch_assoc($result)){ 
    ?>
    <a href="#" class="download-btn"><?php echo $row['filename']?><i class="fa fa-download"></i></a>
    <?php 
    }
    }
    ?>
    <div class="countdown"></div>
    <div class="pleasewait-text">Please wait..</div>
    <div class="manualDownload-text">
        If the download didn't start automatically, <a href="#" class="manualDownload-link">click here</a>
    </div>
</div>
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

<script type="text/javascript">
const downloadbtn = document.querySelector(".download-btn");
const countdown = document.querySelector(".countdown");
const pleaseWaitText = document.querySelector(".pleasewait-text");
const manualDownloadText = document.querySelector(".manualDownload-text");
const manualDownloadLink = document.querySelector(".manualDownload-link");
var timeLeft = 10;
downloadbtn.addEventListener("click", () => {
    downloadbtn.style.display = "none";
    countdown.innerHTML = "Download will begin automatically in <span>" + timeLeft +"</span> seconds.";

    var downloadTimer = setInterval(function timeCount(){
timeLeft -= 1;
countdown.innerHTML = "Download will begin automatically in <span>" + timeLeft +"</span> seconds.";
    if(timeLeft <= 0){
        clearInterval(downloadTimer);
        pleaseWaitText.style.display = "block";

        let download_href = "Software-files/<?php echo $row['filename']?>";
        window.location.href = download_href;
        manualDownloadLink.href = download_href;


        setTimeout(()=>{
            pleaseWaitText.style.display = "none";
            manualDownloadText.style.display = "block";
        },4000);
    }
    }, 1000);
});
    </script>
</body>
<?php require('footer.php')?>   