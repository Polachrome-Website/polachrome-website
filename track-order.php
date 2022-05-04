<?php
    $active = "Track";
    include("includes/header.php");

?>
    <head>
        <title>Track your Order</title>
    
        <!--Main css-->
        <link rel="stylesheet" href="styles/track-order.css">

    </head>
    <body>

        <?php
            if(isset($_GET['refno'])){
                $ref_no = $_GET['refno'];
            }
        
        ?>
        <!--Body-->
        <div class="container">
            <div class="row">
                <h5>Track Order</h5>
            </div>

            <!--Order ID, Customer ID-->
            <form action="track-order-summary.php" method="POST"> 
                <div class="row">
                    <div class="col">
                    <?php
                        if(isset($_GET['refno'])){
                            $ref_no = $_GET['refno'];
                        
                        echo "<input type='text' onkeydown='return validateIsNumericInput(event)' name='track-reference' class='text-box text-center'
                        value='$ref_no' required>";
                        } 
                        else{
                            echo "<input type='text' onkeydown='return validateIsNumericInput(event)' name='track-reference' class='text-box text-center'
                            placeholder='Enter your reference number' required>";
                        }
                      ?>

                    <!-- <input type="text" oninvalid="this.setCustomValidity('Enter Numers')" onkeydown="return validateIsNumericInput(event)" name="track-reference" class="text-box text-center"
                        placeholder="Enter your reference number"  required> -->
                    </div>
                    <!-- <div class="col">
                        <p>Customer ID<input type="text" name="email" class="text-box" placeholder="Customer ID" required></p>
                    </div> -->
                    <br><br>
                </div>

                <!-- <div class="row">
                    <div class="col">
                        <br>
                        <input type="text" name="track-email" class="text-box text-center" placeholder="Enter your email" required>
                    </div>
                </div> -->

                <div class="row">
                    <div class="col">
                        <br>
                        <button type="submit" class="btn-track" name="track-submit">Submit</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <br><br> <br><br>
                    </div>
                </div>
            </form>

            <!--Order Total, Order Points-->
            <!-- <div class="row">
                <div class="col">
                    <p style="margin-left:-25px;">Order Total<input type="number" name="name"  disabled="disabled" class="text-box"></p>
                </div>
                <div class="col">
                    <p>Order Points<input type="text" name="email" disabled="disabled" class="text-box"></p>
                </div>
            </div> -->

            <!--Payment Method, Payment Status-->
            <!-- <div class="row">
                <div class="col">
                    <p>Payment Method<input type="text" name="name"  disabled="disabled" style="width: 270px;" class="text-box"></p>
                </div>
                <div class="col">
                    <p style="margin-left: -80px;">Payment Status<input type="text" name="email" disabled="disabled" style="width: 225px; margin-right: 7px;" class="text-box"><button class="btn">Upload</button></p>
                </div>
            </div> -->

             <!--Order Status-->
             <!-- <div class="row">
                <p>Order Status<input type="text" name="name"  disabled="disabled" style="width: 880px;" class="text-box"></p>
            </div> -->

           
        </div>
        
        <?php
        if (isset($_GET["action"])) {
            if ($_GET["action"] == "notfound") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Reference number not found. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
        }
        ?>


        <!--Bootsrap JS cdn-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="scripts/navbar.js"></script>
        
        <!--FAQs script-->
        <script src="scripts/faq.js"></script>

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