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
            <div class="card-text">
                
				<?php
					$selector = $_GET["selector"];
					$validator = $_GET["validator"];
					$error = "Please fill both fields.";
					
					if(empty($selector) || empty($validator)) {
						echo "Could not validate your request.";
					} else {
						if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
							?>
							
							<form action="includes/reset-password.inc.php" method="post">
								<input type="hidden" name="selector" value="<?php echo $selector ?>">
								<input type="hidden" name="validator" value="<?php echo $validator ?>">
								<br><input type="password" name="pwd" class="form-control form-control-sm" placeholder="Enter a new password"><br>
								<input type="password" name="pwd-repeat" class="form-control form-control-sm" placeholder="Repeat new password">
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
            include("includes/footer.php")
    ?>
    
    <?php
		if (isset($_GET["error"])) {
			if ($_GET["error"] == "empty") {
				echo "<script type='text/javascript'>
				
				Swal.fire({
					text: 'Please fill both text fields.',
					icon: 'error',
					confirmButtonText: 'OK'
				})
				</script>";
                
			} elseif ($_GET["error"] == "pwdnotsame") { 
				echo "<script type='text/javascript'>
				
				Swal.fire({
					text: 'Passwords do not match.',
					icon: 'error',
					confirmButtonText: 'OK'
				})
				</script>";

			}  else if ($_GET["error"] == "weakpassword") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
		}
	?>


</body>