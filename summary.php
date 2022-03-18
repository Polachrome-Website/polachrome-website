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
                            
                            $ip_add = getRealIpUser();

                            $select_cart = "select * from cart where ip_add='$ip_add'";
                                        
                            $run_cart = mysqli_query($conn,$select_cart);
                            
                            $count = mysqli_num_rows($run_cart);

                            $total = 0;

                            $ship_fee = 45.00;

                            while($row_cart = mysqli_fetch_array($run_cart)){
            
                                $pro_id = $row_cart['p_id'];
                    
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

                <!--Summary-->
                <div class="col-md-8 order-md-1 mt-1">
                    <div class="card p-4">
                        <div class="row-buyer-summary">
                            <div class="buyer-summary">Buyer Information</div>
                            <a href="#">Edit</a>
                        </div>

                        <div class="buyer-content">
                            <p class="name">John Doe</p>
                            <p class="email">johndoe@gmail.com</p>
                            <p class="number">09169876789</p>
                        </div>

                        <div class="row-shipping-summary">
                            <div class="shipping-summary">Shipping Information</div>
                            <a href="#">Edit</a>
                        </div>

                        <div class="shipping-content">
                            <p class="name">Name</p>
                            <p class="address">Street Name, Building, House No.</p>
                            <p class="address-cont">City, Country</p>
                        </div>

                        <div class="row-payment-summary">
                            <div class="payment-summary">Mode of Payment</div>
                            <a href="#">Edit</a>
                        </div>

                        <div class="payment-content">
                            <p class="payment-mode">Cash on Delivery</p>
                        </div>
                    </div>
                    <!--Action Buttons-->
                    <div class="action-btn">
                        <button type="submit" class="btn btn-return">Return to Payment</button>
                        <button type="submit" class="btn btn-dark btn-proceed">Confirm Order</button>
                    </div>
                   
                </div>
            </div>
        </div>
    <script src="navbar.js"></script>
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