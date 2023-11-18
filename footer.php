<style>
    .footer {
    width: 100%;
    background: #fff;
    display: block;
}

.inner-footer {
    width: 95%;
    margin: auto;
    padding: 30px 10px;
    display: flex;
    flex-wrap:wrap;
   justify-content:space-between; 
}

.footer-items {
    width: 33%;
    padding: 10px 20px;
    box-sizing: border-box;
    
}

.footerheading {
padding: 10px;
font-size: 25px;
color: #222;
text-transform: uppercase;
font-family:Roboto,Ariel,sans-serif;}

.footer-items p {
    color: black;
    font-size: 16px;
    text-align: justify;
    line-height: 25px;
    font-family:Roboto,Ariel,sans-serif;  
}
.footer-items h3 {
    margin: 10px;
    color:black;
    font-size: 25px;
    text-transform: uppercase;
    font-family: Roboto,Ariel,sans-serif;
}
.border1 {
    border: none;
}
.border1 ul li  { font-family: sans-serif;
    color: black;
    line-height: 1.7em; 
    border: none; 
    text-decoration: none; 
    margin-left: 15px;
    transition: 0.3s;
list-style-type:none;
}

.border1 ul a {
    font-size: 16px;
font-family: Roboto,Ariel,sans-serif;
    text-decoration: none;
}

.border1 ul li:hover {
    color: purple;
}

.social-media {
    padding: 10px;
}
.social-media i {
    color: white;
    display: inline;
    margin: 5px ;
    padding: 10px 10px;
    font-size: 1.5em;
    border: 1px solid white;
    border-radius:10px;
text-decoration: none;
}
#connectwithus {display: flex; width: 8em;line-height: 2em;
	margin-top: 0; color: white;
	}
.social-media i:hover {
color: purple;}

.social-media a:hover {
    text-decoration: none;
    
}
.footer-bottom {
    width:100%;
    color: gray;
    display:flex;
    justify-content:center;
    text-align:center;
}

@media screen and (max-width:700px) {
    .footer-items {
        display:inline-table;
        width:100%
    }
	.social-media i {
		position: relative;left: 1.5em;
	}
    .social-media { 
        margin-top:3em;
        margin: -10px;
    }
    .footer-bottom {
        text-align: center;
    }
}

</style>
<div class="footer">
        <div class="inner-footer">
            <div class="footer-items">
            <h2 class="footerheading" style="font-size:30px; display:flex;justify-content:center;align-items:center;">Fringoman</h2>

            </div>
            <div class="footer-items">
            <h3 style="color: #222; border-bottom: 3px solid purple">Know more about us</h3>
                <div class="border1">
                <ul>
                    <a href="index.php"><li>Home</li></a>
                    <a href="AboutUs.php"><li>About Us</li></a>
                    <a href="privacy-policy.php"><li>Privacy Policy</li></a>
                    <a href="terms-and-conditions.php"><li>Terms and Condition</li></a>
                    </ul>
                </div>
            </div>
            <div class="footer-items">
            <h3 style="color: #222;border-bottom: 3px solid purple">Contact Us</h3>
                <div class="border1">
                <ul>
                    <a href="contact.php"><li><i class="fa fa-envelope" aria-hidden="true"></i> Contact form</li></a>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i> Support@fringoman.in</li>
                    </ul>
                   
                </div>
            </div>
            <div class="footer-bottom" style="">
            Copyright &copy; Fringoman <?php echo date('Y')?>. All rights reserved.
            
            </div>
            </div>
        </div>

    </body>
</html>

