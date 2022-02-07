    <?php 
        include_once 'includes/header.php'
    ?>

        <div class="container">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <!--Left side, Sign in-->
                        <div class="left">
                            <form action="includes/login.inc.php" method="post" class="signin textcenter">
                                <header>PolaChrome Sign in</header>
                                <div class="form-group">
                                    <span class="icon"><i class="fas fa-user"></i></span>
                                    <input class="myInput" type="text" name="userName" placeholder="Username/Email" id="username" required>
                                </div>

                                <div class="form-group">
                                    <span class="icon"><i class="fas fa-lock"></i></span>
                                    <input class="myInput" type="password" name="pWord" placeholder="Password" id="password" required>
                                    <p>Forgot password?</p>
                                </div>

                                <input type="submit" class="btn" value="Sign in">
                                <p class="signup">Dont have an account yet? <a href="#">Sign up.</a></p> <!--insert sign up.html-->

                            </form>
                        </div>
                    </div>

                    <!--Right side, Continue as Guest-->
                    <div class="md-col-6">
                        <div class="right">
                            <div class="box">
                                <p>Shop PolaChrome without signing in:</p>
                                <input type="button" class="btn" value="Continue as Guest"/>
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
                echo "<p>Incorrect Login Credentials!</p>";
            }
        }
    ?>
        
        <a href="register.php">TEST FOR SIGNUP Backend</a>
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