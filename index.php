<?php

    $active='Home';
    include("includes/header.php");

?>
    <head>

        <title>Home</title>
  
        <!--Main css-->
        <link rel="stylesheet" href="styles/home.css">
    </head>
    <body>
        <!--Body-->

        <!--Fixed Background-->
        <div class="bg-img">

            <!--Cameras-->
            <div class="section-1 box">
                <h2>Product Categories</h2>

                <!--Product Categories-->
                <div class="row">
                    <div class="cameras col">
                        <div class="overlay">
                            <h3>Cameras</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <input type="button" class="sm-btn" value ="Shop Now">
                        </div>
                    </div>

                    <div class="instant-films col">
                        <div class="overlay">
                            <h3>Instant Films</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <input type="button" class="sm-btn" value ="Shop Now">
                        </div>
                    </div>

                    <div class="printers col">
                        <div class="overlay">
                            <h3>Printers</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <input type="button" class="sm-btn" value ="Shop Now">
                        </div>
                    </div>

                    <div class="films col">
                        <div class="overlay">
                            <h3>Films</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <input type="button" class="sm-btn" value ="Shop Now">
                        </div>
                    </div>
                </div>
            </div>

            <!--Featured Product 1-->
            <div class="section-2 box">
                <div class=row>
                    <div class="col-lg-auto">
                        <h2>Featured Product X</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at suscipit est. Aliquam ut accumsan mi. Integer ac lectus pharetra.</p>
                        <button class="btn">More info</button>
                    </div>

                    <div class="col-sm auto">
                        <div class="featured-img"></div>     
                    </div>      
                </div>
            </div>

            <!--Featured Product 1-->
            <div class="section-2 box">
                <div class=row>
                    <div class="col-sm auto">
                        <div class="featured-img"></div>     
                    </div>

                    <div class="col-lg-auto">
                        <h2>Featured Product X</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at suscipit est. Aliquam ut accumsan mi. Integer ac lectus pharetra.</p>
                        <button class="btn">More info</button>
                    </div>
        
                </div>
            </div>
    
        </div>

       
        
        <!--End of Body-->


        <!--Bootsrap JS cdn-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="scripts/navbar.js"></script>

        <?php 
        if (isset($_GET["status"])) {
            if ($_GET["status"] == "uploadsuccess") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Your payment was successfully posted. You may track the status of your order through the order tracking page.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
        }
        
        ?>
      
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
                            <li><a href="https://www.instagram.com/pola.chrome/"><i class="fab fa-instagram-square"></i> PolaChrome</i></a></li>
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