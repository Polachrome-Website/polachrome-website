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


</body>
    
