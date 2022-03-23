<?php
    include("includes/header.php");
   

    // if (isset($_POST['add-cart'])){
    //      print_r($_POST['productID']);
    //     if(isset($_SESSION['cart'])){

    //       $item_array_id = array_column($_SESSION['cart'],"productID"); //return array of productID

    //       if(in_array($_POST['productID'],$item_array_id)){
    //         echo "<script> alert('Product already added in cart') </script>";
    //         echo "<script> window.location = product-info.php </script>";

    //       }else{
    //         $count = count($_SESSION['cart']);
    //         $item_array = array(
    //           $product_id = $_POST['productID']
    //         );
            
    //         $_SESSION['cart'][$count] = $item_array;
    //         print_r($_SESSION['cart']);
    //       }

    //     }else{
    //       $item_array = array(
    //         $product_id = $_POST['productID']
    //       );

    //       //create new session variable
    //       $_SESSION['cart'][0] = $item_array;
    //       print_r($_SESSION['cart']);
    //     }

    // }

?>

    <title>Product - <?php echo $pro_title; ?></title>

    <link rel="stylesheet" href="styles/product-info.css">

  </head>
  <body>

    <!--Body-->

    <?php add_cart(); ?>
    <form action="product-info.php?action=add_cart&code=<?php echo $product_id; ?>" method="post">
    <div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "admin_area/product_images/<?php echo $pro_img2; ?>" alt = "polaroid lab">
              <img src = "admin_area/product_images/<?php echo $pro_img1; ?>" alt = "polaroid lab">
              <img src = "admin_area/product_images/<?php echo $pro_img1; ?>" alt = "polaroid lab">
              <img src = "admin_area/product_images/<?php echo $pro_img2; ?>" alt = "polaroid lab">
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "admin_area/product_images/<?php echo $pro_img2; ?>" alt = "polaroid lab">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src = "admin_area/product_images/<?php echo $pro_img1; ?>" alt = "polaroid lab">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
                <img src = "admin_area/product_images/<?php echo $pro_img2; ?>" alt = "polaroid lab">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
                <img src = "admin_area/product_images/<?php echo $pro_img1; ?>" alt = "polaroid lab">
              </a>
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title"> <?php echo $pro_title; ?></h2>
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.9(105)</span>
          </div>

        <!--From price to add to cart-->
        <div class = "product-price">
            <p class = "price"><span>₱<?php echo $pro_price; ?></span></p>
            <p class = "stocks"><span><?php echo $pro_quantity; ?> stocks left!</span></p>
        </div>  

        <!--quantity-->
        <div class = "purchase-info">
            <div class="qty">
                <p>Quantity<p></p>
                <input type = "number" name= "product_qty" class="input-qty" min = "1" max="<?php echo "$pro_quantity" ?>" value = "1">
            </div>
            <!--variation-->
            <div class="color-var">
                <p style="margin-top:5px; border-top: solid 1px black;">Color: White</p>
                <div class="circle" style='background-color:#FF8200;'></div>
                <div class="circle" style='background-color:white;'></div>
                <div class="circle" style='background-color:brown;'></div>
            </div>
        </div>
        
        <button type = "submit" name = "add-cart" class = "add-to-card-btn">Add to Cart <i class = "fas fa-shopping-cart"></i></button>
        <input type='hidden' name='productID' value='$product_id'>
        </form>

          <!--Product information-->
          <div class = "product-detail">
            <br><br>
            <h2>Product Description</h2>
            <p>Product number: <?php echo $product_id; ?></p>

            <p>
            <?php echo $pro_desc; ?>
            </p>

          </div>
        </div>
      </div>
    </div>
  </form>
    <!--End of Body-->
    
    <!--Bootsrap JS cdn-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!--Other scripts-->
    <script src="scripts/product-info.js"></script>
    <script src="scripts/navbar.js"></script>
  </body>

   <!--Footer Section-->
   <footer class="footer">
            <div class="row">
                <!--Logo-->   
                <div class="col-lg-3 col-md-6 col sm-6">
                    <div class="footer-about">
                        <h3>We're here to help</h3>
                        <p><a href="contact.html">Get in touch</a> with our customer service team.</p>
                        <img src="img/mop.png">
                    </div>
                </div>

                <!--About-->
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer-widget">
                        <h6>ABOUT</h6>
                        <ul class="social-icon">
                        <li><a href="about.html">PolaChrome</a></li>
                        <li><a href="features.html">Polaroid Features</a></li>
                        <li><a href="chart.html">Comparison Chart</a></li>
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