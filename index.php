    <?php 
        include_once 'includes/header.php'
    ?>  
        <head>
        <!--Main css-->
        <link rel="stylesheet" href="styles/login.css">

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>
        </head>

        <!--Body-->
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <!--Left side, Sign in-->
                        <div class="left">
                            <form action="includes/login.inc.php" method="post" class="signin text-center">
                                <header>Sign in</header>
                                <div class="form-group">
                                    <span class="icon"><i class="fas fa-user"></i></span>
                                    <input class="myInput" type="text" name="userName" placeholder="Username" id="username" required>
                                </div>

                                <div class="form-group">
                                    <span class="icon"><i class="fas fa-lock"></i></span>
                                    <input class="myInput" type="password" name="password" placeholder="Password" id="password" required>
                                    <p><a href="reset-pw.php">Forgot password?</a></p>
                                </div>

                                <input type="submit" name="submit" class="btn" value="Sign in">
                                <p class="signup">Dont have an account yet? <a href="signup.php">Sign up.</a></p>
                            </form>
                        </div>
                    </div>

                    <!--Right side, Continue as Guest-->
                    <div class="col-md-6">
                        <div class="right">
                            <div class="box">
                                <p>Shop PolaChrome without signing in:</p>
                                <a href="home.html"><button class="btn">Continue as Guest</button></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <?php 
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields</p>";
            }
            else if ($_GET["error"] == "loginError") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    title: 'Login Error!',
                    text: 'Incorrect Login Credentials. Please Try Again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  })
                
                </script>";
            }
        }
    ?>
    
        <!-- Footer -->
        <?php 
            include("includes/footer.php")
        ?>

        <!--Bootsrap JS cdn-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <script src="script.js"></script>
      
    </body>

 
</html>