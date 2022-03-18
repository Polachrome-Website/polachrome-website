<?php

$userName = $_POST["userName"];
$password = $_POST["password"];

require_once 'db.php';
require_once 'functions.inc.php';

if (emptyInputLogin($userName, $password) !== false) {
    header("location: ../login.php?error=emptyinput");
    exit();
}

loginUser($conn, $userName, $password);