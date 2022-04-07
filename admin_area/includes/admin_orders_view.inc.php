<?php
	include 'db.php';
	
	extract($_POST);
	
	if(isset($_POST['hiddendeldata'])){
		$unique=$_POST['hiddendeldata'];
		$queryorders = "DELETE from tbl_orders WHERE invoice_no='".$unique."'";
		$result = mysqli_query($conn,$queryorders);

        $querycustomers = "DELETE from tbl_orders_customers WHERE invoice_no='".$unique."'";
        $result = mysqli_query($conn,$querycustomers);
		
	}
	
	if(isset($_POST['deletevarsend'])){
		$unique=$_POST['deletevarsend'];
		$sql = "DELETE FROM product_variation WHERE varID='".$unique."'";
		$result = mysqli_query($conn,$sql);
		
	}
	
	
	
	if(isset($_POST['displaySend'])){
		$table = '<table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
							
							<thead><!-- thead begin -->
								<tr><!-- tr begin -->
									<th> Reference#: </th>
									<th> Product: </th>
									<th> Amount: </th>
									<th> Quantity: </th>
                                    <th> Payment Proof: </th>
									<th> Manage: </th>
								</tr><!-- tr finish -->
							</thead><!-- thead finish -->
							
							<tbody><!-- tbody begin -->';
							$i = 0;
							$get_order ="select * from tbl_orders";
							$run_order = mysqli_query($conn, $get_order);
							while ($row_order = mysqli_fetch_assoc($run_order)){
								$customer_id = $row_order['customer_id'];
								$invoice_no = $row_order['invoice_no'];
								$pro_id_order = $row_order['pro_id'];
								$pro_qty_order = $row_order['pro_qty'];
                                $amount_order = $row_order['amount'];
                                $order_date = $row_order['order_date'];
                                $order_status = $row_order['order_status'];
                                $payment_proof = $row_order['payment_proof'];
                                
                                if(is_null($payment_proof)){
                                    $null_payment = "N/A";
                                }
                                
                                $get_products = "select * from products where prodID='$pro_id_order'";
                                $run_products = mysqli_query($conn, $get_products);
                                while ($row_products = mysqli_fetch_assoc($run_products)){
                                    $pro_name = $row_products['prodName'];
                                }

                                $get_customer_details = "select * from tbl_orders_customers where customer_id='$customer_id'";
                                $run_customer_details = mysqli_query($conn, $get_customer_details);
                                while ($row_customer_details = mysqli_fetch_assoc($run_customer_details)){
                                    $customer_name = $row_customer_details['c_full_name'];
                                    $customer_pay_mode = $row_customer_details['pay_mode'];
                                    $customer_address = $row_customer_details['c_address'];
                                    $customer_email = $row_customer_details['c_email'];
                                    $customer_contact = $row_customer_details['c_contact'];
                                    $customer_invoice_no = $row_order['invoice_no'];
                                }

								$i++;
								$table.='<tr>
									<td>'.$invoice_no.'</td>
									<td>'.$pro_name.' </td>
									<td>'.$amount_order.'</td>
									<td>'.$pro_qty_order.'</td>
                                    
									<td> 
                                        <a href="#" class="pop">
                                            <img src="../img/payments/'.$payment_proof.'" width="60" height="60">
                                        </a>
									</td>
		
									<td>
										<input type="hidden" id="pro_title" value="<?=$pro_title?>" />
										<input type="hidden" id="pro_info" value="<?=$pro_info?>" />
										<input type="hidden" id="pro_cat" value="<?=$pro_cat?>" />
										<input type="hidden" id="pro_img1" value="<?=$pro_img1?>" />
										<input type="hidden" id="pro_img2" value="<?=$pro_img2?>" />
										<input type="hidden" id="pro_img3" value="<?=$pro_img3?>" />
										<input type="hidden" id="pro_price" value="<?=$pro_price?>" />
										<input type="hidden" id="pro_quant" value="<?=$pro_quant?>" />
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="GetDetails('.$invoice_no.')">
											More Details
										</button>

										<button class = "btn btn-danger" onclick="GetDelDetails('.$invoice_no.')">Delete</button>
									</td>
									</tr><!-- tr finish -->

									';
									
											
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
		
		$invoice=$_POST['updateid'];
		
		$sql = "SELECT * FROM tbl_orders_customers where invoice_no=$invoice";
  
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
	
	if(isset($_POST['hiddendata'])){

		$uniqueid=$_POST['hiddendata'];
		$update_order_status=$_POST['update_order_status'];

        $sql = "UPDATE tbl_orders_customers SET order_status='$update_order_status' WHERE invoice_no='$uniqueid'";
		// $sql = "UPDATE products SET prodName='".$prodName."', catID='".$catID."', price='".$price."', quantity='".$quantity."' WHERE prodID='".$uniqueid."'";
		$result = mysqli_query($conn, $sql);

        $sql_two = "UPDATE tbl_orders SET order_status='$update_order_status' WHERE invoice_no='$uniqueid'";
        $result = mysqli_query($conn, $sql_two);

	}
	
	if(isset($_POST['hiddenvardata'])){
		$uniqueid=$_POST['hiddenvardata'];
		$prodName=$_POST['update_Name'];
		$price=$_POST['update_price'];
		$quantity=$_POST['update_quantity'];
		
		$sql = "UPDATE product_variation SET prodVariation='".$prodName."', price='".$price."', quantity='".$quantity."' WHERE varID='".$uniqueid."'";
		$result = mysqli_query($conn, $sql);
	}

    if(isset($_POST['delid'])){
		
		$invoice_no=$_POST['delid'];
		
		$sql = "SELECT * FROM tbl_orders_customers WHERE invoice_no = $invoice_no";
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
	
?>
