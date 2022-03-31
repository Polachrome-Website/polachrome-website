<?php
    session_start();
    $session_id = 12345;
    
    // $sessionkey = hash("sha256", openssl_random_pseudo_bytes($session_key_length));
    // $_SESSION['guest_id']  = mt_rand();
    $_SESSION['guest_id'] = $session_id;
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

             
               
            </div>

            <div class="nav-items">

            <?php
                    if(isset($_SESSION["userID"])){
                       echo "<p> Welcome, " . $_SESSION["fullName"] . " </p>";
                       echo "<li><a class='red' href='includes/logout.inc.php'>LOG OUT</a></li>";
                    }
                    if(isset($_SESSION['admin_email'])){
                        echo "Viewing as ADMIN";
                    }
                    if(!isset($_SESSION["userID"]) && (!isset($_SESSION['admin_email'])) ){
                       echo "<li><a class='red' href='#'>NOT LOGGED</a></li>";
                       echo "<li><a class='red' href='login.php'>LOG IN</a></li>";
                       echo "G_ID: ".$_SESSION['guest_id'];
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
                echo"
            <div class='user-icon'>
                <a href='user-profile.php' style='all:unset;'><span style='font-size: 130%; background: inherit;' class='fas fa-user'></span></a>
            </div>";
            }
            ?>

            <div class="cart-icon">
                <a href="cart.php?item=<?php if(isset($_SESSION["userID"])){echo items();} else{echo guest_items();}?>" style="all:unset;">
                <span style="font-size: 130%; background: inherit;" class="fas fa-shopping-cart">
                       
                <?php 
                    if(isset($_SESSION["userID"])){
                        items(); 
                    }
                    else{
                        guest_items();

                    }
                 ?>
                </span></a>
            </div>

            <div class="menu-icon">
                <span class="fas fa-bars"></span>
            </div>  
        </nav>
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