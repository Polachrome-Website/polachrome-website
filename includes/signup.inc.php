<head>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<?php

if (isset($_POST["submit"])) {
    
    $fullName = $_POST["fullName"];
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    require_once 'db.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($fullName, $userName, $email, $password, $passwordRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUserName($userName) !== false) {
        header("location: ../signup.php?error=invalidUsername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($password, $passwordRepeat) !== false) {
        
        header("location: ../signup.php?error=passwordmatcherror");
        exit();
    }
    if (uidExists($conn, $userName, $email) !== false) {
        
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    createUser($conn, $userName, $email, $password, $fullName);
}
else{
    header("location: ../signup.php");
    exit();
}