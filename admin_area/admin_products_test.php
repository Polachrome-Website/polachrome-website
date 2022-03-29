<!DOCTYPE html>
<html>
<head>
	<title>View Products</title>
	<meta name="viewport" conntent="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="admin-dashboard.css">
	<!--Bootstrap Cdn-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	<!--Font Awesome iconns-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
	<link href='https://unpkg.com/boxiconns@2.0.7/css/boxiconns.min.css' rel='stylesheet'>

<!--Polaroid Font 
<link href="//db.onlinewebfonts.com/c/1e5b7f8cdbcb1e579a6e53aaadaf0b67?family=FF+Real+Head" rel="stylesheet" type="text/css"/>--> 
</head>

<body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	</div>
	</div>
	
	<table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
							
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
		
		<tbody><!-- tbody begin -->
			
			<?php 
				
				include("includes/db.php");
	  
				$i=0;
			
				$get_pro = "select * from products";
				
				$run_pro = mysqli_query($conn,$get_pro);
	  
				while($row_pro=mysqli_fetch_array($run_pro)){
					
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
			
			?>
			
			<tr><!-- tr begin -->
				<td> <?php echo $i; ?> </td>
				<td> <?php echo $pro_title; ?> </td>
				<td> <?php echo $pro_info; ?> </td>
				<td> <?php echo $pro_cat; ?> </td>
				<td> 
					<img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60">
					<img src="product_images/<?php echo $pro_img2; ?>" width="60" height="60">
					<img src="product_images/<?php echo $pro_img3; ?>" width="60" height="60">
				</td>
				<td> PHP <?php echo $pro_price; ?> </td>
				<td> <?php echo $pro_quant; ?> </td>
				<td> 
					 
					<a href="index.php?delete_product=<?php echo $pro_id; ?>">
					
						<i class="fa fa-trash-o"></i>Delete
					
					</a> <br>
					<a href="index.php?edit_product=<?php echo $pro_id; ?>">
					
						<i class="fa fa-pencil"></i>Edit
					
					</a> <br>
					
					<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
						Update
					</button>
					<button class = "btn btn-danger" onclick="DeleteProduct(<?php echo $pro_id; ?>)">Delete</button>
					
					
					
				</td>
				
				<?php 
				
					$get_pro = "select * from product_variation WHERE prodID = '" . $pro_id . "'";
					
					$run_pro = mysqli_query($conn,$get_pro);
	
					while($row_pro=mysqli_fetch_array($run_pro)){
						
						$var_id = $row_pro['varID'];
						
						$pro_var = $row_pro['prodVariation'];
						
						$pro_img1 = $row_pro['prodImg1'];
						
						$pro_img2 = $row_pro['prodImg2'];
						
						$pro_img3 = $row_pro['prodImg3'];
						
						$pro_price = $row_pro['price'];
						
						$pro_quant = $row_pro['quantity'];
						
				
				?>
				
				<tr><!-- tr begin -->
					<td> <?php echo $i . " - Variation"; ?> </td>
					<td> <?php echo $pro_title, " - ", $pro_var; ?>  </td>
					<td colspan = 2>  </td>
					<td> 
						<img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60">
						<img src="product_images/<?php echo $pro_img2; ?>" width="60" height="60">
						<img src="product_images/<?php echo $pro_img3; ?>" width="60" height="60">
					</td>
					<td> PHP <?php echo $pro_price; ?> </td>
					<td> <?php echo $pro_quant; ?> </td>
					<td> 
						
						<a href="index.php?delete_product=<?php echo $pro_id; ?>">
						
							<i class="fa fa-trash-o"></i>Delete
						
						</a> <br>
						<a href="index.php?edit_product=<?php echo $pro_id; ?>">
						
							<i class="fa fa-pencil"></i>Edit
						
						</a> <br>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
							Update
						</button>
						<button class = "btn btn-danger" onclick="DeleteVariation(<?php echo $var_id; ?>)">Delete</button>
						
					</td>
				</tr><!-- tr finish -->
				
				<?php } ?>
			</tr><!-- tr finish -->
			
			<?php } ?>
			
		</tbody><!-- tbody finish -->
		
	</table><!-- table table-striped table-bordered table-hover finish -->
	<script>
	
	function DeleteProduct(deleteid){
	
		$.ajax({
			url:"includes/admin_products.inc.php",
			type:"POST",
			data:{
				deletesend:deleteid
	
			},
			success:function(data,status){
				console.log(status);
			}
		});
	}
	
	function DeleteVariation(deleteid){
		
		$.ajax({
			url:"includes/admin_products.inc.php",
			type:"post",
			data:{
				deletevarsend:deleteid
	
			},
			success:function(data,status){
				document.getElementById("demo").innerHTML = "Success";
			}
		});
	}
	
	
	// var deleteForm = document.getElementById('addressForm'),
	// button = document.getElementById('delete-icon'),
	// submitForm = function(e){
	//     e.preventDefault();
	//     deleteForm.submit();
	// };
	// button.addEventListener("click",submitForm);
	</script>

</body>



</html>