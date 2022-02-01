<?php

function emptyInputSignup($firstName, $lastName, $userName, $email, $pWord, $pWordRepeat){
    $result;

    if (empty($firstName) || empty($lastName) || empty($userName) || empty($email) || empty($pWord) || empty($pWordRepeat)) {
        $result = true; //return true if there are empty fields
    }
    else{
        $result = false; //return false if there are NO empty fields
    }

    return $result;
}

function invalidUserName($userName){
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        $result = true; //return true if username is invalid
    }
    else{
        $result = false; //return false if  if username is valid
    }

    return $result;
}

function invalidEmail($email){
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true; 
    }
    else{
        $result = false;

    return $result;
    }
}

function pwdMatch($pWord, $pWordRepeat){
    $result;

    if ($pWord !== $pWordRepeat) {
        $result = true; 
    }
    else{
        $result = false;

    return $result;
    }
}

function uidExists($conn, $userName, $email){
   $sql = "SELECT * FROM user_account WHERE userName = ? OR email = ?;";   //first colon to close SQL, second to close PHP 
   $stmt = mysqli_stmt_init($conn);

   if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../register.php?error=stmtfailed");
    exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if ($row = mysqli_fetch_assoc($resultData)) {
       return $row;
   }
   else{
    $result = false;
    return $result;
   }

   mysqli_stmt_close($stmt);

}

function createUser($conn, $userName, $email, $pWord, $lastName, $firstName){
    $sql = "INSERT INTO user_account (userName, email, pWord, lastName, firstName) VALUES (?, ?, ?, ?, ?);";   //first colon to close SQL, second to close PHP 
    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../register.php?error=stmtfailed");
     exit();
    }

    $hashedPwd = password_hash($pWord, PASSWORD_DEFAULT); //PHP Hashing, Built-in on PHP, constantly updated compared to others
 
    mysqli_stmt_bind_param($stmt, "sssss", $userName, $email, $hashedPwd, $lastName, $firstName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../register.php?error=none");
    exit();
 
 }

 
function emptyInputLogin($userName, $pWord){
    $result;

    if (empty($userName) || empty($pWord)) {
        $result = true; //return true if there are empty fields
    }
    else{
        $result = false; //return false if there are NO empty fields
    }

    return $result;
}

function loginUser($conn, $userName, $pWord){
    $uidExists = uidExists($conn, $userName, $userName);

    if ($uidExists === false) {
        header("location: ../index.php?error=loginError");
        exit();
    }

    $pwdHashed = $uidExists["pWord"];
    $checkPwd = password_verify($pWord, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../index.php?error=loginError");
        exit();
    }
    else if($checkPwd === true){
        session_start();

        $_SESSION["userID"] = $uidExists["userID"];
        $_SESSION["userName"] = $uidExists["userName"];

        header("location: ../login.php");
        exit();
    }
}