<?php

$userName = $_POST["userName"];
$pWord = $_POST["pWord"];

require_once 'db.php';
require_once 'functions.inc.php';

if (emptyInputLogin($userName, $pWord) !== false) {
    header("location: ../index.php?error=emptyinput");
    exit();
}

loginUser($conn, $userName, $pWord);