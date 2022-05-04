<?php
    $active = 'Contact';
	include("includes/header.php");
?>
    <head>

    <title>Ask PolaChrome</title>
    
   <!--Main css-->
   <link rel="stylesheet" href="styles/contact.css">

  </head>
  <body>

  <div class="bg-img">  <!--start bg-img-->
   <!--Left side, addresses-->
   <div class="contact-section" style="margin-top: 90px;">
      <div class="contact-info">
        <div><i class="fas fa-map-marker-alt"></i>Mexico, Pampanga and Sampaloc, Manila</div>
        <div><i class="fas fa-envelope"></i>polacrom@gmail.com</div>
        <div><i class="fas fa-phone"></i>0919 069 7815</div>
        <div><i class="fas fa-clock"></i>Mon - Fri 8:00 AM to 5:00 PM</div>
      </div>
	  
      <!--Right side, form-->
      <div class="contact-form">
        <h2>Ask PolaChrome</h2>
        <form class="contact" action="includes/contact.inc.php" method="post">
		<?php
			if(isset($_SESSION["userID"])){
				?>
				<input type="text" name="name" class="text-box" value="<?php echo $_SESSION["fullName"]?>" required>
				<input type="email" name="email" class="text-box" value="<?php echo $_SESSION["email"] ?>" required>
				<?php
			} else {
				?>
				<input type="text" name="name" class="text-box" placeholder="Your Name" required>
				<input type="email" name="email" class="text-box" placeholder="Your Email" required>
				<?php
			}?>
		
          <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
          <input type="submit" name="contact-us-submit" class="send-btn" value="Submit">
        </form>
      </div>
    </div>
</div> <!--end bg-img-->
        <?php
			if (isset($_GET["inquiry"])) {
				if ($_GET["inquiry"] == "success") {
                    echo "<script type='text/javascript'>
                
                        Swal.fire({
                            text: 'Inquiry received. Thank you for reaching out with Polachrome, we will keep in touch.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                            })
                            
                            </script>";
						}
					}

                    if (isset($_GET["inquiry"])) {
                        if ($_GET["inquiry"] == "error") {
                            echo "<script type='text/javascript'>
                        
                                Swal.fire({
                                    text: 'Something went wrong. Please try again.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                    })
                                    
                                    </script>";
                                }
                            }
            ?>

    <!--Bootsrap JS cdn-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="scripts/navbar.js"></script>
    <script src="scripts/script.js"></script>
  </body>


  <!--Footer Section-->
  <!--Footer Section-->
  <footer class="footer">
    <div class="row">
        <!--Logo-->   
        <div class="col-lg-3 col-md-6 col sm-6">
            <div class="footer-about">
                <h3>Contact Us</h3>
                <p><a href="contact.php">Get in touch</a> with our customer service team.</p>
                <img src="img/mop.png">
            </div>
        </div>

        <!--About-->
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
            <div class="footer-widget">
                <h6>ABOUT</h6>
                <ul class="social-icon">
                <li><a href="about.php">PolaChrome</a></li>
                <li><a href="about.php">Polaroid Features</a></li>
                <li><a href="about.php">Comparison Chart</a></li>
                </ul>
            </div>
        </div>

        <!--Follow us-->
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
            <div class="footer-widget">
                <h6>FOLLOW US</h6>
                <ul class="social-icon">
                    <li><a href="https://www.facebook.com/PolaChrome/"><i class="fab fa-facebook"></i> PolaChrome</i></a></li>
                    <li><a href="https://www.instagram.com/pola.chrome"><i class="fab fa-instagram-square"></i> PolaChrome</i></a></li>
                </ul>
            </div>
        </div>

        <!--Certificates-->
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
            <div class="footer-widget">
                <h6>CERTIFICATES</h6>
                <div class="dti-logo">
                    <img src="img/dti.png">
                </div>       
            </div>
        </div>

    </div>

    <!--Copyright-->
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="footer-copyright-text">
                <p>Copyright &copy; 2022 All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!--End of footer section-->
</html>
                           