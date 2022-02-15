<?php 
    include_once 'includes/header.php'
 ?>  

<head>
    <!--Main css-->
    <link rel="stylesheet" href="styles/reset-pw.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>


<body>

    <div class="card reset-form mx-auto">
        <div class="card-body">
            <h3 class="card-title text-center">
            PASSWORD RESET 
            </h3>
            <p> You will receive a link to create a new password via email</p>
            <div class="card-text">
                <form action="includes/reset-request.inc.php" method="post">
                    <div class="form-group">
                        
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter your e-mail address">
                    </div>

                    <button type="submit" name="reset-request-submit" class="btn btn-dark btn-block">Send password reset link</button>
                </form>

                <?php
					if (isset($_GET["reset"])) {
						if ($_GET["reset"] == "success") {
							echo '<p class="">Check your e-mail!</p>';
						}
					}
				?>
                
            </div>

        </div>

    </div>

    <?php 
            include("includes/footer.php")
    ?>

</body>
    
