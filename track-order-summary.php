<?php
    include("includes/header.php");

    if(isset($_POST['track-submit'])){
    
        $reference_no = $_POST['track-reference'];
    
        $select_order = "SELECT * from tbl_orders where invoice_no='$reference_no'";

    }

?>
    <head>
        <title>Track your Order</title>
    
        <!--Main css-->
        <link rel="stylesheet" href="styles/track-order.css">

    </head>

    <body>

      <!--Body-->
      <div class="container">
            <div class="row">
                <h5>Order Summary - #Reference Number</h5>
        </div>
            <div class="table-responsive"><!-- table-responsive begin -->
            <table class="table table-striped table-bordered table-hover">
            <thead><!-- thead begin -->
								<tr><!-- tr begin -->
									<th> Product Name </th>
									<th> Quantity </th>
									<th> Amount </th>
									<th> Date Placed </th>
									<th> Mode of Payment </th>
									<th> Proof of Payment</th>
									<th> Order Status </th>
									
								</tr><!-- tr finish -->
							</thead><!-- thead finish -->
							
                        <tbody>
                           
                        </tbody>
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
           
        </div>



        <!--Bootsrap JS cdn-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="scripts/navbar.js"></script>
        
        <!--FAQs script-->
        <script src="scripts/faq.js"></script>

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
</html>


