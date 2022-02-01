<?php

if (isset($_POST["submit"])) {
    
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $pWord = $_POST["pWord"];
    $pWordRepeat = $_POST["pWordRepeat"];

    require_once 'db.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($firstName, $lastName, $userName, $email, $pWord, $pWordRepeat) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if (invalidUserName($userName) !== false) {
        header("location: ../register.php?error=invalidUsername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pWord, $pWordRepeat) !== false) {
        header("location: ../register.php?error=passwordmatcherror");
        exit();
    }
    if (uidExists($conn, $userName, $email) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }
    createUser($conn, $userName, $email, $pWord, $lastName, $firstName);
}
else{
    header("location: ../register.php");
    exit();
}