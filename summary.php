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
                <a href="cart.php?item=<?php if(isset($_SESSION["userID"])){echo items();} else{echo guest_items();}?>" class="cart-link">Cart</a>
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
                        <div class="order-wrapper"> <!-- begin order-wrapper -->
                        <?php

                            if(isset($_SESSION['userID'])){
                                $user_id = $_SESSION['userID'];
                            }
                            else{
                                $user_id = $_SESSION['guest_id'];
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
                                <div class="row variation">Variation: <?php 
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
                                <div class="row quantity">Qty: <?php echo "$pro_qty";?></div>
                            </div>
                        </div>

                        <?php 
                                    } 
                                }
                                
                                  // if product has variation
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

                                        $total_fee = $total + $ship_fee;     
                                        
                                        $_SESSION['product_title'] = $product_title;
                                        
                                        $_SESSION['product_img1'] = $product_img1;
                                        
                                        $_SESSION['product_varname'] = $product_varname;

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
                                <div class="row variation">Variation: <?php echo $_SESSION['product_varname'] ?></div>
                                <div class="row quantity">Qty: <?php echo "$pro_qty";?></div>
                            </div>
                            </div>

                            <?php    

                                    } //end while loop for fetch prod var  
                                } //end else statement for fetch prod var
                            } //end while for cart fetch
                                            
                            ?>
                          </div>   <!-- end order-wrapper -->
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
                            <a href="#" onclick="showEditBuyer()">Edit</a>    
                        </div>
                
                        <form action="includes/order.confirm.php" id="formOrderSubmit" method="POST">
                        <div class="buyer-content">
                        <input type="hidden" name="totalFee" value=<?php echo "$total_fee";?> />
                            <input type="hidden" id="user_id" name="s_shipping_user_id"  
                                value="<?php 
                                    if(isset($_SESSION['userID'])){
                                        echo $_SESSION['userID']; 
                                    }else{
                                        echo $_SESSION['guest_id']; 
                                    }
                                ?>" required >

                            <p class="name" id="txt_full_name"><?php echo $_SESSION['s_shipping_full_name']; ?></p>

                            <input type="hidden" id="full_name" name="s_shipping_full_name" value="<?php echo $_SESSION['s_shipping_full_name']; ?>" required >

                            <p class="email" id="txt_email"><?php echo $_SESSION['s_shipping_email']; ?></p>
                            <input type="hidden" id="email" name="s_shipping_email"  value="<?php echo $_SESSION['s_shipping_email']; ?>" required >

                            <p class="number" id="txt_contact"><?php echo $_SESSION['s_shipping_contact']; ?></p>
                            <input type="hidden" id="contact" name="s_shipping_contact"  value="<?php echo $_SESSION['s_shipping_contact']; ?>" required >

                        </div>

                        <div class="row-shipping-summary">
                            <div class="shipping-summary">Shipping Information</div>
                            <a href="#" onclick="showEditShipping()">Edit</a>    
                        </div>

                        <div class="shipping-content">
                            <p class="name" id="txt_full_name"><?php echo $_SESSION['s_shipping_full_name']; ?></p>
                            <p class="address" id="txt_strt_bldg_hn"><?php echo $_SESSION['s_shipping_strt_bldg_hn']; ?></p>
                            <input type="hidden" id="strt_bldg_hn" name="s_shipping_strt_bldg_hn"  value="<?php echo $_SESSION['s_shipping_strt_bldg_hn']; ?>" required >

                            <p class="address-cont" id="txt_reg_pro_cit_brgy"><?php echo $_SESSION['s_shipping_reg_pro_cit_brgy']; ?></p>
                            <input type="hidden" id="reg_pro_cit_brgy" name="s_shipping_reg_pro_cit_brgy"  value="<?php echo $_SESSION['s_shipping_reg_pro_cit_brgy']; ?>" required >

                        </div>

                        <div class="row-payment-summary">
                            <div class="payment-summary">Mode of Payment</div>
                            <a href="#" onclick="showEditPayment()">Edit</a>    
                        </div>

                        <div class="payment-content">
                            <p class="payment-mode" id="txt_payment"><?php echo $_SESSION['s_mode_payment']; ?></p>
                            <input type="hidden" id="pay_mode" name="payment_mode"  value="<?php echo $_SESSION['s_mode_payment'];  ?>" required >
                        </div>
                    </div>
                      
                    <!--Action Buttons-->
                    <div class="action-btn">
                        <p style="color:red;"><em>By confirming, you agree that all details are correct. There will be no cancellation of orders and change of payment method.  </em></p>
                        <button type="button" class="btn btn-return" onclick="location.href='payment.php'">Return to Payment</button>
                        <button type="submit" id="orderConfirm" name="confirm-order" class="btn btn-proceed">Confirm Order</button>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <!-- Modal -->
	    <div class="modal fade" id="editBuyerInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel">Buyer Information</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="update_full_name">Full Name</label>
					<input type="text" name="update_full_name" class="form-control" id="update_full_name" value="<?php echo $_SESSION['s_shipping_full_name'] ?>" >
				</div>
				<div class="form-group"><!-- form-group Begin -->
					<label for="update_email" class="col-md-3 control-label">Email</label> 
					<input type="text" name="update_email" class="form-control" id="update_email" value="<?php echo $_SESSION['s_shipping_email']; ?>">
				</div><!-- form-group Finish -->
                <div class="form-group"><!-- form-group Begin -->
					<label for="update_contact" class="col-md-3 control-label">Contact</label> 
					<input type="text" name="update_contact" class="form-control" id="update_contact" value="<?php echo $_SESSION['s_shipping_contact']; ?>" onkeydown="return validateIsNumericInput(event)">
				</div><!-- form-group Finish -->
		
			</div>
			<div class="modal-footer">
				<input type="hidden" id="hiddendata">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="updateBuyer()">Save changes</button>
			</div>
			</div>
		</div>
	</div>
    
        <!-- Modal -->
	    <div class="modal fade" id="editShippingInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel">Shipping Information</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="update_s_full_name">Full Name</label>
					<input type="text" name="update_s_full_name" class="form-control" id="update_s_full_name" value="<?php echo $_SESSION['s_shipping_full_name'] ?>" >
				</div>
				<div class="form-group"><!-- form-group Begin -->
					<label for="update_strt_bldg_hn">Street Name, Bldg, House No.</label> 
					<input type="text" name="update_strt_bldg_hn" class="form-control" id="update_strt_bldg_hn" value="<?php echo $_SESSION['s_shipping_strt_bldg_hn'];?>">
				</div><!-- form-group Finish -->
                <div class="form-group"><!-- form-group Begin -->
					<label for="update_reg_pro_cit_brgy">Barangay, City, Province</label> 
					<input type="text" name="update_reg_pro_cit_brgy" class="form-control" id="update_reg_pro_cit_brgy" value="<?php echo $_SESSION['s_shipping_reg_pro_cit_brgy'];?>">
				</div><!-- form-group Finish -->
		
			</div>
			<div class="modal-footer">
				<input type="hidden" id="hiddendata">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="updateShipping()">Save changes</button>
			</div>
			</div>
		</div>
	</div>

     <!-- Modal -->
     <div class="modal fade" id="editPaymentInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel">Mode of Payment</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group">

                    <label for="update_payment">Payment Method</label> 
				    <select name="update_payment" class="form-control" id="update_payment" value="<?php $_SESSION['s_mode_payment'];?>"><!-- form-control Begin -->
                        
                        <option value='Gcash'> Gcash </option>
                        <option value='Paymaya'> Paymaya </option>
                        <option value='Bank Transfer'> Bank Transfer </option>
                        <option value='Cash on Delivery'> Cash on Delivery </option>
                        
                    </select>
                
                </div>
				
			</div>
			<div class="modal-footer">
				<input type="hidden" id="hiddendata">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="updatePayment()">Save changes</button>
			</div>
			</div>
		</div>
	</div>
       
    <script src="scripts/navbar.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script>

        function showEditBuyer(){
            $('#editBuyerInfoModal').modal('show');
        }
        function showEditShipping(){
            $('#editShippingInfoModal').modal('show');
        }
        function showEditPayment(){
            $('#editPaymentInfoModal').modal('show');
        }

        function updateBuyer(){
            var edit_full_name = $("#update_full_name").val();  //value from editing
            // console.log(edit_full_name);
            var new_name = $("*[id^='txt_full_name']").text(edit_full_name).change(); //value from frontend
            var input_new_name = $("#full_name").val(edit_full_name).change(); //value to pass on server

            var edit_email = $("#update_email").val();
            var new_email = $("#txt_email").text(edit_email).change();
            var input_new_email = $("#email").val(edit_email).change();

            var edit_contact = $("#update_contact").val();
            var new_contact = $("#txt_contact").text(edit_contact).change();
            var input_new_contact = $("#contact").val(edit_contact).change();

            $.ajax({
                url:"includes/order.confirm.php",
                type:"POST",
                data:{
                    s_shipping_full_name:edit_full_name,
                    s_shipping_email:edit_email,
                    s_shipping_contact:edit_contact
                },
                success:function(data,status){
                    $('#editBuyerInfoModal').modal('hide');
                    console.log(data);
				}
            });
        }

        function updateShipping(){

            var edit_full_name = $("#update_s_full_name").val();  //value from editing
            var new_name = $("*[id^='txt_full_name']").text(edit_full_name).change(); //value from frontend
            var input_new_name = $("#full_name").val(edit_full_name).change(); //value to pass on server

            var edit_strt_bldg_hn = $("#update_strt_bldg_hn").val();
            var new_strt_bldg_hn = $("#txt_strt_bldg_hn").text(edit_strt_bldg_hn).change();
            var input_new_strt_bldg_hn = $("#strt_bldg_hn").val(edit_strt_bldg_hn).change();

            var edit_reg_pro_cit_brgy = $("#update_reg_pro_cit_brgy").val();
            var new_reg_pro_cit_brgy = $("#txt_reg_pro_cit_brgy").text(edit_reg_pro_cit_brgy).change();
            var input_new_reg_pro_cit_brgy = $("#reg_pro_cit_brgy").val(edit_reg_pro_cit_brgy).change();

            
            $.ajax({
                url:"includes/order.confirm.php",
                type:"POST",
                data:{
                    s_shipping_full_name:edit_full_name,
                    s_shipping_strt_bldg_hn:edit_strt_bldg_hn,
                    s_shipping_reg_pro_cit_brgy:edit_reg_pro_cit_brgy
                },
                success:function(data,status){
                    $('#editShippingInfoModal').modal('hide');
                    console.log(data);
				}
            });
        }

        function updatePayment(){
            var edit_payment = $("#update_payment").val();  //value from editing
            var new_payment = $("#txt_payment").text(edit_payment).change(); //value from frontend
            var input_new_payment = $("#pay_mode").val(edit_payment).change(); //value to pass on server

            $.ajax({
                url:"includes/order.confirm.php",
                type:"POST",
                data:{
                    payment_mode:edit_payment,
                },
                success:function(data,status){
                    $('#editPaymentInfoModal').modal('hide');
                    console.log(data);
				}
            });
        }

    </script>

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
                    <h3>Contact Us</h3>
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