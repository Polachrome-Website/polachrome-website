<?php
    include("includes/header.php");
?>
    <head>
        <title>Payment</title>
        <link rel="stylesheet" href="styles/payment.css">
    </head>

    <body>
        <!--Breadcrumb Navigation-->
        <div class="sub-nav">
            <ul class="breadcrumbs">
                <li class="breadcrumbs_item">
                    <a href="cart.php?item=<?php if(isset($_SESSION["userID"])){echo items();} else{echo guest_items();}?>" class="cart-link ">Cart</a>
                </li>
                <li class="breadcrumbs_item">
                    <a href="shipping.php" onClick="go-shipping" class="shipping-link">Shipping</a>
                </li>
                <li class="breadcrumbs_item">
                    <a href="payment.php" class="payment-link active">Payment</a>
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
                        <div class="row-discount">
                            <div class="row">Rewards Discount:</div>
                            <div class="row">₱0.00</div>
                        </div>
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
                                  if(isset($_POST["submit-shipping"])){

                                    $shipping_full_name = $_POST['shipping_full_name'];
    
                                    $shipping_email = $_POST['shipping_email'];
    
                                    $shipping_reg_pro_cit_brgy = $_POST['shipping_reg_pro_cit_brgy'];
    
                                    $shipping_strt_bldg_hn = $_POST['shipping_strt_bldg_hn'];
    
                                    $shipping_contact = $_POST['shipping_contact'];
    
                                    $shipping_zip = $_POST['shipping_zip'];

                                    //store values in session to be accessed.

                                    $_SESSION['s_shipping_full_name'] = $shipping_full_name;

                                    $_SESSION['s_shipping_email'] = $shipping_email;

                                    $_SESSION['s_shipping_reg_pro_cit_brgy'] = $shipping_reg_pro_cit_brgy;

                                    $_SESSION['s_shipping_strt_bldg_hn'] = $shipping_strt_bldg_hn;

                                    $_SESSION['s_shipping_contact'] = $shipping_contact;

                                    $_SESSION['s_shipping_zip'] = $shipping_zip;

    
                                }
                         
                                ?>
                <!--Payment Method-->
               
                <div class="col-md-8 order-md-1 mt-1">
                    <div class="card p-4">
                        <div class="row-header-payment">
                            <div class="header-payment">Choose payment method: </div>
                        </div>
                        <form action="summary.php" method="POST">
                        <div class="form-check">
                            <input class="form-check-input" name="flexRadioDefault" type="radio" id="option1" value="Gcash">
                            <!-- <input type="hidden" name="pay_gcash" value="Gcash"> -->
                            <label class="form-check-label" for="option1">
                              Gcash
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="option2" value="Paymaya">
                            <label class="form-check-label" for="option2">
                             Paymaya
                            </label>
                           
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="option3" value="Bank Transfer">
                            <label class="form-check-label" for="option3">
                             Bank Transfer
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="option4" value="Cash on Delivery">
                            <label class="form-check-label" for="option4">
                             Cash on Delivery
                            </label>
                        </div>

                        <div class="row-guidelines">
                            <div class="guidelines">Payment Guidelines:</div>
                        </div>
                        <div class="row-guidelines-content">
                            <p id="payment-guideline">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis purus ut nisi aliquam, ac venenatis ipsum sagittis. 
                                Sed finibus placerat tortor, tempus posuere quam dignissim eget. Mauris pharetra nunc consectetur, rutrum ex eget, bibendum lacus.
                                 In et laoreet lectus. Integer tristique, lectus et egestas sagittis, leo tortor tincidunt nunc, vitae condimentum ex ex nec purus. 
                                 Proin sollicitudin orci nec auctor volutpat..</p>
                        </div>
                 
                    </div>

                    <!-- begin storing shipping address values to be passed on summary page -->
                    <input type="hidden" name="shipping_full_name"  class="text-box" value="<?php echo $shipping_full_name ?>" required >
                    <input type="hidden" name="shipping_email"  class="text-box" value="<?php echo $shipping_email ?>" required >
                    <input type="hidden" name="shipping_reg_pro_cit_brgy"  class="text-box" value="<?php echo $shipping_reg_pro_cit_brgy ?>" required >
                    <input type="hidden" name="shipping_strt_bldg_hn"  class="text-box" value="<?php echo $shipping_strt_bldg_hn ?>" required >
                    <input type="hidden" name="shipping_contact"  class="text-box" value="<?php echo $shipping_contact ?>" required >
                    <input type="hidden" name="shipping_zip"  class="text-box" value="<?php echo $shipping_zip ?>" required >
                    <!-- end storing shipping address values to be passed on summary page -->

             
                    <div class="action-btn">
                        <button type="submit" class="btn btn-return"><a href="shipping.php" style="all:unset;">Return to Shipping</a></button>
                        <button type="submit" name="submit-payment" class="btn btn-dark btn-proceed">View Order Summary</button>
                    </div>
                    
                </div>
            </form>
            </div>
        </div>
    <script src="scripts/navbar.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>     

    <script>
        //jquery script for choosing payment method and their specific instructions
        $(document).ready(function (){

            $("input[type='radio']:first").attr('checked',true);  //set first radio btn as default

            $("input[type='radio']").change(function(){  //enable radio btn change and change the text as the selection change
                switch ($("input[type='radio']:checked").val()){
                    case 'Gcash':
                        $("#payment-guideline").text("GCASH was chosen as payment method. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis purus ut nisi aliquam, ac venenatis ipsum sagittis. vitae condimentum ex ex nec purus. Sed finibus placerat tortor, tempus posuere quam dignissim eget. Sed finibus placerat tortor, tempus posuere quam dignissim eget.");
                        break;
                    case 'Paymaya':
                        $("#payment-guideline").text("PAYMAYA was chosen as payment method. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis purus ut nisi aliquam, ac venenatis ipsum sagittis. vitae condimentum ex ex nec purus. Sed finibus placerat tortor, tempus posuere quam dignissim eget. Sed finibus placerat tortor, tempus posuere quam dignissim eget.");
                        break;
                    case 'Bank Transfer':
                        $("#payment-guideline").text("BANK TRANSFER was chosen as payment method. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis purus ut nisi aliquam, ac venenatis ipsum sagittis. vitae condimentum ex ex nec purus. Sed finibus placerat tortor, tempus posuere quam dignissim eget. Sed finibus placerat tortor, tempus posuere quam dignissim eget.");
                        break;
                    case 'Cash on Delivery':
                        $("#payment-guideline").text("CASH ON DELIVERY was chosen as payment method. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis purus ut nisi aliquam, ac venenatis ipsum sagittis. vitae condimentum ex ex nec purus. Sed finibus placerat tortor, tempus posuere quam dignissim eget. Sed finibus placerat tortor, tempus posuere quam dignissim eget.");
                        break;
                    default:
                        $("#payment-guideline").text("Instructions for each payment method displayed here");
                };

            }).change();      //for default radio btn to reflect text changes    

        });  
                                
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