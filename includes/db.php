<?php
    //local connection of Database

    // $conn = mysqli_connect("localhost","root","123456","polachrome_db");
    
    // if(!$conn){
    //     die("Connection failed: " . mysqli_connect_error());
    // }

    // RemoteMySQL Connection

    $server = "remotemysql.com";
    $username = "kgNGVMmxvF";
    $password = "WAQHRpOvnw";
    $db = "kgNGVMmxvF";

    $conn = mysqli_connect($server,$username,$password,$db);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
