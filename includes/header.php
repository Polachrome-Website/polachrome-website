<?php
    session_start();
    
    include("includes/db.php");
    include("includes/functions.placeorder.php");

    
?>

<?php
    $guest_id = md5(getRealIpUser());
    $_SESSION['guest_id'] = $guest_id;
    //begin fetch address if user exists
    if(isset($_SESSION['userID'])){
        
        $get_uid = $_SESSION['userID'];

        $get_address = "select * from user_account_address where userID='$get_uid'";

        $run_address = mysqli_query($conn,$get_address);

        $check_address = mysqli_num_rows($run_address);

        while($row_address=mysqli_fetch_array($run_address)){

            $address_id = $row_address['addressID'];

            $address_bldg = $row_address['bldg'];

            $address_strt = $row_address['strt'];

            $address_brgy = $row_address['brgy'];

            $address_city = $row_address['city'];

            $address_region = $row_address['region'];

            $address_zip = $row_address['zip'];

            $address_contact = $row_address['contactNum'];

        }

    }//end fetch address if user exists

    // if(! isset($_SESSION['userID'])){
    //     $_SESSION['guestID'] = mt_rand(2000,9000);
    // }

     //begin fetch product for prod-info
	if(isset($_GET['varID'])){
		if(isset($_GET['prodID'])){
			
			$var_id = $_GET['varID'];

			$product_id = $_GET['prodID'];

			$get_product = "select * from product_variation where varID='$var_id'";

			$run_product = mysqli_query($conn,$get_product);

			$row_product = mysqli_fetch_array($run_product);

			// $p_cat_id = $row_product['p_cat_id'];

			$pro_title = $row_product['prodVariation'];

			$pro_price = $row_product['price'];

			$pro_quantity = $row_product['quantity'];

			$pro_img1 = $row_product['prodImg1'];

			$pro_img2 = $row_product['prodImg2'];

			$pro_img3 = $row_product['prodImg3'];

            $pro_img4 = $row_product['prodImg4'];

            $pro_img5 = $row_product['prodImg5'];    
			
			$get_product = "select * from products where prodID='$product_id'";

			$run_product = mysqli_query($conn,$get_product);

			$row_product = mysqli_fetch_array($run_product);
			
			$pro_title = $row_product['prodName'];
			
			$pro_desc = $row_product['prodInfo'];

            $cat_id = $row_product['catID'];

			// $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
			
			// $run_p_cat = mysqli_query($con,$get_p_cat);

			// $row_p_cat = mysqli_fetch_array($run_p_cat);

			// $p_cat_title = $row_p_cat['p_cat_title'];

		}//end fetch product for prod-info

	}elseif(isset($_GET['prodID'])){

        $product_id = $_GET['prodID'];

        $get_product = "select * from products where prodID='$product_id'";

        $run_product = mysqli_query($conn,$get_product);

        $row_product = mysqli_fetch_array($run_product);

        $cat_id = $row_product['catID'];

        $pro_title = $row_product['prodName'];

        $pro_price = $row_product['price'];

        $pro_quantity = $row_product['quantity'];

        $pro_desc = $row_product['prodInfo'];

        $pro_img1 = $row_product['prodImg1'];

        $pro_img2 = $row_product['prodImg2'];

        $pro_img3 = $row_product['prodImg3'];

        $pro_img4 = $row_product['prodImg4'];

        $pro_img5 = $row_product['prodImg5'];

        // $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
        
        // $run_p_cat = mysqli_query($con,$get_p_cat);

        // $row_p_cat = mysqli_fetch_array($run_p_cat);

        // $p_cat_title = $row_p_cat['p_cat_title'];

    }//end fetch product for prod-info

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

        <!-- <link rel="stylesheet" href="styles/cart.header.scss"> -->

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- <script src="sweetalert2.all.min.js"></script> -->

        <!-- <script>
            sessionStorage.setItem('guestID',"<?php echo $_SESSION['guestID'] ?>");
        </script> -->

        <style>

            /*Navbar Section*/

            /*for manipulation of the total number of items in the cart dropdown*/
            :root{
            --after-content:'<?php if(isset($_SESSION["userID"])){items();} else{guest_items();}?>'
            }

            nav{
                background-color: white;
                display: flex;
                justify-content: space-between;
                position: fixed;
                width: 100%;
                top: 0;
                left: 0;
                z-index: 9999;
                flex-wrap: wrap;
                align-items: center;
                height: 55px;
                padding: 0 30px;
                } 

                nav .logo img{
                width: 100%;
                height: 27px;
                }

                nav .nav-items{
                display: flex;
                flex: 1;
                padding: 0 0 0 30px;
                
                }  
                
                nav .nav-items li{

                list-style: none;
                padding-left: 0px;
                padding: 0 15px;;
                }

                nav .nav-items li a{
                color: black;
                font-size: 16px;
                font-weight: 630;
                text-decoration: none;
                }

                .red:hover,
                .testimonials:hover{
                color: #F04231;
                }

                .orange:hover{
                color: #FF8200;
                }

                .yellow:hover{
                color: #FFB80C;
                }

                .green:hover{
                color: #78BE20;
                }

                .blue:hover{
                color: #198CD9;
                }  
                

                nav .menu-icon,
                nav .cancel-icon,
                nav .search-icon{
                width: 40px;
                text-align: center;
                margin: 0 50px;
                font-size: 15px;
                padding-top: 1px;
                color: #fff;
                cursor: pointer;
                display: none;
                }

                nav .cancel-icon{
                padding-top: 3px;
                }


                nav .cart-icon{
                position: absolute;
                <?php 
                    if(isset($_SESSION["userID"])){
                        echo "left: 91%;";
                        echo "top: 31%;";
                    }
                    if(!isset($_SESSION["userID"])){
                        echo "display: inline;";
                        echo "right: 13%;";
                        echo "top: 32%;";
                    }
                ?>
                font-size: 15px;
                cursor: pointer;
                }

                nav .menu-icon span,
                nav .cancel-icon,
                nav .search-icon{
                display: none;
                cursor: pointer;
                }

                nav .cancel-search-icon{
                display: none;
                }

                nav .user-icon:hover{
                color: #f04231;
                }
                nav .cart-icon:hover{
                color: black;
                }

                /*Username*/
                .userbtn{
                background-color: white;
                color: black;
                margin-right: 5px;
                font-size: 16px;
                margin-top: 4px;
                font-weight: 600;
                border: none;
                }

                .userbtn:focus{
                outline: none;
                }

                .username{
                display: inline-block;
                padding-top: 0.3px;
                }

                .username-content {
                display: none;
                position: absolute;
                background-color: white;
                border: 1px solid #efefefef;
                min-width: 150px;
                right: 0px;
                margin-top: 3px;
                z-index: 1;
                }

                .username-content i{
                padding-right: 7px;
                color: gray;
                }

                .username-content a {
                color: black;
                font-weight: 500;
                padding: 10px 16px;
                text-decoration: none;
                display: block;
                }

                .username-content .user{
                border-bottom: 2px solid #efefefef;
                pointer-events: none;
                }

                .username-content a:hover {
                background-color: #efefefef;
                }

                .username:hover .userbtn {
                background-color: white;
                color: #f04231;
                cursor: pointer;
                }

                /* for the color of elements under .userbtn */
                a:hover{
                 color: black!important;
                }

                .userbtn .fa-user-alt{
                font-size: 16px;
                
                }

                .show {
                    display: block;
                }



            /*cart-dropdown*/
            .shopping-cart{
                position: absolute;
                width: 26%;
                background-color: white;
                border: 1px solid #efefefef;
                <?php 
                    if(isset($_SESSION["userID"])){
                        echo "right: 7.7%;";
                    }
                    if(!isset($_SESSION["userID"])){
                        echo "right: 14.3%;";
                    }
                ?>
                top: 80%;
            }

            .cart-header{
                padding: 4px 7px;
                margin-bottom: 0;
                font-size: 22px;
                font-weight: 600;
            }


            .cart-wrapper{
            overflow-y: auto;
            max-height: 250px;
            }

            .subtotal{
            text-align: right;
            padding-top: 12px;
            padding-right: 19px;
            font-weight: 600;
            }

            a .view-cart{
                width: 90%;
                text-align: center;
                cursor: pointer;
                background-color: black;
                color: white;
                font-weight: 400;
                font-size: 15px;
                margin: 7px auto 15px;
                padding:7px;
                border: none;
                border-radius: 7px;
            }

            a{
                text-decoration: none;
            }

            a .view-cart:hover{
            background-color: white;
            color: black;
            outline: solid black 1px;
            }

            a:hover{
            text-decoration: none;
            }

            .cart-icon{
            text-align: right;
            margin-top: 1.85px;
            }

            .cart-item-nav-nav-nav{
            display: grid;
            grid-template-columns: 3fr 6fr 1fr;
            padding: 3% 2%;
            border-top: solid 1px #efefefef;
            }

            .cart-item-nav-nav-nav .product-info{
            line-height: 10px;
            }

            .cart-item-nav-nav-nav img{
                width: 85%;
            }

            .cart-item-nav-nav-nav .product-info .variation{
                font-size: 13px;
                margin-bottom: 10px;
            }

            .cart-item-nav-nav-nav h6{
            text-align: left;
            margin-top: 8px;
            font-weight: 600;
            }

            .other-info{
            display: flex;
            justify-content: space-between;
            }

            .quantity, .price{
            font-size: 13px;
            }

            .price{
            color: red;
            font-weight: bold;
            }


            .cancel-btn{
            color: gray;
            margin-right: 10px;
            font-size: 11px;
            }

            .cancel{
            text-align: right;
            }

            .hide{
            display: none;
            }

            #cart-total-items::after{
            content: var(--after-content);
            font-size: 10px;
            font-weight: 600;
            color: white;
            width: 17px;
            height: 17px;
            padding-top: 1px;
            display: inline-block;
            text-align: center;
            position: relative;
            background-color: #f04231;
            border-radius: 50%;
            top: -10px;
            right: 29%;
            }

            /* Start Styles Login Btn for Guest */

            .login-btn .btn{
            background:black;
            font-size: 11px !important;
            color: white;
            width: 100px;
            font-weight: bold;
            border:none;
            border-radius: 7px !important;
            padding: 7px;
            }

            .login-btn{
            position: absolute;
            right: 2%;
            bottom: 21.5%;
            }

            .login-btn .btn:hover{
            background: transparent;
            color: black;
            outline: solid black 1px;
            }

            .login-btn .btn:focus{
            box-shadow: none !important;
            }
            /* END Styles Login Btn for Guest */

            @media (max-width: 1600px){
                <?php
                    if(!isset($_SESSION["userID"])){
                        echo "nav .cart-icon{ right: 12%; margin-right: 10px; }";
                        echo " .login-btn{ position: absolute; margin-right: 7px; bottom: 20%;}";
                    }
                ?>
            }
    
            @media (max-width: 1245px) {
            nav{
                padding: 0 50px;
            }

            <?php 
                if(isset($_SESSION["userID"])){
                 echo ".shopping-cart{ right: 10.3%; }";
                }
                if(!isset($_SESSION["userID"])){
                    echo ".shopping-cart{ right: 14.3%; }";
                }
            ?>
        
            <?php 
                if(isset($_SESSION["userID"])){
                 echo "nav .cart-icon{ left: 88%; }";
                }
            ?>

            }

            @media (max-width: 1140px) {
            nav{
            padding: 0px;
            margin: 0px;
            }

            nav .logo img{
            padding-left: 40px;
            width: 100%;
            }

            nav .nav-items.active{
            right: 0px;
            }
            nav .nav-items li{
            line-height: 40px;
            margin: 30px 0;
            }

            nav .nav-items{
            position: fixed;
            padding: 10px 50px 0 50px;
            text-align: center;
            z-index: 99;
            top: 48px;
            width: 100%;
            right: -100%;
            height: 100%;
            background: white;
            display: inline-block;
            transition: right 0.3s ease;
            }
        
            nav .nav-items li a{
            font-size: 16px;
            }

            <?php 
                if(isset($_SESSION["userID"])){
                    echo "nav .cart-icon{ top: 28%; left: 83%; }";
                }
                if(!isset($_SESSION["userID"])){
                    echo "nav .cart-icon{  top: 33%; right: 20%; margin-right: 10px;}";
                }
            ?>

            .login-btn{
                position: absolute;
                right: 10%;
                bottom: 20%;
            }
        
            nav .username{
            display: block;
            position: absolute;
            top: 24%;
            left: 88.5%;
            }

            .username-content{
            margin-top: 5px;
            }
        
            <?php 
            if(isset($_SESSION["userID"])){
                echo "nav .menu-icon{ position: absolute; display: block; margin-top: 5px; left: 90%; padding-right: 20px; }";
            }
            if(!isset($_SESSION["userID"])){
                echo "nav .menu-icon{ position: absolute; display: inline-block; right: 0%; padding-left: 35px; }";
            }
            ?>
        
            nav .menu-icon span{
            <?php 
            if(isset($_SESSION["userID"])){
                echo "display: block;";
            }
            if(!isset($_SESSION["userID"])){
                echo "display: inline-block;";
            }    
            ?>
            color: black;
            font-size: 16px;
            }

            nav .menu-icon span.hide,
            nav .search-icon.hide{
            display: none;
            }
            nav .cancel-icon.show{
            position: absolute;
            display: block;
            <?php 
            if(isset($_SESSION["userID"])){
                echo "margin-top: 5px; left: 90%; padding-right: 20px;";
            }
            if(!isset($_SESSION["userID"])){
                echo "right: 0%; padding-left: 35px;";
            }        
            ?>
            color:black;
            
            
            }
            .shopping-cart{
            position: absolute;
            width: 290px;
            top: 85%;
            <?php 
            if(isset($_SESSION["userID"])){
                echo  "top: 85%; right: 15%;";
            } 
            if(!isset($_SESSION["userID"])){
                echo  "top: 85%; right: 22.7%;";
            }    
            ?>
            }
            
        
        }   

        @media (max-width: 768px){
            <?php 
                 if(isset($_SESSION["userID"])){
                    echo "nav .menu-icon{ left: 89%; padding-right: 20px; }";
                    echo "nav .cancel-icon.show{ left: 89%; padding-right: 20px !important; }";
                    echo "nav .cart-icon{ left: 79%;}";
                    echo ".username{ left: 87%;}";
                    echo ".shopping-cart{ right: 19%;}";
                 }
            
            ?>
        }
            
        @media (max-width: 767px){
            <?php 

            if(!isset($_SESSION["userID"])){
                echo " .login-btn{ right: 11.8%; }";
                echo  ".shopping-cart{ right: 31.4%; }";
                echo "nav .cart-icon{ right: 28%; } ";
            } 
            ?>   
        }
        
                .isDisabled{
                color: currentColor;
                cursor: not-allowed;
                opacity: 0.5;
                text-decoration: none;
                pointer-events: none;
                cursor: not-allowed;
                opacity: 0.5;
                }

        </style>
        
    </head>
    <body>

        <!--Navbar-->
        <nav>
            <div class="logo">
                <img src="img/logo.png" alt="PolaChrome-logo">
            </div>
            <div class="nav-items">
                
                <li><a class="red" style="<?php if($active=='Home') echo"color:#F04231";?>" href="index.php">
                    HOME
                </a>
                </li>

                <li><a class="yellow" 
                style="<?php if($active=='Product') echo"color:#ffb80c";?>" href="product.php">
                    PRODUCTS
                </a>
                </li>

                <li><a class="red" style="<?php if($active=='Testimonials') echo"color:#F04231";?>" href="testimonial.php">
                    TESTIMONIALS
                </a>
                </li>

                <li><a class="orange" style="<?php if($active=='FAQs') echo"color:#FF8200";?>"  href="faq.php">
                    FAQs
                </a>
                </li>

                <li><a class="green" style="<?php if($active=='About') echo"color:#78BE20";?>" href="about.php">
                    ABOUT
                </a>
                </li>

                <li><a class="blue" style="<?php if($active=='Contact') echo"color:#198CD9";?>" href="contact.php">
                    CONTACT
                </a>
                </li>

                <li><a class="orange" style="<?php if($active=='Track') echo"color:orange";?>" href="track-order.php">TRACK</a></li>

            </div>

            <div class="nav-items">

            <?php
              
                    if(isset($_SESSION['admin_email'])){
                        echo "Viewing as ADMIN";
                    }
                    

                ?>

                </div>

              <div class="cancel-search-icon">
                <span class="fas fa-times"></span>
              </div>

              <div class="cancel-icon">
                <span class="fas fa-times"></span>
              </div>

              <script src="scripts/user-dropdown.js"></script>
            <?php 
                
                  if(isset($_SESSION["userID"])){
                    //   username displayed on navbar
                    echo "
                            <div class='username'>
                                <button onclick='myFunction()' class='userbtn'><i class='fas fa-user-alt'></i></button>
                                    <div id='myUsername' class='username-content'>
                                        <a class='user'>Juan Dela Cruz</a>
                                        <a href='user-profile.php'>My Profile</a>
                                        <a href='login.php'>Logout</a>
                                    </div>
                            </div>
                    ";
                 }if(!isset($_SESSION["userID"]) && (!isset($_SESSION['admin_email'])) ){
                    // echo "<li><a class='red' href='login.php'>LOG IN</a></li>";
                 //    echo "G_ID: ".$_SESSION['guest_id'];

                 echo "
                            <div class='login-btn'>
                                <a href='login.php'><button class='btn btn-dark'> LOGIN </button></a>
                                </div>
                                ";

                 }
                 if(isset($_SESSION['admin_email'])){
                    echo "
                            <div class='username'>
                                <button class='userbtn'> Polachrome Admin </button>

                                <div class='username-content'>
                                <a href='admin_area/index.php?dashboard'> <i class='fas fa-user'></i>My Profile</a>
                                <a href='admin_area/logout.php'><i class='fas fa-sign-out-alt'></i>Logout</a>
                                </div>
                            </div>
                    ";
                 }   
            
            ?>   

            <?php 
                 if(isset($_SESSION['admin_email'])){
                    //do not display cart icon if admin is logged in
                 }
                 else{
                    //display cart icon if user or guest
                    if(isset($_SESSION['userID'])){ //fetch user id for selecting cart item
                        $user_id = $_SESSION['userID'];
                        $select_cart = "select * from cart where user_id='$user_id'";
                    }
            
                    else{ //fetch guest id for selecting cart item
                        // $guest_id = $_SESSION['guest_id'];
                        // $guest_id = md5(getRealIpUser());
                        $select_cart = "select * from cart where user_id='$guest_id'";
                      
                    }
                                      
                    $run_cart = mysqli_query($conn,$select_cart);
                    
                    $count = mysqli_num_rows($run_cart);

                    $total = 0;

            ?>
            
             <!--cart-dropdown displayed on the navbar-->
             <div class="cartnv">
                    <div class="cart-icon"> 
                        <!--cart-total-items is the display of the total number of items added to the cart-->
                        <span class="fas fa-shopping-cart"></span>
                        <span id="cart-total-items"></span>
                    </div>
                     <!--hide class is used for the javascript code to hide and display the shopping cart-->
                    <div class="shopping-cart hide">
                    <p class="cart-header">My Cart</p>
                        <div class="cart-wrapper">

                        <?php
    
                            while($row_cart = mysqli_fetch_array($run_cart)){
                                
                                $pro_id = $row_cart['prod_id'];

                                $pro_qty = $row_cart['qty'];

                                $pro_var = $row_cart['var_id'];
                                
                                if($pro_var == 0){

                                    $get_products = "select * from products where prodID='$pro_id'";

                                    $run_products = mysqli_query($conn,$get_products);

                                    while($row_products = mysqli_fetch_array($run_products)){

                                        $product_title = $row_products['prodName'];

                                        $product_img1 = $row_products['prodImg1'];

                                        $product_quantity = $row_products['quantity'];

                                        $only_price = $row_products['price'];

                                        $sub_total = $row_products['price']*$pro_qty;

                                        $total += $sub_total;  
                                        
                                        $_SESSION['product_title'] = $product_title;
                                        
                                        $_SESSION['product_img1'] = $product_img1;

                                        $_SESSION['product_quantity'] = $product_quantity;

                                        $_SESSION['only_price'] = $only_price;

                                        $_SESSION['sub_total'] = $sub_total;

                                        $_SESSION['total'] = $total;
                                        
                                 
                            ?>  

                             <!--item added to cart-->
                             <div class="cart-item-nav-nav-nav">
                                <img src="admin_area/product_images/<?php echo $product_img1; ?>">
                                <div class="product-info">
                                    <h6><?php echo $_SESSION['product_title'];?></h6>
                                    <div class="variation">Variation: <?php
                                                    if($product_title === 'Go Film'){echo "White Frame";}
                                                    elseif($product_title === 'Polaroid Go Instant Camera'){echo "Black";}
                                                    elseif($product_title === 'Polaroid Now Instant Camera'){echo "Black";}
                                                    elseif($product_title === 'Polaroid Now+ Instant Camera'){echo "Black";}
                                                    elseif($product_title === 'Polaroid SX-70 SLR'){echo "SX-70 Original";}
                                                    elseif($product_title === 'Photo Album'){echo "Small (40 Photos)";}
                                                    elseif($product_title === 'Camera Strap - Flat'){echo "Yellow";}
                                                    elseif($product_title === 'Camera Strap - Round'){echo "Yellow";}
                                                    else{echo "N/A";}
                                                ?></div>
                                    <div class="other-info">
                                        <!-- <span class="quantity">Qty: <?php echo $pro_qty; ?> </span> -->
                                        <span class="price">₱<?php echo "$sub_total";?></span>
                                    </div>
                                </div>
                                <!-- <div class="cancel"><i class="fas fa-times cancel-btn"></i></div> -->
                            </div>
                            <?php } //end loop for product 

                            } //end if for pro_var == 0

                            //if product has variation

                            else{

                                $get_products = "select * from products where prodID='$pro_id'";

                                $run_products = mysqli_query($conn,$get_products);

                                while($row_products = mysqli_fetch_array($run_products)){

                                    $product_title = $row_products['prodName'];
                                    
                                    $get_productsvar = "select  * from product_variation where varID='$pro_var'";

                                    $run_productsvar = mysqli_query($conn,$get_productsvar);
                                    
                                    $row_provar=mysqli_fetch_array($run_productsvar);

                                    $product_img1 = $row_provar['prodImg1'];
                                        
                                    $product_varname = $row_provar['prodVariation'];

                                    $pro_price = $row_provar['price'];

                                    $product_quantity = $row_provar['quantity'];

                                    $only_price = $row_provar['price'];

                                    $sub_total = $row_provar['price']*$pro_qty;

                                    $total += $sub_total;     
                                    
                                    $_SESSION['product_title'] = $product_title;
                                    
                                    $_SESSION['product_img1'] = $product_img1;
                                    
                                    $_SESSION['product_varname'] = $product_varname;

                                    $_SESSION['product_quantity'] = $product_quantity;

                                    $_SESSION['only_price'] = $only_price;

                                    $_SESSION['sub_total'] = $sub_total;

                                    $_SESSION['total'] = $total;     
                                    
                        ?>

                         <!--item added to cart-->
                         <div class="cart-item-nav-nav-nav">
                                <img src="admin_area/product_images/<?php echo $product_img1; ?>">
                                <div class="product-info">
                                    <h6><?php echo $_SESSION['product_title'];?></h6>
                                    <div class="variation">Variation: <?php echo $_SESSION['product_varname'] ?> </div>
                                    <div class="other-info">
                                        <!-- <span class="quantity">Qty: <?php echo $pro_qty; ?> </span> -->
                                        <span class="price">₱<?php echo "$sub_total";?></span>
                                    </div>
                                </div>
                                <!-- <div class="cancel"><i class="fas fa-times cancel-btn"></i></div> -->
                            </div>

                        <?php    
                        
                                } //end while fetch pro_var

                            } //end else 
                        
                        } //end loop for fetch cart 
                        
                        ?> 
                        </div>
                        <div class="subtotal">Subtotal: ₱<?php if($total>0){ echo $total; } else{echo "0.00";}?></div>
                        
                        <?php 
                        if($count!=0){
                            echo"
                            <a href='cart.php' >
                                <div class='view-cart'>View Cart</div>
                            </a>
                            ";
                        }else{
                            echo"
                            <div class='isDisabled'>
                            <a href='#' aria-disabled='true' >
                                <div class='view-cart'>View Cart</div>
                            </a>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
                
            <?php } //end else for show cart if guest and user account?>

            <div class="menu-icon">
                <span class="fas fa-bars"></span>
            </div>  
        </nav>
        <script src="scripts/cart-dropdown.js"></script>
        <script src="scripts/user-dropdown.js"></script>
        <!--End of Navbar section-->
