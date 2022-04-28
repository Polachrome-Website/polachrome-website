<?php
    $active='Home';
    include("includes/header.php");

?>
    <head>

        <title>Home</title>

        <!--Bootsrap 4-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--Font Awesome icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

        <!--Bangers font gFonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
  
        <!--Main css-->
        <link rel="stylesheet" href="styles/home.css">
    </head>
    <body>
        <!--Body-->

        <!--Fixed Background-->
        <div class="bg-img">
            <h1 class="title" style="margin-top: 340px; font-size: 100px; 
            text-shadow: 1px 2px rgba(0,0,0,0.5);">PolaChrome</h1>
            <h5 class="title">Bringing Polaroid products in the Philippines</h5>
            <a href="product.php"><input type="button" class="btn-main" value ="SHOP NOW"></a>
            <!--Cameras-->
            <div class="section-1 box">
                <h2 style="text-align:left;">Product Categories</h2>

                <!--Product Categories-->
                <div class="row">
                    <div class="cameras col">
                        <div class="overlay">
                            <h3>Cameras</h3>
                            <p>Take pictures, view and share prints instantly.</p>
                            <a href="product.php"><input type="button" class="sm-btn" value ="Shop Now"></a>
                        </div>
                    </div>

                    <div class="films col">
                        <div class="overlay">
                            <h3>Films</h3>
                            <p>Stock up your Polaroid films.</p>
                            <a href="product.php"><input type="button" class="sm-btn" value ="Shop Now"></a>
                        </div>
                    </div>
                    
                    <div class="accessories col">
                        <div class="overlay">
                            <h3>Accessories</h3>
                            <p>Take your camera anywhere with our Polaroid camera bags and straps.</p>
                            <a href="product.php"><input type="button" class="sm-btn" value ="Shop Now"></a>
                        </div>
                    </div>

                    <div class="none col">
                    </div>


                </div>
            </div>

            <!--Featured Cameras-->
            <div class="section-2 box">
                <h2>Cameras</h2>
                <div class="row">
                    <div class="col">
                        <a href="product.php" class="card">
                            <div class="prod-img" style="background-image: url(img/products/go_black_side.webp);"></div>
                            <h3>Polaroid Go</h3>
                            <input type="button" class="featured-btn" value ="More info">
                        </a>
                    </div>
                    <div class="col">
                        <a href="product.php" class="card">
                            <div class="prod-img" style="background-image: url(img/products/now_front-tilted.webp);"></div>
                            <h3>Polaroid Now</h3>
                            <input type="button" class="featured-btn" value ="More info">
                        </a>
                    </div>
                    <div class="col">
                        <a href="product.php" class="card">
                            <div class="prod-img" style="background-image: url(img/products/now+.webp);"></div>
                            <h3>Polaroid Now+</h3>
                            <input type="button" class="featured-btn" value ="More info">
                        </a>
                    </div>
                    <div class="col">
                        <a href="product.php" class="card">
                            <div class="prod-img" style="background-image: url(img/products/sx2.png);"></div>
                            <h3>Polaroid SX70</h3>
                            <input type="button" class="featured-btn" value ="More info">
                        </a>
                    </div>
                </div>
            </div>

            <!--Featured Films-->
            <div class="section-2 box">
                <h2>Films</h2>
                <div class="row">
                    <div class="col">
                        <a href="product.php" class="card">
                            <div class="prod-img" style="background-image: url(img/products/f600-Film.webp);"></div>
                            <h3>600 Film</h3>
                            <input type="button" class="featured-btn" value ="More info">
                        </a>
                    </div>
                    <div class="col">
                        <a href="product.php" class="card">
                            <div class="prod-img" style="background-image: url(img/products/sx70-film.webp);"></div>
                            <h3>Polaroid iType Film</h3>
                            <input type="button" class="featured-btn" value ="More info">
                        </a>
                    </div>
                    <div class="col">
                        <a href="product.php" class="card">
                            <div class="prod-img" style="background-image: url(img/products/sx70-film.webp);"></div>
                            <h3>Polaroid SX70 Film</h3>
                            <input type="button" class="featured-btn" value ="More info">
                        </a>
                    </div>
                    <div class="col">
                        <a href="product.php" class="card">
                            <div class="prod-img" style="background-image: url(img/products/gofilm1.webp);"></div>
                            <h3>Polaroid Go Film</h3>
                            <input type="button" class="featured-btn" value ="More info">
                        </a>
                    </div>
                </div>
            </div>

            <!--Featured Accessories-->
            <div class="section-2 box" style ="margin-bottom: 30px;">
                <div class="col-lg-auto">
                    <h2>Accessories</h2>
                    <h3 style="margin-top: 30px;">Polaroid Camera Flat Strap</h3>
                    <div class=row>
                        <!--Straps-->
                        <div class="col-sm-6" style="width:fit-content; float: right;">
                            <p>An effortless accessory for Polaroid Now, OneStep+ and OneStep 2 cameras. Featuring Polaroid branding and a no-snag plastic 
                                release, grab this wide and flat camera strap for more hands-off moments.
                            </p>
                            <a href="product.php"><button class="btn">More info</button></a>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2">
                            <div class="featured-img" style="background-image: url(img/products/flat-strap-yellow.webp)"></div> 
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
                        <h3 style="color:white;">We're here to help</h3>
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