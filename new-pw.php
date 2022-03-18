<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
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
            <div class="card-text">
                
				<?php
					$selector = $_GET["selector"];
					$validator = $_GET["validator"];
					$error = "Please fill both fields.";
					
					if(empty($selector) || empty($validator)) {
						echo "<script type='text/javascript'>
                
						Swal.fire({	
							text: 'Could not validate your request. Please Try Again.',
							icon: 'error',
							confirmButtonText: 'OK'
						  })
						
						</script>";

					} else {
						if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
							?>
							
							<form action="includes/reset-password.inc.php" method="post">
								<input type="hidden" name="selector" value="<?php echo $selector ?>">
								<input type="hidden" name="validator" value="<?php echo $validator ?>">
								<br><input type="password" name="pwd" class="form-control form-control-sm" placeholder="Enter a new password" required><br>
								<input type="password" name="pwd-repeat" class="form-control form-control-sm" placeholder="Repeat new password" required>
								<button type="submit" name="reset-password-submit" class="btn btn-dark btn-block">Reset Password</button>
							</form>
							
							<?php
						}
					}
				?>
				
            </div>

        </div>

    </div>

	<?php 
        if (isset($_GET["error"])) {
			if ($_GET["error"] == "pwdnotsame") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Password does not match! Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
			else if ($_GET["error"] == "weakpwd") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character (!,@,#,$,%,^)',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
			else if ($_GET["error"] == "none") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'You have successfully registered your account!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
        }
    ?>
	
    
    <?php 
            include("includes/footer.php")
    ?>


</body>