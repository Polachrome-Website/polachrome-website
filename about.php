<?php 
    $active = 'About';
    include("includes/header.php");
?>  
    <head>
        <title>Testimonials</title>

        <!--Main css-->
        <link rel="stylesheet" href="styles/about.css">
    </head>
    <body>

        <!--Background img-->
        <div class="container">
           <div class="row">
                <div class="story col">
                    <h1>Our Story</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed quam sed lorem mollis lobortis. Fusce euismod erat a turpis viverra venenatis. Duis nunc nibh, faucibus vitae risus lacinia, porttitor varius dolor. 
                        Pellentesque ornare risus quis semper maximus. Nulla vitae dapibus nulla. Etiam lorem elit, rutrum eu sapien id, sagittis mattis felis. Morbi vel lacus nisl.
                    </p>
                </div>
                <div class="col">
                    <img src="img/logo.png" class="img">  
                </div>
           </div>

          
            <h1 style="margin-top: 50px;">Polaroid Features</h1>
            <div class=" features row">
                 <!--Feature 1-->
                 <div class="col">
                    <div class="card">
                        <div class="icon"></div>
                        <h5>Feature 1</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed quam sed lorem mollis lobortis.</p>
                    </div>
                </div>
                
                <!--Feature 2-->
                <div class="col">
                    <div class="card">
                        <div class="icon"></div>
                        <h5>Feature 2</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed quam sed lorem mollis lobortis.</p>
                    </div>
                </div>
    
                <!--Feature 3-->
                <div class="col">
                    <div class="card">
                        <div class="icon"></div>
                        <h5>Feature 3</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed quam sed lorem mollis lobortis.</p>
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