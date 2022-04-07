<?php

if (isset($_POST["address-edit"])){
	$addressid = $_POST['address'];
	include('db.php');
	header("LOCATION: ../user-profile.php?addressid=" . $addressid);
	// echo "<script>window.open('../user-profile.php?addressid=$addressid','_self')</script>";
}


if (isset($_POST["address-select"])){
	$addressid = $_POST['address'];
	include('db.php');
	header("LOCATION: ../user-profile.php?addressid=" . $addressid . "addresssuccess");
	// echo "<script>window.open('../user-profile.php?addressid=$addressid','_self')</script>";
}

if (isset($_POST["address-save"])){
	$addressid = $_POST["addressid"];
	$contactNum = $_POST["contactNum"];
    $bldg = $_POST["bldg"];
    $strt = $_POST["strt"];
    $brgy = $_POST["brgy"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $zip = $_POST["zip"];

	// console.log($addressid, $contactNum, $bldg, $strt, $brgy ,  $city , $region , $zip);
	
	require_once 'db.php';

	// $sql = "UPDATE user_account_address SET city='" . $city . "' WHERE addressID= '" . $addressid . "';";
	$sql = "UPDATE user_account_address SET contactNum='".$contactNum."', bldg='".$bldg."', strt='".$strt."', brgy='".$brgy."', city='".$city."', region='".$region."', zip='".$zip."'  WHERE addressID='".$addressid."'";
	if (mysqli_query($conn, $sql)) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}
	header("LOCATION: ../user-profile.php?addressupdate=success");
	exit();
}

if (isset($_POST["address-delete"])){
	$address = $_POST["address"];
	require_once 'db.php';
	$sql = "DELETE FROM user_account_address WHERE addressID='".$address."'";

	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
	header("LOCATION: ../user-profile.php?addressdelete=success");
	exit();
}

if(isset($_POST["addUserAddress"]) && isset($_POST["addBldg"]) && isset($_POST["addStrt"]) && isset($_POST["addBrgy"]) && 
isset($_POST["addCity"]) && isset($_POST["addRegion"]) && isset($_POST["addContact"]) && isset($_POST["addZip"]) ){
	
	$sql = "INSERT INTO user_account_address (userID, bldg, strt, brgy, city, region, zip, contactNum) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";   //first colon to close SQL, second to close PHP 
    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../user-profile.php?erroraddress=stmtfailed");
     exit();
    }else{
		mysqli_stmt_bind_param($stmt, "ssssssss", $addUserAddress, $addBldg, $addStrt, $addBrgy, $addCity, $addRegion, $addZip, $addContact);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ../user-profile.php?erroraddress=none");
		exit();
	}


}

if (isset($_POST["address-submit"])) {
    
	$userID = $_POST["userID"];
	$contactNum = $_POST["contactNum"];
    $bldg = $_POST["bldg"];
    $strt = $_POST["strt"];
    $brgy = $_POST["brgy"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $zip = $_POST["zip"];

    require_once 'db.php';
	
	$sql = "INSERT INTO user_account_address (userID, bldg, strt, brgy, city, region, zip, contactNum) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";   //first colon to close SQL, second to close PHP 
    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../user-profile.php?erroraddress=stmtfailed");
     exit();
    }else{
		mysqli_stmt_bind_param($stmt, "ssssssss", $userID, $bldg, $strt, $brgy, $city, $region, $zip, $contactNum);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ../user-profile.php?erroraddress=none");
		exit();
	}

}

if (isset($_POST["address-submit-add"])) {
    
	$userID = $_POST["userID"];
	$contactNum = $_POST["acontactNum"];
    $bldg = $_POST["abldg"];
    $strt = $_POST["astrt"];
    $brgy = $_POST["abrgy"];
    $city = $_POST["acity"];
    $region = $_POST["aregion"];
    $zip = $_POST["azip"];

    require_once 'db.php';
	
	$sql = "INSERT INTO user_account_address (userID, bldg, strt, brgy, city, region, zip, contactNum) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";   //first colon to close SQL, second to close PHP 
    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../user-profile.php?erroraddress=stmtfailed");
     exit();
    }else{
		mysqli_stmt_bind_param($stmt, "ssssssss", $userID, $bldg, $strt, $brgy, $city, $region, $zip, $contactNum);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ../user-profile.php?addaddress=success");
		exit();
	}

}

