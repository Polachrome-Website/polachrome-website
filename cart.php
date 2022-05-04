<?php

    // $active = 'Cart';
    include("includes/header.php");
   
    if (isset($_POST['add-cart'])){
        print_r($_POST['prodID']);
    }

    if($count==0){
        //  echo "<script> console.log('WALA LAMAN CART MO');</script>";
        echo "<script>window.open('product.php','_self')</script>";
        exit();
    }else{
?>


<!DOCTYPE html>
    <head>
        <title>Cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/cart.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>   
    <script>

   function increment_quantity(cart_id, price) {
    var productQuantity = $("#product-quantity-"+cart_id);
    // var quantity = pro_qty;
    
    var inputQuantityElement = $("#input-quantity-"+cart_id);

    // if(quantity >= $(inputQuantityElement).val()){
    //     var newQuantity = parseInt($(inputQuantityElement).val())+1;
    //     var newPrice = newQuantity * price;
    //     save_to_db(cart_id, newQuantity, newPrice);
    // }

    if($(productQuantity).val()-1 >= $(inputQuantityElement).val()){
        var newQuantity = parseInt($(inputQuantityElement).val())+1;
        var newPrice = newQuantity * price;
        save_to_db(cart_id, newQuantity, newPrice);
    }
 
}

 function decrement_quantity(cart_id, price) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    if($(inputQuantityElement).val() > 1) 
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    var newPrice = newQuantity * price;
    save_to_db(cart_id, newQuantity, newPrice);
    }
}

    function save_to_db(cart_id, new_quantity, newPrice) {
        var inputQuantityElement = $("#input-quantity-"+cart_id);
        var priceElement = $("#cart-price-"+cart_id);
        $.ajax({
            url : "update_cart_quantity.php",
            // data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
            data:{cart_id:cart_id, new_quantity:new_quantity},
            type : 'post',
            success : function(response) {
                console.log(response);
                $(inputQuantityElement).val(new_quantity);
                $(priceElement).text("₱"+newPrice);
                var totalQuantity = 0;
                $("input[id*='input-quantity-']").each(function() {
                    var cart_quantity = $(this).val();
                    totalQuantity = parseInt(totalQuantity) + parseInt(cart_quantity);
                });
                $("#total-quantity").text(totalQuantity);
                var totalItemPrice = 0;
                $("div[id*='cart-price-']").each(function() {
                    var cart_price = $(this).text().replace("₱","");
                    totalItemPrice = parseInt(totalItemPrice) + parseInt(cart_price);
                });

                $("#total-price").text("₱"+totalItemPrice);
            }
        });
    }
        </script>
    </head>

    <body>
    <?php
        
        if(isset($_SESSION['userID'])){
            $user_id = $_SESSION['userID'];
            $select_cart = "select * from cart where user_id='$user_id'";
        }

        else{
            $guest_id = $_SESSION['guest_id'];
            $select_cart = "select * from cart where user_id='$guest_id'";
        }
        // if(isset($_SESSION['guestID'])){
        //     $user_id = $_SESSION['guestID'];
        // }
        

       /// $ip_add = getRealIpUser();

       
                       
        $run_cart = mysqli_query($conn,$select_cart);
        
        $count = mysqli_num_rows($run_cart);

        $total = 0;
   ?>
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
    
        while($row_cart = mysqli_fetch_array($run_cart)){
            
            $pro_id = $row_cart['prod_id'];

            $pro_qty = $row_cart['qty'];
			
			$pro_var = $row_cart['var_id'];
			
			if ($pro_var == 0) {
				
				$get_products = "select * from products where prodID='$pro_id'";

                $run_products = mysqli_query($conn,$get_products);

                while($row_products = mysqli_fetch_array($run_products)){

                    $product_title = $row_products['prodName'];

                    $product_img1 = $row_products['prodImg1'];

                    $pro_price = $row_products['price'];

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
				 <?php add_cart();
				 ?>
				 <!-- <?php echo $user_id; ?> -->
						<!--Cart Items-->
						<div class="cart-item">
								<form action="shipping.php">
									<div class="cart-product">
									<div>
									<img class="product-image" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product Img">
									 </div> 
									<div class="cart-header-cart">
											<div class="product-info">
												<p class="product-name"><?php echo $_SESSION['product_title'];?></p>
												<p class="product-variation">Variation: <?php
                                                    if($product_title === 'Go Film'){echo "White Frame";}
                                                    elseif($product_title === 'Polaroid Go Instant Camera'){echo "Black";}
                                                    elseif($product_title === 'Polaroid Now Instant Camera'){echo "Black";}
                                                    elseif($product_title === 'Polaroid Now+ Instant Camera'){echo "Black";}
                                                    elseif($product_title === 'Polaroid SX-70 SLR'){echo "SX-70 Original";}
                                                    elseif($product_title === 'Photo Album'){echo "Small (40 Photos)";}
                                                    elseif($product_title === 'Camera Strap - Flat'){echo "Yellow";}
                                                    elseif($product_title === 'Camera Strap - Round'){echo "Yellow";}
                                                    else{echo "N/A";}
                                                ?></p>
												<!-- <p class="stocks"><?php echo "$product_quantity";?> stocks left!</i></p> -->
											   
												<p class="stocks">
													<?php if($product_quantity <=5 ){echo $product_quantity . " stocks left!";} ?>
											   </i></p>
											</div>
											<!--product price in mobile ver-->
											<div class="product-price">
												<p class="price-sm">₱<?php echo "$sub_total";?></p>
										   </div>
										</div>
									</div>

									<div class="unit-price">
										<p> ₱<?php echo "$only_price";?></p>
									</div>
									<div class="quantity-controls-md">
										<div class="quantity-edit-controls">
										   
										<input type="hidden" id="product-quantity-<?php echo $row_cart["cart_id"]; ?>" value="<?php echo $row_products["quantity"]; ?>" readonly/>

										
										<div class="btn-increment-decrement" onClick="decrement_quantity('<?php echo $row_cart["cart_id"]; ?>', '<?php echo $row_products["price"]; ?>')">-</div>
										<input type="text" disabled id="input-quantity-<?php echo $row_cart["cart_id"]; ?>" value="<?php echo $pro_qty; ?>" min="1" max="<?php echo $row_products["quantity"]; ?>">
								

											<!-- <button>-</button>
											<input type="number " value="1" readonly/>
											<button>+</button> -->

										<div class="btn-increment-decrement"
										onClick="increment_quantity('<?php echo $row_cart["cart_id"]; ?>', '<?php echo $row_products["price"]; ?>')">+</div>
												
										</div>
									</div>
									<div class="product-total" id="cart-price-<?php echo $row_cart["cart_id"]; ?>">
										<p>₱<?php echo "$sub_total";?></p>
									</div>
									<div class="remove-md">
										<!-- <button type="submit" name="update"><span>Remove Item</span></button> -->
										<a id="remove-item" href="cart.php?action=remove&id=<?php echo $row_cart["cart_id"]; ?>">
											Remove Item
										</a>
									</div>
								   
									<!--remove item and quantity btn in mobile ver-->
									<div class="cart-controls-sm">
										<div class="remove">
											<a id="remove-item" href="cart.php?action=remove&id=<?php echo $row_cart["cart_id"]; ?>">
												Remove Item
											</a>
										</div>
										<div class="cart-quantity-controls-sm">
										<input type="hidden" id="product-quantity-<?php echo $row_cart["cart_id"]; ?>" readonly/>
										
										<div class="btn-increment-decrement" onClick="decrement_quantity('<?php echo $row_cart["cart_id"]; ?>', '<?php echo $row_products["price"]; ?>')">-</div>
										<input type="text" disabled id="input-quantity-<?php echo $row_cart["cart_id"]; ?>" value="<?php echo $pro_qty; ?>" min="1" max="<?php echo $row_products["quantity"]; ?>">
								

											<!-- <button>-</button>
											<input type="number " value="1" readonly/>
											<button>+</button> -->

										<div class="btn-increment-decrement"
										onClick="increment_quantity('<?php echo $row_cart["cart_id"]; ?>', '<?php echo $row_products["price"]; ?>')">+</div>
										</div>   
									</div>

								</form>
							</div>

						<?php 
								} 
					   
					
			} else {
				
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
         <?php add_cart();
         ?>
         <!-- <?php echo $user_id; ?> -->
                <!--Cart Items-->
                <div class="cart-item">
                        <form action="shipping.php">
                            <div class="cart-product">
                            <div>
                            <img class="product-image" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product Img">
                             </div> 
                            <div class="cart-header-cart">
                                    <div class="product-info">
                                        <p class="product-name"><?php echo $_SESSION['product_title'];?></p>
                                        <p class="product-variation">Variation: <?php echo $_SESSION['product_varname'];?></p>
                                        <!-- <p class="stocks"><?php echo "$product_quantity";?> stocks left!</i></p> -->
                                       
                                        <p class="stocks">
                                            <?php if($product_quantity <=5 ){echo $product_quantity . " stocks left!";} ?>
                                       </i></p>
                                    </div>
                                    <!--product price in mobile ver-->
                                    <div class="product-price">
                                        <p class="price-sm">₱<?php echo "$sub_total";?></p>
                                   </div>
                                </div>
                            </div>

                            <div class="unit-price">
                                <p> ₱<?php echo "$only_price";?></p>
                            </div>
                            <div class="quantity-controls-md">
                                <div class="quantity-edit-controls">
                                   
                                <input type="hidden" id="product-quantity-<?php echo $row_cart["cart_id"]; ?>" value="<?php echo $row_provar["quantity"]; ?>" readonly/>

                                
                                <div class="btn-increment-decrement" onClick="decrement_quantity('<?php echo $row_cart["cart_id"]; ?>', '<?php echo $row_provar["price"]; ?>')">-</div>
                                <input type="text" disabled id="input-quantity-<?php echo $row_cart["cart_id"]; ?>" value="<?php echo $pro_qty; ?>" min="1" max="<?php echo $row_provar["quantity"]; ?>">
                        

                                    <!-- <button>-</button>
                                    <input type="number " value="1" readonly/>
                                    <button>+</button> -->
									
								
                                <div class="btn-increment-decrement"
                                onClick="increment_quantity('<?php echo $row_cart["cart_id"]; ?>', '<?php echo $row_provar["price"]; ?>')">+</div>
                                        
                                </div>
                            </div>
                            <div class="product-total" id="cart-price-<?php echo $row_cart["cart_id"]; ?>">
                                <p>₱<?php echo "$sub_total";?></p>
                            </div>
                            <div class="remove-md">
                                <!-- <button type="submit" name="update"><span>Remove Item</span></button> -->
                                <a id="remove-item" href="cart.php?action=remove&id=<?php echo $row_cart["cart_id"]; ?>">
                                    Remove Item
                                </a>
                            </div>
                           
                            <!--remove item and quantity btn in mobile ver-->
                            <div class="cart-controls-sm">
                                <div class="remove">
                                    <a id="remove-item" href="cart.php?action=remove&id=<?php echo $row_cart["cart_id"]; ?>">
                                        Remove Item
                                    </a>
                                </div>
                                <div class="cart-quantity-controls-sm">
                                <input type="hidden" id="product-quantity-<?php echo $row_cart["cart_id"]; ?>" readonly/>
                                
                                <div class="btn-increment-decrement" onClick="decrement_quantity('<?php echo $row_cart["cart_id"]; ?>', '<?php echo $row_provar["price"]; ?>')">-</div>
                                <input type="text" disabled id="input-quantity-<?php echo $row_cart["cart_id"]; ?>" value="<?php echo $pro_qty; ?>" min="1" max="<?php echo $row_provar["quantity"]; ?>">
                        

                                    <!-- <button>-</button>
                                    <input type="number " value="1" readonly/>
                                    <button>+</button> -->

                                <div class="btn-increment-decrement"
                                onClick="increment_quantity('<?php echo $row_cart["cart_id"]; ?>', '<?php echo $row_provar["price"]; ?>')">+</div>
                                </div>   
                            </div>

                        </form>
                    </div>

                <?php 
                        } 
                ?>
				
			<?php
			}
			?>
                
                
                <?php } ?>   <!-- end while loop for fetch cart -->

            </div> <!--End mycart -->
                <!--Action Buttons-->
                <div class="checkout-subtotal">
                    <!-- <div class="product-subtotal" id="cart-tot-price-<?php echo $row_cart["cart_id"]; ?>"> -->
                    <div class="product-subtotal">
                        <p>Subtotal:</p>
                        <p class="sub-price" id="total-price" >
                            ₱<?php if($total>0){ echo $total; } else{echo "0.00";}?>
                        </p>
                    </div>
                    <div class="cart-btn">
                    <button type="submit" class="btn btn-checkout" onclick="location.href='shipping.php'">Proceed to Checkout</button>
                    </div> 
                </div>
            </div>
        </div>
        <script src="scripts/navbar.js"></script> 

   
    </body>


    <!--Footer Section-->
 <footer class="footer">
    <div class="row">
        <!--Logo-->   
        <div class="col-lg-3 col-md-6 col sm-6">
            <div class="footer-about">
                <h3>Contact Us</h3>
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
<?php } //end else statement if cart has item?> 
</html>