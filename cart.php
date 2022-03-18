<?php

    // $active = 'Cart';
    include("includes/header.php");

    if (isset($_POST['add-cart'])){
        print_r($_POST['prodID']);
    }

?>


<!DOCTYPE html>
    <head>
        <title>Cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/cart.css">
    </head>

    <body>

        <!--Breadcrumb Navigation-->
        <div class="sub-nav">
            <ul class="breadcrumbs">
                <li class="breadcrumbs_item">
                    <a href="cart.php" class="cart-link active">Cart</a>
                </li>
                <li class="breadcrumbs_item">
                    <a href="shipping.php" class="shipping-link ">Shipping</a>
                </li>
                <li class="breadcrumbs_item">
                    <a href="payment.php" class="payment-link">Payment</a>
                </li>
                <li class="breadcrumbs_item">
                    <a href="summary.php" class="summary-link ">Summary</a>
                </li>
            </ul>
        </div>

          <!--Cart-->
          <div class="cart">
            <div class="wrapper">
                <div class="my-cart">
                    <!--Cart Header-->
                    <div class="cart-label">
                        <p>Product Name</p>
                        <p style="width:16%">Unit Price</p>
                        <p style="width:18%">Quantity</p>
                        <p>Total</p>
                        <p></p> 
                    </div>

        <?php
        
        $ip_add = getRealIpUser();

        $select_cart = "select * from cart where ip_add='$ip_add'";
                       
        $run_cart = mysqli_query($conn,$select_cart);
        
        $count = mysqli_num_rows($run_cart);

        $total = 0;
        
        if($count < 1){
            echo "<p> Cart is Empty</p>";
        } 
        
        else{

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
                    
                    $_SESSION['product_title'] = $product_title;
                    
                    $_SESSION['product_img1'] = $product_img1;

                    $_SESSION['product_quantity'] = $product_quantity;

                    $_SESSION['only_price'] = $only_price;

                    $_SESSION['sub_total'] = $sub_total;

                    $_SESSION['total'] = $total;
                
        ?>  
        
         <!--Cart Items-->
         <div class="cart-item">
                        <form action="shipping.php">
                            <div class="cart-product">
                            <div>
                            <img  class="product-image" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 3a">
                             </div> 
                            <div class="cart-header">
                                    <div class="product-info">
                                        <p class="product-name"><?php echo $_SESSION['product_title'];?></p>
                                        <p class="product-variation">Color: White</p>
                                        <p class="stocks"><?php echo "$product_quantity";?> stocks left!</i></p>
                                    </div>
                                    <!--product price in mobile ver-->
                                    <div class="product-price">
                                        <p class="price-sm">₱<?php echo "$sub_total";?></p>
                                   </div>
                                </div>
                            </div>

                            <div class="unit-price">
                                <h6> ₱<?php echo "$only_price";?></h6>
                            </div>
                            <div class="quantity-controls-md">
                                <div class="quantity-edit-controls">
                                   
                                    <button><a href="cart.php?remove=<?php echo $pro_id;?>" style="text-decoration:none; color:black;">-</a></button>
                                    <input type="number" name="qty" value="<?php echo "$pro_qty";?>" readonly/>
                                    <button><a href="cart.php?add=<?php echo $pro_id;?>" style="text-decoration:none; color:black;">+</a>
                                   
                                </div>
                            </div>
                            <div class="product-total">
                                <h6>$<?php echo "$sub_total";?></h6>
                            </div>
                            <div class="remove-md">
                                <button type="submit" name="update"><span>Remove Item</span></button>
                            </div>
                           
                            <!--remove item and quantity btn in mobile ver-->
                            <div class="cart-controls-sm">
                                <div class="remove">
                                    <span>Remove Item</span>
                                </div>
                                <div class="cart-quantity-controls-sm">
                                    <button>-</button>
                                    <input type="number" value="1"/>
                                    <button>+</button>
                                </div>   
                            </div>

                        </form>
                    </div>
                </div>

                <?php 
                        } 
                    } 
                }
                ?>

                <?php 

                if(isset($_GET['add'])){

                    $query = "SELECT * FROM products WHERE prodID=" . $_GET['add'];
                    $run_query = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($run_query)) {

                        if($row['quantity'] != $_SESSION['item_quantity']) {
                  
                          $_SESSION['item_quantity']+=1;
                          echo  "<script> location.replace('cart.php') </script>";
                
                        }else {
                            set_message("We only have " . $row['quantity'] . " " . "{$row['prodName']}" . " available");
                            redirect("cart.php");
                          }
                    }
                }
                 
                 if(isset($_GET['remove'])){
                     $qty = $_GET['qty'];
                    
                     $qty--;

                     header("cart.php");
                 }

                 function update_cart(){
                    
                    global $conn;
                    
                    if(isset($_POST['update'])){
                        
                            $pro_id = $_POST['pro_id'];

                            $delete_product = "delete from cart where p_id='$pro_id'";
                            
                            $run_delete = mysqli_query($conn,$delete_product);
                            
                            if($run_delete){
                                
                                echo "<script>window.open('cart.php','_self')</script>";
                                
                            }
                    
                    }
                    
                }
               
               echo @$up_cart = update_cart();
               

                ?>
    
                <!--Action Buttons-->
                <div class="checkout-subtotal">
                    <div class="product-subtotal">
                        <p>Subtotal:</p>
                        <p class="sub-price">
                            ₱<?php if($total>0){ echo $total; } else{echo "0.00";}?>
                        </p>
                    </div>
                    <div class="cart-btn">
                    <button type="submit" class="btn btn-dark btn-checkout"><a href="shipping.php" style="all:unset;">Proceed to Checkout</button></a>
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