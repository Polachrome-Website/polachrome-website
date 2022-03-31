    <?php 
        $active = 'Testimonials';
        include("includes/header.php");
    ?> 

    <head>
        <title>Testimonials</title>
        <!--Main css-->
        <link rel="stylesheet" href="styles/testimonial.css">

    </head>
    <body>

        <!--Background img-->
        <div class="bg-img"> 
            <!-- <img src="img/testimonial.png" class="bg-img"/>   -->
            <div class="container">

                <!--Heading-->
                <div class="row">
                    <div class="heading col">
                        <h1>Customer <br> Feedbacks</h1>
                    </div>
                </div>
                
                <div class="testimonials">
                    <div class="row">
                         <!--Feeback 1-->
                        <div class="col-md-3">
                            <div class="card col">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                </p>
                                <p style="text-align: right;"><i>Anonymous Writer</i></p>
                            </div>
                        </div>

                        <!--Feeback 1-->
                        <div class="col-md-3">
                            <div class="card col">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                </p>
                                <p style="text-align: right;"><i>Anonymous Writer</i></p>
                            </div>
                        </div>

                        <!--Feeback 1-->
                        <div class="col-md-3">
                            <div class="card col">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                </p>
                                <p style="text-align: right;"><i>Anonymous Writer</i></p>
                            </div>
                        </div>
                    </div>

                   
                        
                 
                </div>
  
            </div>
        </div>

        <!--Bootsrap JS cdn-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="scripts/navbar.js"></script>
    
  </body>

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