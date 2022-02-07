<?php 
        include_once 'includes/header.php'
?>

    <head>
    <!--Main css-->
        <link rel="stylesheet" href="styles/signup.css">

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>
    </head>

 <!--Body-->
 <div class="container">
            <div class="d-flex justify-content-center">
                <form action="includes/signup.inc.php" method="post" class="signup textcenter">
                    <header>Create your account</header>
                    <div class="form-group">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <input class="myInput" type="text" name="fullName" placeholder="Full name" id="fullname" required>
                    </div>

                    <div class="form-group">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <input class="myInput" type="text" name="userName" placeholder="Username" id="username" required>
                    </div>

                    <div class="form-group">
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        <input class="myInput" type="text" name="email"  placeholder="E-mail" id="email" required>
                    </div>

                    <div class="form-group">
                        <span class="icon"><i class="fas fa-lock"></i></span>
                        <input class="myInput" type="password" name="password" placeholder="Password" id="password" required>
                    </div>

                    <div class="form-group">
                        <span class="icon"><i class="fas fa-lock"></i></span>
                        <input class="myInput" type="password" name="passwordRepeat" placeholder="Confirm Password" id="confpassword" required>
                    </div>

                    <input type="submit" name="submit" class="btn" value="Sign up">
                </form>
            </div>
        </div>

        <?php 
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields</p>";
            }
            else if ($_GET["error"] == "invalidUsername") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Error. Please choose a proper username.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
            else if ($_GET["error"] == "invalidemail") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Invalid Email. Please Try Again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
            else if ($_GET["error"] == "passwordmatcherror") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Password does not match! Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
            else if ($_GET["error"] == "weakpassword") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Something went wrong, please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
            else if ($_GET["error"] == "usernametaken") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    html: 'Username/Email already taken. <br>Kindly choose a new one.',
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
                  }).then(function() {
                    window.location = '../index.php';
                
                </script>";
            }
            
        }
    ?>

        <?php 
            include("includes/footer.php")
        ?>

           <!--Bootsrap JS cdn-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="script.js"></script>
      
    </body>