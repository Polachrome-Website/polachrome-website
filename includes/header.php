<?php
    session_start();
    include("includes/db.php");
?>

<?php

    if(isset($_GET['prodID'])){

        $product_id = $_GET['prodID'];

        $get_product = "select * from products where prodID='$product_id'";

        $run_product = mysqli_query($conn,$get_product);

        $row_product = mysqli_fetch_array($run_product);

        $pro_title = $row_product['prodName'];
		
		if (isset($_GET['varID'])){
			
			$query = mysqli_query($conn, "SELECT * FROM product_variation WHERE prodID = '" . $_GET["prodID"] . "'");
			$row = mysqli_fetch_array($query);
			$pro_price = $row_product['price'];

			$pro_quantity = $row['quantity'];
	
			$pro_desc = $row_product['prodInfo'];
	
			$pro_img1 = $row['prodImg1'];
	
			$pro_img2 = $row['prodImg2'];
	
			$pro_img3 = $row['prodImg3'];
			
		} else {

        $pro_price = $row_product['price'];

        $pro_quantity = $row_product['quantity'];

        $pro_desc = $row_product['prodInfo'];

        $pro_img1 = $row_product['prodImg1'];

        $pro_img2 = $row_product['prodImg2'];

        $pro_img3 = $row_product['prodImg3'];
		
		}

        // $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
        
        // $run_p_cat = mysqli_query($con,$get_p_cat);

        // $row_p_cat = mysqli_fetch_array($run_p_cat);

        // $p_cat_title = $row_p_cat['p_cat_title'];

    }

?>

<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Bootsrap 4-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--Font Awesome icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

         <!--Polaroid Font 
        <link href="//db.onlinewebfonts.com/c/1e5b7f8cdbcb1e579a6e53aaadaf0b67?family=FF+Real+Head" rel="stylesheet" type="text/css"/>--> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    </head>
    <body>
        <!--Navbar-->
        <nav>
            <div class="logo">
                <img src="img/logo.png" alt="PolaChrome-logo">
            </div>
            <div class="nav-items">
                <li><a class="red" href="index.php">HOME</a></li>
                <li><a class="orange"  href="faq.php">FAQs</a></li>
                <li><a class="yellow" 
                style="<?php if($active=='Product') echo"color:#ffb80c";?>" href="product.php">
                    PRODUCT
                </a>
                </li>
                <li><a class="green"  href="about.php">ABOUT</a></li>
                <li><a class="blue"  href="contact.php">CONTACT US</a></li>
                <li><a class="red" href="testimonial.php">TESTIMONIALS</a></li>

               
            </div>

            <div class="nav-items mr-auto">

            <?php
                    if(isset($_SESSION["userID"])){
                       echo "<p> Welcome, " . $_SESSION["fullName"] . " </p>";
                       echo "<li><a class='red' href='includes/logout.inc.php'>LOG OUT</a></li>";
                    }
                    else{
                       echo "<li><a class='red' href='#'>NOT LOGGED</a></li>";
                       echo "<li><a class='red' href='login.php'>LOG IN</a></li>";
                    }

                ?>

                </div>

            <!-- <div class="search-icon">
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
            </div> -->
            <!-- <div class="cart-icon">
                <span class="fas fa-shopping-cart"></span>
            </div> -->

            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
 

            <div class="menu-icon">
                <span class="fas fa-bars"></span>
            </div>
        </nav>
        <!--End of Navbar section-->
