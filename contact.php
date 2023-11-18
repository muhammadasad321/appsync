<?php require('header.php')?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<div class="main-wrapper">

  <div class="wrapper">
    <header>Send us a Message</header>
    <form action="#" method="post">
      <div class="dbl-field">
        <div class="field">
          <input type="text" id="name" name="name" placeholder="Enter your name">
          <i class='fas fa-user'></i>
        </div>
        <div class="field">
          <input type="email" id="email" name="email" placeholder="Enter your email">
          <i class='fas fa-envelope'></i>
        </div>
      </div>
      <div class="dbl-field">
        <div class="field">
          <input type="number"id="mobile" name="mobile" placeholder="Enter your mobile">
          <i class='fas fa-phone-alt'></i>
        </div>
        
      </div>
      <div class="message">
        <textarea placeholder="Write your message"id="message" name="message"></textarea>
        <i class="material-icons">message</i>
      </div>
      <div class="button-area">
        <button type="submit" onclick="send_message()">Send Message</button>
        <span></span>
      </div>
    </form>
  </div>
  </div>

</body>
</html>
<script>
function send_message(){
	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var message=jQuery("#message").val();
	
	if(name==""){
		alert('Please enter name');
	}else if(email==""){
		alert('Please enter email');
	}else if(mobile==""){
		alert('Please enter mobile');
	}else if(message==""){
		alert('Please enter message');
	}else{
		jQuery.ajax({
			url:'send_message.php',
			type:'post',
			data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
			success:function(result){
				alert(result);
			}	
		});
	}
}

</script>
        <!-- End Contact Area -->
		<!-- Google Map js -->
   
<?php require('footer.php')?>        