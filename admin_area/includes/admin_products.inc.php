<?php
	include 'db.php';
	
	extract($_POST);
	
	if isset(isset($_POST['deletesend']{
		$unique=$_POST['deletesend'];
		$sql = "DELETE from products WHERE prodID='".$unique."'";
		$result = mysqli_query($conn,$sql);
		
	}
	
	if isset(isset($_POST['deletevarsend']{
		$unique=$_POST['deletevarsend'];
		$sql = "DELETE FROM product_variation WHERE varID='".$unique."'";
		$result = mysqli_query($conn,$sql);
		
	}
?>