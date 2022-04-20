
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

function pwdStrengthReset($password,$passwordRepeat){
    $result;
    $passwordStrengthReset = $password;

   // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password,$passwordRepeat);
    $lowercase = preg_match('@[a-z]@', $password,$passwordRepeat);
    $number    = preg_match('@[0-9]@', $password,$passwordRepeat);
    $specialChars = preg_match('@[^\w]@', $password,$passwordRepeat);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password,$passwordRepeat) < 8) {
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



function adminExists($conn, $userName, $email){
    $sql = "SELECT * FROM admin WHERE admin_username = ? OR admin_email = ?;";   //first colon to close SQL, second to close PHP 
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
        header("location: ../login.php?error=loginError");
        exit();
    }

    $pwdHashed = $uidExists["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=loginError");
        exit();
    }
    else if($checkPwd === true){
        session_start();

        //1. ung uidExists function siya na nagsselect ng data from user_account table
        //2. ngayon tatawagin natin ung superglobal variable na session para magset ng value sa kanya
        //3. sstore natin sa session ung value na makukuha natin sa uidExists na table
        // note pagka login matic nakaset tong mga values nato and pwede mo siya tawagin anywhere sa website provided na sstart mo ung session
        $_SESSION["userID"] = $uidExists["userID"]; 
        $_SESSION["userName"] = $uidExists["userName"];
        $_SESSION["fullName"] = $uidExists["fullName"];
        $_SESSION["email"] = $uidExists["email"];
    


        header("location: ../index.php");
        exit();
    }
}

function adminUser($conn, $userName, $password){
    $adminExists = adminExists($conn, $userName, $userName);

    if ($adminExists === false) {

        header("location: ../login.php?error=loginError");
        exit();
    }

        $adminPwdHashed = $adminExists["admin_pass"];
        $checkAdminPwd = password_verify($password, $adminPwdHashed);

        if ($checkAdminPwd === false) {
            header("location: ../login.php?error=loginError");
            exit();
        }else if($checkAdminPwd === true){
            session_start();
            
            $_SESSION['admin_email'] = $adminExists['admin_email']; 
            
            header("location: ../admin_area/index.php?dashboard");
            exit();
            
    }

}

extract($_POST);

if(isset($_POST['passUID'])){
    include 'db.php';
    $uniqueid=$_POST['passUID'];
    $oldpw=$_POST['oldpw'];
    $newpw=$_POST['newpw'];
    $confpw=$_POST['confpw'];
    
    $sql = "SELECT password from user_account WHERE userID='".$uniqueid."'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);
    $resultstring = $result['password'];
    
    if(password_verify($oldpw, $resultstring)) {
        if(pwdStrength($newpw) !== false){
            $divcontent = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character (!,@,#,$,%,^)";
        } elseif ($newpw == $confpw) {
            $newPwdHash = password_hash($newpw, PASSWORD_DEFAULT);
            $sql = "UPDATE user_account SET password='".$newPwdHash."' WHERE userID='".$uniqueid."'";
            $result = mysqli_query($conn,$sql);
            $divcontent = "Password updated!";
        } elseif ($newpw != $confpw) {
            $divcontent = "New Password and Confirmation do not match.";
        }
    } else {
        $divcontent = "Old Password mismatch.";
    }
    echo $divcontent;
}

if(isset($_POST['userUID'])){
    include "db.php";
    $uniqueid=$_POST['userUID'];
    $newfullname=$_POST['newfullname'];
    $newusername=$_POST['newusername'];
    $newemail=$_POST['newemail'];
    $sql = "SELECT userName from user_account WHERE userID='".$uniqueid."'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);
    $olduserName = $result['userName'];
    $updatepass = 0;
    if(empty($newfullname)){
        $divcontent = "Please fill name field.<br>";
    } else {
        $sql = "UPDATE user_account SET fullName='".$newfullname."' WHERE userID='".$uniqueid."'";
        $result = mysqli_query($conn,$sql);
        $divcontent = "Name updated!<br>";
    }

    if (uidExists($conn, $newusername, $newusername) == false) {
        if (empty($newusername)){
            $divcontent .= "Please fill username field.<br>";
        } elseif (invalidUserName($newusername) !== false) {
            $divcontent .= "Username is invalid.<br>";
        } else {
            $sql = "UPDATE user_account SET userName='".$newusername."' WHERE userID='".$uniqueid."'";
            $result = mysqli_query($conn,$sql);
            $divcontent .= "Username updated!<br>";
            $olduserName = $newusername;
        }
        
    } else {
        $divcontent .= "Username taken.<br>";
    }
    
    if (uidExists($conn, $newemail, $newemail) == false) {
        if (empty($newemail)){
            $divcontent .= "Please fill email field.<br>";
        } elseif (invalidEmail($newemail) !== false) {
            $divcontent .= "Email is invalid.<br>";
        } else {
            $sql = "UPDATE user_account SET email='".$newemail."' WHERE userID='".$uniqueid."'";
            $result = mysqli_query($conn,$sql);
            $divcontent .= "Email updated!<br>";
            
        }
    } else {
        $divcontent .= "Email taken.<br>";
    }
    
    $uidExists = uidExists($conn, $olduserName, $olduserName);
    unset($_SESSION['fullName']);
    unset($_SESSION['userName']);
    unset($_SESSION['email']);
    session_start();
    $_SESSION["userName"] = $uidExists["userName"];
    $_SESSION["fullName"] = $uidExists["fullName"];
    $_SESSION["email"] = $uidExists["email"];
    
    
    echo $divcontent;
}

if(isset($_POST['displaySend'])){
		session_start();
		$card = '<div class="card">
                        <div class="card-body">
                            <h5 class="d-flex align-items-center mb-3">My Profile</h5>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input id="newfullname" type="text" class="form-control" value="'.$_SESSION["fullName"].'">
                                </div>
                            </div>
							<div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input id="newusername" type="text" class="form-control" value="'.$_SESSION["userName"].'">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input id="newemail" type="email" class="form-control" value="'.$_SESSION["email"].'">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 ">
                                    <input type="button" class="btn-update" onclick="updateUser('.$_SESSION["userID"].')" value="Update">
                                </div>
                            </div>
                           
                        </div>
                    </div>';
					
		echo $card;
	}
?>

