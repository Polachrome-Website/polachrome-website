<?php
	include 'db.php';
	
	extract($_POST);
	
	if(isset($_POST['hiddendeldata'])){
		$unique=$_POST['hiddendeldata'];
		$sql = "DELETE from products WHERE prodID='".$unique."'";
		$result = mysqli_query($conn,$sql);
		
	}
	
	if(isset($_POST['hiddendelvardata'])){
		$unique=$_POST['hiddendelvardata'];
		$sql = "DELETE FROM product_variation WHERE varID='".$unique."'";
		$result = mysqli_query($conn,$sql);
		
	}
	
	
	
	if(isset($_POST['displaySend'])){
		$table = '<table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
							
							<thead><!-- thead begin -->
								<tr><!-- tr begin -->
									<th> Product ID: </th>
									<th> Product Name: </th>
									<th> Product Info: </th>
									<th> Product Category: </th>
									<th> Product Images: </th>
									<th> Product Price: </th>
									<th> Product Quantity: </th>
									<th> Product Manage: </th>
								</tr><!-- tr finish -->
							</thead><!-- thead finish -->
							
							<tbody><!-- tbody begin -->';
							$i = 0;
							$get_pro ="select * from products";
							$run_pro = mysqli_query($conn, $get_pro);
							while ($row_pro = mysqli_fetch_assoc($run_pro)){
								$pro_id = $row_pro['prodID'];
								$pro_title = $row_pro['prodName'];
								$pro_info = $row_pro['prodInfo'];
								$pro_cat = $row_pro['catID'];
								$pro_img1 = $row_pro['prodImg1'];
								$pro_img2 = $row_pro['prodImg2'];
								$pro_img3 = $row_pro['prodImg3'];
								$pro_price = $row_pro['price'];
								$pro_quant = $row_pro['quantity'];
								$i++;
								$table.='<tr>
									<td>'.$pro_id.'</td>
									<td>'.$pro_title.' 
										
									</td>
									<td>'.$pro_info.'</td>
									<td>'.$pro_cat.'</td>
									<td> 
										<img src="product_images/'.$pro_img1.'" width="60" height="60">
										<img src="product_images/'.$pro_img2.'" width="60" height="60">
										<img src="product_images/'.$pro_img3.'" width="60" height="60">
									</td>
									<td> ₱'. $pro_price.' </td>
									<td> '. $pro_quant.' </td>
									<td>
										<input type="hidden" id="pro_title" value="<?=$pro_title?>" />
										<input type="hidden" id="pro_info" value="<?=$pro_info?>" />
										<input type="hidden" id="pro_cat" value="<?=$pro_cat?>" />
										<input type="hidden" id="pro_img1" value="<?=$pro_img1?>" />
										<input type="hidden" id="pro_img2" value="<?=$pro_img2?>" />
										<input type="hidden" id="pro_img3" value="<?=$pro_img3?>" />
										<input type="hidden" id="pro_price" value="<?=$pro_price?>" />
										<input type="hidden" id="pro_quant" value="<?=$pro_quant?>" />
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="GetDetails('.$pro_id.')">
											Update
										</button>
										<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="GetDelDetails('.$pro_id.')">
											Delete
										</button>
									</td>
									</tr><!-- tr finish -->
									';
									
									$get_var ="select * from product_variation WHERE prodID = '" . $pro_id . "'";
									$run_var = mysqli_query($conn, $get_var);
									while($row_pro=mysqli_fetch_array($run_var)){
											$var_id = $row_pro['varID'];
											$pro_var = $row_pro['prodVariation'];
											$pro_img1 = $row_pro['prodImg1'];
											$pro_img2 = $row_pro['prodImg2'];
											$pro_img3 = $row_pro['prodImg3'];
											$pro_price = $row_pro['price'];
											$pro_quant = $row_pro['quantity'];
											
											$table.='<tr><!-- tr begin -->
												<td>  </td>
												<td>'.$pro_title.' - '. $pro_var.'  </td>
												<td colspan = 2> 
													<input type="hidden" id="var_id" value="<?=$var_id?>" />
													<input type="hidden" id="pro_var" value="<?=$pro_var?>" />
													<input type="hidden" id="pro_img1" value="<?=$pro_img1?>" />
													<input type="hidden" id="pro_img2" value="<?=$pro_img2?>" />
													<input type="hidden" id="pro_img3" value="<?=$pro_img3?>" />
													<input type="hidden" id="pro_price" value="<?=$pro_price?>" />
													<input type="hidden" id="pro_quant" value="<?=$pro_quant?>" />
												</td>
												<td> 
													<img src="product_images/'.$pro_img1.'" width="60" height="60">
													<img src="product_images/'.$pro_img2.'" width="60" height="60">
													<img src="product_images/'.$pro_img3.'" width="60" height="60">
												</td>
												<td> ₱'.$pro_price.' </td>
												<td>'.$pro_quant.' </td>
												<td> 
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateVarModal" onclick="GetVarDetails('.$var_id.')">
														Update
													</button>
													<!-- <button class = "btn btn-danger" onclick="DeleteVariation('.$pro_id.')">Delete</button> -->
													<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteVarModal" onclick="GetDelVarDetails('.$var_id.')">
														Delete
													</button>
													
												</td>
											</tr><!-- tr finish -->';
											
									}
							}
							
		echo $table;
	}
	
	if(isset($_POST['displayCatSend'])){
		$list = '<select name="product_category" class="form-control" id="update_catID"><!-- form-control Begin -->
			<option> Select a Category </option>';
			$get_cat = "select * from categories";
			$run_cat = mysqli_query($conn,$get_cat);
			
			while ($row_cat=mysqli_fetch_array($run_cat)){
				
				$catID = $row_cat['catID'];
				$catTitle = $row_cat['catTitle'];
				$list .= '<option value='.$catID.'>'. $catTitle .'</option>';
				
			}
		$list .= '</select><!-- form-control Finish -->';
		echo $list;
	}
	
	if(isset($_POST['updateid'])){
		
		$prodID=$_POST['updateid'];
		
		$sql = "SELECT * FROM products WHERE prodID = $prodID";
		$result = mysqli_query($conn, $sql);
		$response = array();
		while($row = mysqli_fetch_assoc($result)){
			$response = $row;
		}
		echo json_encode($response);
	}else{
		$response['status']=200;
		$response['message']="Invalid or data not found";
	}


	if(isset($_POST['updatevarid'])){
		
		$varID=$_POST['updatevarid'];
		
		$sql = "SELECT * FROM product_variation WHERE varID = $varID";
		$result = mysqli_query($conn, $sql);
		$response = array();
		while($row = mysqli_fetch_assoc($result)){
			$response = $row;
		}
		echo json_encode($response);
	}else{
		$response['status']=200;
		$response['message']="Invalid or data not found";
	}
	
	if(isset($_POST['delid'])){
		
		$prodID=$_POST['delid'];
		
		$sql = "SELECT * FROM products WHERE prodID = $prodID";
		$result = mysqli_query($conn, $sql);
		$response = array();
		while($row = mysqli_fetch_assoc($result)){
			$response = $row;
		}
		echo json_encode($response);
	}else{
		$response['status']=200;
		$response['message']="Invalid or data not found";
	}
	
	if(isset($_POST['delvarid'])){
		
		$varID=$_POST['delvarid'];
		
		$sql = "SELECT * FROM product_variation WHERE varID = $varID";
		$result = mysqli_query($conn, $sql);
		$response = array();
		while($row = mysqli_fetch_assoc($result)){
			$response = $row;
		}
		echo json_encode($response);
	}else{
		$response['status']=200;
		$response['message']="Invalid or data not found";
	}
	
	if(isset($_POST['hiddendata'])){
		$uniqueid=$_POST['hiddendata'];
		$prodName=$_POST['update_prodName'];
		$product_info = trim($_POST['update_prodInfo']);
		$catID=$_POST['update_catID'];
		$price=$_POST['update_price'];
		$quantity=$_POST['update_quantity'];
		
		$get_img ="select * from products WHERE prodID = '" . $uniqueid . "'";
		$run_img = mysqli_query($conn, $get_img);
		$row_pro=mysqli_fetch_array($run_img);
		$old_img1 = $row_pro['prodImg1'];
		$old_img2 = $row_pro['prodImg2'];
		$old_img3 = $row_pro['prodImg3'];
		
		$product_img1 = $_FILES['update_prodImg1']['name'];
        $product_img2 = $_FILES['update_prodImg2']['name'];
        $product_img3 = $_FILES['update_prodImg3']['name'];
		
		if(empty($product_img1)){
			$product_img1 = $old_img1;
		}else {
			$temp_name1 = $_FILES['update_prodImg1']['tmp_name'];
			move_uploaded_file($temp_name1,"product_images/$product_img1");
		}
		
		if(empty($product_img2)){
			$product_img2 = $old_img2;
		}else {
			$temp_name1 = $_FILES['update_prodImg2']['tmp_name'];
			move_uploaded_file($temp_name1,"product_images/$product_img2");
		}
		
		if(empty($product_img3)){
			$product_img3 = $old_img3;
		}else {
			$temp_name1 = $_FILES['update_prodImg3']['tmp_name'];
			move_uploaded_file($temp_name1,"product_images/$product_img3");
		}
		
		
		
		/* $product_img1 = $_FILES['update_prodImg1']['name'];
        $product_img2 = $_FILES['update_prodImg2']['name'];
        $product_img3 = $_FILES['update_prodImg3']['name'];
        
        $temp_name1 = $_FILES['update_prodImg1']['tmp_name'];
        $temp_name2 = $_FILES['update_prodImg2']['tmp_name'];
        $temp_name3 = $_FILES['update_prodImg3']['tmp_name'];
        
        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");
		 */
		$sql = "UPDATE products SET catID=?, prodName=?, prodInfo=?, prodImg1=?, prodImg2=?, prodImg3=?, quantity=?, price=?  WHERE prodID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        }else{
        mysqli_stmt_bind_param($stmt, "isssssidi", $catID, $prodName, $product_info, $product_img1, $product_img2, $product_img3,  $quantity, $price, $uniqueid);
        mysqli_stmt_execute($stmt);
        }
		
		
		/* $sql = "UPDATE products SET prodName='".$prodName."', prodInfo='".$product_info."', catID='".$catID."', price='".$price."', quantity='".$quantity."' WHERE prodID='".$uniqueid."'";
		$result = mysqli_query($conn, $sql); */
	}
	
	if(isset($_POST['hiddenvardata'])){
		$uniqueid=$_POST['hiddenvardata'];
		$prodName=$_POST['update_Name'];
		$price=$_POST['update_price'];
		$quantity=$_POST['update_quantity'];
		
		$sql = "UPDATE product_variation SET prodVariation='".$prodName."', price='".$price."', quantity='".$quantity."' WHERE varID='".$uniqueid."'";
		$result = mysqli_query($conn, $sql);
	}

	if(isset($_POST['displayImgSend'])){
		$pro_id = $_POST['hiddenimgdata'];
		$get_img ="select * from products WHERE prodID = '" . $pro_id . "'";
		$run_img = mysqli_query($conn, $get_img);
		$row_pro=mysqli_fetch_array($run_img);
		$pro_img1 = $row_pro['prodImg1'];
		$pro_img2 = $row_pro['prodImg2'];
		$pro_img3 = $row_pro['prodImg3'];
		$images = '<center><img src="product_images/'.$pro_img1.'" width="60" height="60">
			<img src="product_images/'.$pro_img2.'" width="60" height="60">
			<img src="product_images/'.$pro_img3.'" width="60" height="60"></center>';
			
		echo $images;
	}
	
	if(isset($_POST['displayVarImgSend'])){
		$pro_id = $_POST['hiddenimgdata'];
		$get_img ="select * from product_variation WHERE varID = '" . $pro_id . "'";
		$run_img = mysqli_query($conn, $get_img);
		$row_pro=mysqli_fetch_array($run_img);
		$pro_img1 = $row_pro['prodImg1'];
		$pro_img2 = $row_pro['prodImg2'];
		$pro_img3 = $row_pro['prodImg3'];
		$images = '<center><img src="product_images/'.$pro_img1.'" width="60" height="60">
			<img src="product_images/'.$pro_img2.'" width="60" height="60">
			<img src="product_images/'.$pro_img3.'" width="60" height="60"></center>';
			
		echo $images;
	}
	
?>
