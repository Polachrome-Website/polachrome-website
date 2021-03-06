<?php
    include("includes/header.php");

?>

<head>
        <title>Track your Order</title>
    
        <!--Main css-->
        <link rel="stylesheet" href="styles/track-order.css">

    </head>
<?php

    if(isset($_POST['track-submit'])){
    
        $reference_post = $_POST['track-reference'];

        echo "<script>window.open('track-order-summary.php?refno=$reference_post','_self')</script>";

    }

    if (isset($_GET["refno"])) {

        $reference_no = $_GET["refno"];

        $select_order = "SELECT * from tbl_orders where invoice_no='$reference_no'";

        $run_order = mysqli_query($conn,$select_order);

        $count = mysqli_num_rows($run_order);

    }

    if($count==0){
        echo "<script>window.open('track-order.php?action=notfound','_self')</script>";
    }
    else{
?>
    <body>

      <!--Body-->
      <div class="container">
            <div class="row">
                <h5>Order Summary - <?php echo $reference_no ?></h5>
        </div>

        <?php
        
        while($row_order=mysqli_fetch_array($run_order)){

            $reference_no = $row_order['invoice_no'];

            $pro_id = $row_order['pro_id'];

            $get_product = "select * from products where prodID='$pro_id'";

            $run_product = mysqli_query($conn,$get_product);

            $row_product = mysqli_fetch_array($run_product);

            $prod_name = $row_product['prodName'];

            $pro_var = $row_order['var_id'];

            $pro_qty = $row_order['pro_qty'];

            $amount = $row_order['amount'];

            $order_date = $row_order['order_date'];

            $order_status = $row_order['order_status'];

            if($pro_var == 0){
                if($prod_name === 'Go Film'){
                    $product_varname = 'White Frame';
                }
                elseif($prod_name === 'Polaroid Go Instant Camera'){
                    $product_varname = 'Black';
                }
                elseif($prod_name === 'Polaroid Now Instant Camera'){
                    $product_varname = 'Black';
                }
                elseif($prod_name === 'Polaroid Now+ Instant Camera'){
                    $product_varname = 'Black';
                }
                elseif($prod_name === 'Polaroid SX-70 SLR'){
                    $product_varname = 'SX-70 Original';
                }
                elseif($prod_name === 'Photo Album'){
                    $product_varname = 'Small (40 Photos)';
                }
                else{
                    $product_varname = '';
                }
            }
            if($pro_var !=0){
                $get_products = "select * from products where prodID='$pro_id'";

                $run_products = mysqli_query($conn,$get_products);

                while($row_products = mysqli_fetch_array($run_products)){
                    $get_productsvar = "select  * from product_variation where varID='$pro_var'";

                    $run_productsvar = mysqli_query($conn,$get_productsvar);
                                    
                    $row_provar=mysqli_fetch_array($run_productsvar);

                    $product_varname = $row_provar['prodVariation'];
                }
            }

        

        $select_order_customers = "SELECT * from tbl_orders_customers where invoice_no='$reference_no'";

        $run_order_customers = mysqli_query($conn,$select_order_customers);

        while($row_order_customers=mysqli_fetch_array($run_order_customers)){
            $pay_mode = $row_order_customers['pay_mode'];
        }

        $select_product = "SELECT * from products where prodID='$pro_id'";

        $run_product = mysqli_query($conn,$select_product);

        while($row_product=mysqli_fetch_array($run_product)){
            $pro_name = $row_product['prodName'];
        }
        echo"
        <div class='table-responsive'><!-- table-responsive begin -->
        <table class='table table-striped table-bordered table-hover'>
        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Product Name </th>
                                <th> Variation </th>
                                <th> Quantity </th>
                                <th> Date Placed </th>
                                <th> Mode of Payment </th>
                                <th> Order Status </th>
                                ";

                                if($pay_mode != 'Cash on Delivery' && $order_status == 'Pending'){
                                    echo "<th> Upload Proof of Payment </th>
                                    </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                    <tbody>

                        <td>$pro_name</td>
                        <td>$product_varname</td>
                        <td>$pro_qty</td>
                        <td>$order_date</td>
                        <td>$pay_mode</td>
                        <td>$order_status <em> (no proof uploaded) </em> </td>
                        <td>  
                        <form action='includes/proof.inc.php' method='POST' enctype='multipart/form-data'>
                              <input name='reference_no' id='reference_no' type='hidden' value=$reference_no>
                             <input type='file' id='upload_img' name='img_payment' class='choose-file' accept='image/*' required>
                              <br>
                              <button type='submit' name='payment-upload' class='btn-track'>Upload</button>
                        </form>
                        </td>
                       
                    </tbody>
                </table><!-- table table-striped table-bordered table-hover finish -->
            </div><!-- table-responsive finish -->


                                    ";
                                }
                                else{
                                echo"
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                    <tbody>

                        <td>$pro_name</td>
                        <td>$product_varname</td>
                        <td>$pro_qty</td>
                        <td>$order_date</td>
                        <td>$pay_mode</td>
                        <td>$order_status</td>
                       
                    </tbody>
                </table><!-- table table-striped table-bordered table-hover finish -->
            </div><!-- table-responsive finish -->
        
      ";
    }
    } 


    
    ?>

        <h6> Total Amount of Order: ???<?php echo $amount ?> </h6>
  
         </div>
            
            


        <!--Bootsrap JS cdn-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="scripts/navbar.js"></script>
        
        <!--FAQs script-->
        <script src="scripts/faq.js"></script>

        <script>
        function uploadProof(){
            var reference_no = $("#reference_no").val();

            $.post("includes/proof.inc.php", {reference_no:reference_no}, function(data,status){
            });
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
                            <li><a href="https://www.instagram.com/pola.chrome"><i class="fab fa-instagram-square"></i> PolaChrome</i></a></li>
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
    <?php } //end else statment if reference no exists?> 
</html>


