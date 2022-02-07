
<?php


function emptyInputSignup($fullName, $userName, $email, $password, $passwordRepeat){
    $result;

    if (empty($fullName) || empty($userName) || empty($email) || empty($password) || empty($passwordRepeat)) {
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

function pwdMatch($password, $passwordRepeat){
    $result;

    if ($password !== $passwordRepeat) {
        $result = true; 
    }
    else{
        $result = false;

    return $result;
    }
}

function pwdStrength($password){
    $result;
    $passwordStrength = $password;

   // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
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
    header("location: ../signup.php?error=stmtfailed");
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

function createUser($conn, $userName, $email, $password, $fullName){
    $sql = "INSERT INTO user_account (userName, email, password, fullName) VALUES (?, ?, ?, ?);";   //first colon to close SQL, second to close PHP 
    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../signup.php?error=stmtfailed");
     exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); //PHP Hashing, Built-in on PHP, constantly updated compared to others
 
    mysqli_stmt_bind_param($stmt, "ssss", $userName, $email, $hashedPwd, $fullName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // $_SESSION['status'] = "You have successfully registered your account!";
    // $_SESSION['status_code'] = "success";

    header("location: ../signup.php?error=none");

   
    exit();
 
 }

 
function emptyInputLogin($userName, $password){
    $result;

    if (empty($userName) || empty($password)) {
        $result = true; //return true if there are empty fields
    }
    else{
        $result = false; //return false if there are NO empty fields
    }

    return $result;
}

function loginUser($conn, $userName, $password){
    $uidExists = uidExists($conn, $userName, $userName);

    if ($uidExists === false) {
        header("location: ../index.php?error=loginError");
        exit();
    }

    $pwdHashed = $uidExists["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../index.php?error=loginError");
        exit();
    }
    else if($checkPwd === true){
        session_start();

        $_SESSION["userID"] = $uidExists["userID"];
        $_SESSION["userName"] = $uidExists["userName"];

        header("location: ../home.php");
        exit();
    }
}
?>

