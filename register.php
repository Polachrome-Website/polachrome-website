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
        <form action="includes/signup.inc.php"  method="post">

            <input type="text" name="firstName" placeholder="First Name">
            <input type="text" name="lastName" placeholder="Last Name">
            <input type="text" name="userName" placeholder="User Name">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pWord" placeholder="Password">
            <input type="password" name="pWordRepeat" placeholder="Repeat Password">

            <button type="submit" name="submit">Submit</button>

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