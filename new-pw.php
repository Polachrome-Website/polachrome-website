<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
	include_once 'includes/header.php'
?>
    <head>
	<link rel="stylesheet" href="styles/signup.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"> </script>
	<script src="sweetalert2.all.min.js"></script>
        <title>Reset Password</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="reset-pw.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!--Bootstrap Cdn-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!--Font Awesome icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

   <!--Polaroid Font 
   <link href="//db.onlinewebfonts.com/c/1e5b7f8cdbcb1e579a6e53aaadaf0b67?family=FF+Real+Head" rel="stylesheet" type="text/css"/>--> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

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
			} 
		}
	?>
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
	

</body>
    
