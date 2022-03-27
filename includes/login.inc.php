<?php

$userName = $_POST["userName"];
$password = $_POST["password"];

require_once 'db.php';
require_once 'functions.inc.php';

if (emptyInputLogin($userName, $password) !== false) {
    header("location: ../login.php?error=emptyinput");
    exit();
}

if($userName === "polachrome_admin" || $userName === "polachrome@gmail.com"){
    adminUser($conn, $userName, $password);
}else{
    loginUser($conn, $userName, $password);
}


