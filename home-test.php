<?php
    session_start();  //start mo ung session sa page, kapag may naglogin meron info na masstore sa session...
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in on PolaChrome</title>
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

    <?php
        if(isset($_SESSION["userID"])){ //ung if statement na to, check niya kung nag eexist ung key na yon
            //sample ng pagtawag 

            echo "<p>LOGIN SUCCESS! Welcome, " . $_SESSION["fullName"] . "</p>"; //dahil nageexist, pprint niya ung value

            echo '<input type="text" value="'.$_SESSION['email'].'"></input>';
        }

        
    ?>

</body>
</html>