<?php
    session_start()==TRUE;
    $session_id = 12345;
    
    // $sessionkey = hash("sha256", openssl_random_pseudo_bytes($session_key_length));
    // $_SESSION['guest_id']  = mt_rand();
    $_SESSION['guest_id'] = $session_id;
    // echo $_SESSION['guest_id'];
    include("includes/db.php");
    include("includes/functions.placeorder.php");
?>

<?php

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
    if(isset($_GET['prodID'])){

        $product_id = $_GET['prodID'];

        $get_product = "select * from products where prodID='$product_id'";

        $run_product = mysqli_query($conn,$get_product);

        $row_product = mysqli_fetch_array($run_product);

        // $p_cat_id = $row_product['p_cat_id'];

        $pro_title = $row_product['prodName'];

        $pro_price = $row_product['price'];

        $pro_quantity = $row_product['quantity'];

        $pro_desc = $row_product['prodInfo'];

        $pro_img1 = $row_product['prodImg1'];

        $pro_img2 = $row_product['prodImg2'];

        $pro_img3 = $row_product['prodImg3'];

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
            font-size: 18px;
            color: #fff;
            cursor: pointer;
            display: none;
            }


            nav .cartnv{
            width: 23% !important;
            position: absolute;
            left: 61%;
            top: 25%;
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

            .userbtn {
            background-color: white;
            color: black;
            padding-right: 13px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            }

            .loginbtn {
            background-color: white;
            color: black;
            cursor: pointer;
            padding-right: 13px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            }

            .userbtn:focus{
            outline: none;
            }

            .loginbtn:focus{
            outline: none;
            }

            .username {
            position: relative;
            display: inline-block;
            }

            .username-content {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #efefefef;
            min-width: 140px;
            z-index: 1;
            }

            .username-content i{
            padding-right: 7px;
            color: gray;
            }

            .username-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            }

            .username-content a:hover {
            background-color: #efefefef;
            }

            .username:hover .username-content {
            display: block;
            }

            .username:hover .userbtn {
            background-color: white;
            color: #f04231;
            }

            .username:hover .loginbtn {
            background-color: white;
            color: #f04231;
            }

            .shopping-cart{
            background-color: white;
            border: 1px solid #efefefef;
            margin-right: 18px;
            margin-top: 7px;
            }


            h5{
            padding: 8px 7px;
            margin-bottom: 0;
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
            background-color: #f04231;
            color: white;
            font-weight: 400;
            font-size: 15px;
            margin: 7px auto 15px;
            padding:5px 10px;
            }

            a:hover{
            text-decoration: none;
            }


            .cart-icon{
            text-align: right;
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

            .cart-total-items::after{
            content: var(--after-content);
            font-size: 17px;
            width: 20px;
            display: inline-block;
            text-align: center;
            position: relative;
            background-color: #f04231;
            border-radius: 50%;
            top: -10px;
            right: 20%;
            }


            @media (max-width: 1245px) {
            nav{
                padding: 0 50px;
            }

            nav .username{
                position: absolute;
                right: 30px;
            }

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

            nav form{
                position: absolute;
                right: 140px;
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
                font-size: 15px;
            }
            
            nav .menu-icon{
                display: block;
                position: absolute;
                right: 0px;
                font-size: 17px;
                padding-left: 40px;
            }

            nav .username{
                position: absolute;
                right: 54px;
                text-decoration: none;
            }
            

            nav .cartnv{
                position: absolute;
                left: 700px;
            }  
            
            
            nav .menu-icon span{
                display: block;
                color: black;
            }
            nav .menu-icon span.hide,
            nav .search-icon.hide{
                display: none;
            }
            nav .cancel-icon.show{
                display: block;
                color:black;
                padding-left: 40px;
            }
            
            }   
            
                @media (max-width: 767px){
                
                nav .username{
                    position: absolute;
                    right: 60px;
                }
            
                nav .cartnv{
                    right: 77px;
                }
                
                nav .cancel-search-icon.show{
                    display: block;
                    position: absolute;
                    right: 162px;
                }
            
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
                    // if(isset($_SESSION["userID"])){
                    //    echo "<p> Welcome, " . $_SESSION["fullName"] . " </p>";
                    //    echo "<li><a class='red' href='includes/logout.inc.php'>LOG OUT</a></li>";
                    // }
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

            <!-- <div class="search-icon">
                <span class="fas fa-search"></span>
              </div>

              <form action="#">
                <input type="search" class="search-data" placeholder="Search" required>
                <button type="submit" class="fas fa-search"></button>
              </form>
            -->

            <?php 
                  if(isset($_SESSION["userID"])){
                    //   username displayed on navbar
                    echo "
                            <div class='username'>
                                <button class='userbtn'> ". $_SESSION['fullName'] ." </button>

                                <div class='username-content'>
                                <a href='user-profile.php'> <i class='fas fa-user'></i>My Profile</a>
                                <a href='includes/logout.inc.php'><i class='fas fa-sign-out-alt'></i>Logout</a>
                                </div>
                            </div>
                    ";
                 }if(!isset($_SESSION["userID"]) && (!isset($_SESSION['admin_email'])) ){
                    // echo "<li><a class='red' href='login.php'>LOG IN</a></li>";
                 //    echo "G_ID: ".$_SESSION['guest_id'];

                 echo "
                            <div class='username'>
                                <a href='login.php'><button class='loginbtn'> LOGIN </button></a>
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
                        $guest_id = $_SESSION['guest_id'];
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
                        <span class="fas fa-shopping-cart cart-total-items"></span>
                    </div>
                    <!--hide class is used for the javascript code to hide and display the shopping cart-->
                    <div class="shopping-cart hide">
                        <h5>My Cart</h5>
                        <div class="cart-wrapper">

                        <?php
    
                            while($row_cart = mysqli_fetch_array($run_cart)){
                                
                                $pro_id = $row_cart['prod_id'];

                                $pro_qty = $row_cart['qty'];

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
                                    <div class="variation">Variation: Black</div>
                                    <div class="other-info">
                                        <!-- <span class="quantity">Qty: <?php echo $pro_qty; ?> </span> -->
                                        <span class="price">₱<?php echo "$sub_total";?></span>
                                    </div>
                                </div>
                                <!-- <div class="cancel"><i class="fas fa-times cancel-btn"></i></div> -->
                            </div>
                            <?php } } //end loops for fetch cart and product ?> 
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
        
        <!--End of Navbar section-->

<!-- <script>
	//jquery method movemouse check
	//when move mouse, capture time and date and store it into a session storage object named lastTimeStamp

	$(function(){

	    function timeChecker(){
	
            setInterval(function(){
            var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");

                timeCompare(storedTimeStamp);
                },3000); //3seconds
            }
        function timeCompare(timeString){
                var currentTime = new Date();
                var pastTime = new Date(timeString);
                var timeDiff = currentTime - pastTime;
                var minPast = Math.floor((timeDiff/60000));
                
                //greater than 1min
                if(minPast > 1){
                    sessionStorage.removeItem("lastTimeStamp");
                    window.location = "../logout.inc.php";
	                return false;

	            }else{

		            console.log(currentTime+" - "+ pastTime +" - "+minPast +" min past")
	            }
	        }


        $(document).mousemove(function(){

            var timeStamp = new Date();
            sessionStorage.setItem("lastTimeStamp",timeStamp);
            
	    //session storage stores data during active session only.
	        timeChecker();	  
	});
});

</script> -->
