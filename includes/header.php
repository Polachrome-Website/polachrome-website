<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign in on PolaChrome</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Bootsrap 4-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--Font Awesome icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    </head>
    <body>
        <!--Navbar-->
        <nav>
            <div class="logo">
                <img src="images/logo.png" alt="PolaChrome-logo">
            </div>
            <div class="nav-items">
                <li><a class="red" href="home.html">HOME</a></li>
                <li><a class="orange"  href="faq.html">FAQs</a></li>
                <li><a class="yellow" href="product.html">PRODUCT</a></li>
                <li><a class="green"  href="about.html">ABOUT</a></li>
                <li><a class="blue"  href="contact.html">CONTACT US</a></li>
                <li><a class="red" href="testimonial.html">TESTIMONIALS</a></li>
            </div>

            <div class="search-icon">
                <span class="fas fa-search"></span>
              </div>

              <div class="cancel-search-icon">
                <span class="fas fa-times"></span>
              </div>
        
              <div class="cancel-icon">
                <span class="fas fa-times"></span>
              </div>
        
              <form action="#">
                <input type="search" class="search-data" placeholder="Search" required>
                <button type="submit" class="fas fa-search"></button>
              </form>
        
            <div class="user-icon">
                <span class="fas fa-user"></span>
            </div>
            <div class="cart-icon">
                <span class="fas fa-shopping-cart"></span>
            </div>

            <div class="menu-icon">
                <span class="fas fa-bars"></span>
            </div>
        </nav>
        <!--End of Navbar section-->
