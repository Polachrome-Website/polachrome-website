<?php
    include("includes/header.php");
?>
    <head>
        <title>Summary</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/summary.css">
    </head>

    <body>

        <!--Breadcrumb Navigation Bar-->
        <div class="sub-nav">
            <ul class="breadcrumbs">
                <li class="breadcrumbs_item">
                    <a href="cart.php" class="cart-link">Cart</a>
                </li>
                <li class="breadcrumbs_item">
                    <a href="shipping.php" class="shipping-link ">Shipping</a>
                </li>
                <li class="breadcrumbs_item">
                    <a href="payment.php" class="payment-link ">Payment</a>
                </li>
                <li class="breadcrumbs_item">
                    <a href="summary.php" class="summary-link active ">Summary</a>
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

                            if(isset($_POST['submit-payment'])){

                                $shipping_full_name = $_POST['shipping_full_name'];

                                $shipping_email = $_POST['shipping_email'];

                                $shipping_reg_pro_cit_brgy = $_POST['shipping_reg_pro_cit_brgy'];

                                $shipping_strt_bldg_hn = $_POST['shipping_strt_bldg_hn'];

                                $shipping_contact = $_POST['shipping_contact'];

                                $shipping_zip = $_POST['shipping_zip'];

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
                                  if(isset($_POST["submit-payment"])){

                                    $shipping_full_name = $_POST['shipping_full_name'];
    
                                    $shipping_email = $_POST['shipping_email'];
    
                                    $shipping_reg_pro_cit_brgy = $_POST['shipping_reg_pro_cit_brgy'];
    
                                    $shipping_strt_bldg_hn = $_POST['shipping_strt_bldg_hn'];
    
                                    $shipping_contact = $_POST['shipping_contact'];
    
                                    $shipping_zip = $_POST['shipping_zip'];

                                    $mode_payment = $_POST['flexRadioDefault'];

                                    $_SESSION['s_mode_payment'] = $mode_payment;  
    
                                }
                         
                                ?>
                <!--Summary-->
              
                <div class="col-md-8 order-md-1 mt-1">
                    <div class="card p-4">
                        <div class="row-buyer-summary">
                            <div class="buyer-summary">Buyer Information</div>
                            <a href="#">Edit</a>
                        </div>
                        <form action="includes/order.confirm.php" id="formOrderSubmit" method="POST">
                        <div class="buyer-content">
                        <input type="hidden" id="user_id" name="s_shipping_full_name"  value="<?php echo $_SESSION['userID']; ?>" required >
                            <p class="name"><?php echo $_SESSION['s_shipping_full_name']; ?></p>
                            <input type="hidden" id="full_name" name="s_shipping_full_name"  value="<?php echo $_SESSION['s_shipping_full_name']; ?>" required >

                            <p class="email"><?php echo $_SESSION['s_shipping_email']; ?></p>
                            <input type="hidden" id="email" name="s_shipping_email"  value="<?php echo $_SESSION['s_shipping_email']; ?>" required >

                            <p class="number"><?php echo $_SESSION['s_shipping_contact']; ?></p>
                            <input type="hidden" id="contact" name="s_shipping_contact"  value="<?php echo $_SESSION['s_shipping_contact']; ?>" required >

                        </div>

                        <div class="row-shipping-summary">
                            <div class="shipping-summary">Shipping Information</div>
                            <a href="#">Edit</a>
                        </div>

                        <div class="shipping-content">
                            <p class="name"><?php echo $_SESSION['s_shipping_full_name']; ?></p>
                            <p class="address"><?php echo $_SESSION['s_shipping_strt_bldg_hn']; ?></p>
                            <input type="hidden" id="strt_bldg_hn" name="s_shipping_strt_bldg_hn"  value="<?php echo $_SESSION['s_shipping_strt_bldg_hn']; ?>" required >

                            <p class="address-cont"><?php echo $_SESSION['s_shipping_reg_pro_cit_brgy']; ?></p>
                            <input type="hidden" id="reg_pro_cit_brgy" name="s_shipping_reg_pro_cit_brgy"  value="<?php echo $_SESSION['s_shipping_reg_pro_cit_brgy']; ?>" required >

                        </div>

                        <div class="row-payment-summary">
                            <div class="payment-summary">Mode of Payment</div>
                            <a href="#">Edit</a>
                        </div>

                        <div class="payment-content">
                            <p class="payment-mode"><?php echo $_SESSION['s_mode_payment']; ?></p>
                            <input type="hidden" id="pay_mode" name="payment_mode"  value="<?php echo $_SESSION['s_mode_payment'];  ?>" required >
                        </div>
                    </div>
                      
                    <!--Action Buttons-->
                    <div class="action-btn">
                        <button type="submit" class="btn btn-return"><a href="payment.php" style="all:unset;">Return to Payment</button></a>
                        <button type="submit" id="orderConfirm" name="confirm-order" class="btn btn-dark btn-proceed">Confirm Order</button>
                    </div>
                    
                </div>
            </div>
            </form>
        </div>
       
    <script src="scripts/navbar.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

    <script>
         $(document).ready(function (){
             $('#orderConfirm').on('click',function(e){
                 e.preventDefault();
                 
                 Swal.fire({
                    title: "Confirm Order?",
                    text: "Please make sure that all details are correct.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#00C851",
                    confirmButtonText: "Place Order",
                    cancelButtonText: "Cancel",
                 }).then((result) => {
                    
                    var user_id = $('#user_id').val();
                    var full_name = $('#full_name').val();
                    var email = $('#email').val();
                    var contact = $('#contact').val();
                    var strt_bldg_hn = $('#strt_bldg_hn').val();
                    var reg_pro_cit_brgy = $('#reg_pro_cit_brgy').val();
                    var pay_mode = $('#pay_mode').val();

                    if(result.isConfirmed){
                        $.ajax({
                            url:'includes/order.confirm.php',
                            type:'post',
                            data:{
                                send_user_id:user_id,
                                send_full_name:full_name,
                                send_email:email,
                                send_contact:contact,
                                send_strt_bldg_hn:strt_bldg_hn,
                                send_reg_pro_cit_brgy:reg_pro_cit_brgy,
                                send_pay_mode:pay_mode
                            },success:function(data,result){
                                console.log(data);
                                // $('#formOrderSubmit').submit();
                                window.location.href = 'upload-payment.php';
                                
                            } 
                        });
                        // $('#formOrderSubmit').submit();
                    }
                 });
             });
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