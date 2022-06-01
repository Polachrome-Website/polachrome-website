<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <title>Reset Password</title>
    <!--Bootsrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--Font Awesome icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

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
                        
                        <input type="email" name="email" class="myInput" placeholder="Enter your e-mail address" required>
                    </div>

                    <button type="submit" name="reset-request-submit" class="btn btn-reset btn-dark">Send password reset link</button>
                </form>
                    <a href="login.php"><button type="submit" class="btn-cancel">Cancel</button></a>

                <?php
					if (isset($_GET["reset"])) {
						if ($_GET["reset"] == "success") {
                            echo "<script type='text/javascript'>
                
                            Swal.fire({
                                text: 'Kindly check your inbox or spam folder for the reset link.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                              })
                            
                            </script>";
						}
					}

                    if (isset($_GET["reset"])) {
						if ($_GET["reset"] == "notregistered") {
                            echo "<script type='text/javascript'>
                
                                Swal.fire({
                                    title: 'Error',
                                    text: 'This email is not yet registered. Please try again.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                })
                                
                                </script>";
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
</html>
