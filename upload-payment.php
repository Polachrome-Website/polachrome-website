<?php
    include("includes/header.php");

    if(isset($_GET["refno"])){
        $reference_no = $_GET["refno"];
    }
?>

    <title>Upload Payment</title>

    <!--Bootstrap Cdn-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Main CSS-->
    <link rel="stylesheet" href="styles/upload-payment.css">
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

    </head>

<body>

   <!--Body-->
   <div class="container">

    <form action="includes/proof.inc.php" method="POST" enctype="multipart/form-data">
   <div class="card">
    <div class="row upload">

        <img src="img/dragdrop.png">
        <h2>Upload Proof of Payment </h2>
        <input name="reference_no" type="hidden" value="<?php echo $reference_no ?>">
        <p> Reference No.: <?php echo $reference_no ?> </p>

        <input type="file" id="upload_img" name="img_payment" class="choose-file" accept="image/*" required>
    
    </div>
    <button type="submit" name="payment-upload" class="btn">Upload</button>
    </form>
 
    </div>

</div>

        </div>
     <!--Bootsrap JS cdn-->
     <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>    
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="scripts/navbar.js"></script>
    

     
     <?php 
        if (isset($_GET["status"])) {
            if ($_GET["status"] == "success") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Your order was successfully placed. Kindly upload a proof of payment and take note of your reference number for order tracking.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
            if ($_GET["status"] == "uploadsuccess") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Your payment was successfully posted. You may track the status of your order through the order tracking page.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
            if ($_GET["status"] == "errorupload") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'There was an error uploading your file. Please ensure to upload correct image format (jpg, jpeg, png) and a file size of less than 5MB.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
        }

    ?>

        
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