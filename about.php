<?php 
    $active = 'About';
    include("includes/header.php");
?>  
    <head>
        <title>About Us</title>

        <!--Main css-->
        <link rel="stylesheet" href="styles/about.css">
    </head>
    <body>

            <!--Background img-->
            <div class="container">
           <div class="row">
                <div class="story col" style="margin-top:40px;">
                    <h1>History of Business</h1>
                    <p>A one-stop-shop for everything Polaroid that is rooted upon the resurgence of analog instant photography with the pioneer 
                        brand. Started in 2020 with an initial offering of 600 Film for vintage Polaroid Cameras and has now grown to offer a 
                        wider range of Polaroid products namely: Polaroid Instant Film, Instant Cameras, Instant Printers, and Accessories. With 
                        an aim of providing accessible and affordable Polaroid products to the Filipino instant photography community, we envision the steady growth of this niche as we learn to treasure 
                        the now, one instant film at a time.
                    </p>
                </div>
                <div class="col" style="margin-top:70px;">
                    <img src="img/logo.png" class="img">  
                </div>
           </div>

          
            <h1 style="margin-top: 50px;">Why Polaroid?</h1>
            <div class=" features row">
                 <!--Feature 1-->
                 <div class="col">
                    <div class="card">
                        <div class="icon" style="background-image: url(img/iaccess.png);"></div>
                        <h5>Instant Access</h5>
                        <p>Instant access to the physical photo right after being taken.</p>
                    </div>
                </div>
                
                <!--Feature 2-->
                <div class="col">
                    <div class="card">
                        <div class="icon" style="background-image: url(img/rare.png);"></div>
                        <h5>One in a million</h5>
                        <p>Photographs are not reproducable. It is the only copy that exists in the world.</p>
                    </div>
                </div>
    
                <!--Feature 3-->
                <div class="col">
                    <div class="card">
                        <div class="icon" style="background-image: url(img/flash.png);"></div>
                        <h5>Classic Flash Look</h5>
                        <p>The iconic flash of Polaroids creates a washed-out exposure that has become synonymous with vintage photography. </p>
                    </div>
                </div>    
            </div>

            <!--Comparison Chart-->
            <h1 style="margin-top: 50px;">Comparison Chart</h1>
            <div class="comparison-chart row">
                <div class="col">
                    <h5>Original Polaroid</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed quam sed lorem mollis lobortis. Fusce euismod erat a turpis viverra venenatis. Duis nunc nibh, faucibus vitae risus lacinia, porttitor varius dolor. 
                        Pellentesque ornare risus quis semper maximus. Nulla vitae dapibus nulla. Etiam lorem elit, rutrum eu sapien id, sagittis mattis felis. Morbi vel lacus nisl.
                    </p>
                </div>
                <div class="col" style="border-left: solid white 1px; padding-left: 40px;">
                    <h5>Other Brand</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed quam sed lorem mollis lobortis. Fusce euismod erat a turpis viverra venenatis. Duis nunc nibh, faucibus vitae risus lacinia, porttitor varius dolor. 
                        Pellentesque ornare risus quis semper maximus. Nulla vitae dapibus nulla. Etiam lorem elit, rutrum eu sapien id, sagittis mattis felis. Morbi vel lacus nisl.
                    </p>
                </div>
           </div>
 
        </div>
        

    
    <!--Bootsrap JS cdn-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="scripts/navbar.js"></script>
      
    
  </body>

    <!-- Footer -->
    <?php 
        include("includes/footer.php")
    ?>
    
</html>