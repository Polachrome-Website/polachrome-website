<?php
    include("includes/header.php");
?>

    <head>
        <title>Shipping</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/shipping.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>


    <body>
        <!--Breadcrumb Navigation-->
        <div class="sub-nav">
            <ul class="breadcrumbs">
                <li class="breadcrumbs_item">
                    <a href="cart.php?item=<?php if(isset($_SESSION["userID"])){echo items();} else{echo guest_items();}?>" class="cart-link ">Cart</a>
                </li>
                <li class="breadcrumbs_item">
                    <a href="shipping.php" class="shipping-link active">Shipping</a>
                </li>
                <li class="breadcrumbs_item">
                    <a href="payment.php" class="payment-link">Payment</a>
                </li>
                <li class="breadcrumbs_item">
                    <a href="summary.php" class="summary-link ">Summary</a>
                </li>
            </ul>
        </div>

        <!--Cart Section-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 order-md-2">
                    <div class="card mt-1">
                        <div class="row-header">
                            <div class="header-summary">Order Summary</div>
                            <p class="total-items rounded-circle p-2"><?php items_qty() ?></p>
                        </div>
                        
                        <?php
                            
                            if(isset($_SESSION['userID'])){
                                $user_id = $_SESSION['userID'];
                            }
                                else{
                                    $user_id = $_SESSION['guest_id'];
                                }
                            // $ip_add = getRealIpUser();

                            $select_cart = "select * from cart where user_id='$user_id'";
                                        
                            $run_cart = mysqli_query($conn,$select_cart);
                            
                            $count = mysqli_num_rows($run_cart);

                            $total = 0;

                            $ship_fee = 45.00;

                             
                                    
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

                                        $total_fee = $total + $ship_fee;
                                        
                                        $_SESSION['product_title'] = $product_title;
                                        
                                        $_SESSION['product_img1'] = $product_img1;
                    
                                        $_SESSION['product_quantity'] = $product_quantity;
                    
                                        $_SESSION['only_price'] = $only_price;
                    
                                        $_SESSION['sub_total'] = $sub_total;
                    
                                        $_SESSION['total'] = $total;
                            ?>  
                        
                        <div class="row item mb-3">
                            <div class="col-3 align-self-center mt-2">
                                <img class="img-fluid" src="admin_area/product_images/<?php echo $product_img1; ?>">
                            </div>
                            
                            <div class="col-8 mt-3">
                                <div class="row-div product">
                                    <div class="row product-name"><?php echo "$product_title";?></div>
                                    <div class="row price">₱<?php echo "$sub_total";?></div>    
                                </div>
                                <div class="row variation">Color: White</div>
                                <div class="row quantity">Qty: <?php echo "$pro_qty";?></div>
                            </div>
                        </div>

                        <?php 
                                    } 
                                }                                
                            
                        ?>

                        <div class="row-subtotal">
                            <div class="row">Subtotal</div>
                            <div class="row">₱<?php echo "$total";?></div>
                        </div>
                        <!-- <div class="row-discount">
                            <div class="row">Rewards Discount:</div>
                            <div class="row">₱0.00</div>
                        </div> -->
                        <div class="row-shipping-fee">
                            <div class="row">Shipping Fee:</div>
                            <div class="row">₱<?php echo "$ship_fee";?></div>
                        </div>
                        <div class="row-total">
                            <div class="row">Total:</div>
                            <div class="row">₱<?php echo "$total_fee";?></div>
                        </div>
                      
                            
                    </div>
                </div>

                 <?php
                    /// Region, Province, City, Barangay
                    // $reg_pro_cit_brgy = $address_region . $address_city . $address_brgy;

                    /// Street Name, Building, House no.
                    // $strt_bldg_hn = $address_strt . $address_bldg;

                ?>  

                <!--Shipping Details Section-->
                <div class="col-md-8 order-md-1 mt-1">
                    <div class="card p-4">
                        <div class="shipping-header mb-3">Shipping Details</div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <form action="payment.php" method="post">   <!--begin shipping form--> 
                                <input type="text" class="form-control" name="shipping_full_name"
                                placeholder= "<?php if(!isset($_SESSION["userID"])){ echo "Full Name";}
                                     if(isset($_SESSION["userID"])){ 
                                        echo "Full Name";
                                    }
                                ?>"
                                value = "<?php if(isset($_SESSION["userID"])){ echo $_SESSION["fullName"];}?>"
                                required> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                            <input type="email" class="form-control" name="shipping_email"
                                placeholder= "<?php if(!isset($_SESSION["userID"])){ echo "Email";}
                                  if(isset($_SESSION["userID"])){ 
                                        echo "Email";
                                    }
                                ?>"
                                value = "<?php if(isset($_SESSION["userID"])){ echo $_SESSION["email"];}?>"
                                required> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="shipping_reg_pro_cit_brgy"
                                placeholder= "<?php if(!isset($_SESSION["userID"])){ echo "Barangay, City, Province"; }
                                if(isset($_SESSION["userID"])){ 
                                    if(isset($address_brgy) && isset($address_city) && isset($address_region)){ echo "Barangay, City, Province"; }
                                } ?>"
                                value = "<?php if(isset($_SESSION["userID"])){ 
                                    if(isset($address_brgy) && isset($address_city) && isset($address_region)){
                                        echo $address_brgy . ", " . $address_city . ", " . $address_region;
                                    }
                                }
                                
                                ?>" 
                                
                                required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="shipping_strt_bldg_hn"
                                placeholder= "<?php if(!isset($_SESSION["userID"])){ echo "Street Name, Building, House no.";}
                                if(isset($_SESSION["userID"])){ 
                                    if(isset($address_strt) && isset($address_bldg)){ echo "Street Name, Building, House no.";}
                                }?>"
                                value = "<?php if(isset($_SESSION["userID"])){if(isset($address_strt) && isset($address_bldg)){echo $address_strt . ", " . $address_bldg;}
                                }?>" required>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center g-3">
                            <div class="col-sm-6">
                                <input type="text" class="form-control myInput" name="shipping_contact"
                                placeholder= "<?php if(!isset($_SESSION["userID"])){ echo "Phone Number";}
                                 if(isset($_SESSION["userID"])){ if(isset($address_contact)){echo "Phone Number";}}
                                ?>"
                                value = "<?php if(isset($_SESSION["userID"])){if(isset($address_contact)){echo $address_contact;}}?>"
                                onkeydown="return validateIsNumericInput(event)" required>
                            </div>
                            <div class="col-sm-6">
                                    <input type="text" class="form-control myInput" name="shipping_zip" 
                                    placeholder= "<?php if(!isset($_SESSION["userID"])){echo "Postal Code";}
                                     if(isset($_SESSION["userID"])){ if(isset($address_zip)){echo "Postal Code";}}?>"
                                    value = "<?php if(isset($_SESSION["userID"])){if(isset($address_zip)){echo $address_zip;}}?>"
                                    onkeydown="return validateIsNumericInput(event)" required>
                            </div>
                        </div>
                        <?php
                            //store information in session to be accessed in the summary page

                            $_SESSION['product_title'] = $product_title;
                            
                        
                        ?>

                        
                    </div>
               
                    
                    <div class="action-btn">
                        <button type="submit" class="btn btn-return"><a href="cart.php?item=<?php if(isset($_SESSION["userID"])){echo items();} else{echo guest_items();}?>" style="all:unset;">Return to Cart</button></a>
                        <button type="submit" class="btn btn-dark btn-proceed" name="submit-shipping">Proceed to Payment</button>
                    </div>
                   
                </div>
            </div>
            </form>   <!--end shipping form-->    
        </div>
    <script src="scripts/navbar.js"></script>

    <script>

        /**
        Checks the ASCII code input by the user is one of the following:
            - Between 48 and 57: Numbers along the top row of the keyboard
            - Between 96 and 105: Numbers in the numeric keypad
            - Either 8 or 46: The backspace and delete keys enabling user to change their input
            - Either 37 or 39: The left and right cursor keys enabling user to navigate their input
        */

        function validateIsNumericInput(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            permittedKeys = [8, 46, 37, 39]
            if ((ASCIICode >= 48 && ASCIICode <= 57) || (ASCIICode >= 96 && ASCIICode <= 105)) {
                return true;
            };
            if (permittedKeys.includes(ASCIICode)) {
                return true;
            };
            return false;
        }

</script>

    </body>
    
 <!--Footer Section-->
 <footer class="footer">
    <div class="row">
        <!--Logo-->   
        <div class="col-lg-3 col-md-6 col sm-6">
            <div class="footer-about">
                <h3>We're here to help</h3>
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
