<?php
    $active = 'FAQs';
    include_once 'includes/header.php'
?>  
    <head>
        <title>Frequently Asked Questions</title>
        
        <!--Main css-->
        <link rel="stylesheet" href="styles/faq.css">
    </head>
    <body>
        <!--Body-->
        <div class="container">
            <!--Left (picture)-->
            <div class="left">
                <div class="img-box">
                    <img src="img/question.png">
                </div>
            </div>

        <!--Right (questions)-->
        <div class="right">
            <h2>Frequently Asked Questions (FAQs)</h2>
            
            <!--Q1-->
            <div class="accordion">
                <h5><i class="fas fa-chevron-circle-down"></i> What is Question 1?</h5>
            </div>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>

             <!--Q2-->
             <div class="accordion">
                <h5><i class="fas fa-chevron-circle-down"></i> What is Question 2?</h5>
            </div>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>

             <!--Q3-->
             <div class="accordion">
                <h5><i class="fas fa-chevron-circle-down"></i> What is Question 3?</h5>
            </div>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>

             <!--Q4-->
             <div class="accordion">
                <h5><i class="fas fa-chevron-circle-down"></i> What is Question 4?</h5>
            </div>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            
             <!--Q5-->
             <div class="accordion">
                <h5><i class="fas fa-chevron-circle-down"></i> What is Question 5?</h5>
            </div>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>

        </div>
        </div>


        <!--Bootsrap JS cdn-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="scripts/navbar.js"></script>
        
        <!--FAQs script-->
        <script src="scripts/faq.js"></script>

    </body>

    <!-- Footer -->
      <?php 
        include("includes/footer.php")
      ?>
</html>