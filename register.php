<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register on PolaChrome</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Bootsrap 4-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--Font Awesome icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

        <!--Polaroid Font-->
        <link href="//db.onlinewebfonts.com/c/1e5b7f8cdbcb1e579a6e53aaadaf0b67?family=FF+Real+Head" rel="stylesheet" type="text/css"/>

        <!--Main css-->
        <link rel="stylesheet" href="login.css">
</head>
<body>
    <section>
        <h2>Sign Up</h2>
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
        <?php 
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields</p>";
            }
            else if ($_GET["error"] == "invalidUsername") {
                echo "<p>Choose proper username</p>";
            }
            else if ($_GET["error"] == "invalidemail") {
                echo "<p>Choose proper email</p>";
            }
            else if ($_GET["error"] == "passwordmatcherror") {
                echo "<p>Password does not match!</p>";
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something went wrong, try again!</p>";
            }
            else if ($_GET["error"] == "usernametaken") {
                echo "<p>Username already taken!</p>";
            }
            else if ($_GET["error"] == "none") {
                echo "<p>You have signed up!</p>";
            }
            
        }
    ?>
    </section>

   
</body>
</html>