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
	<!-- <script type="text/javascript" src='jquery-3.3.1.min.js'></script> -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>    

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!--Polaroid Font 
<link href="//db.onlinewebfonts.com/c/1e5b7f8cdbcb1e579a6e53aaadaf0b67?family=FF+Real+Head" rel="stylesheet" type="text/css"/>--> 
</head>

<body>
	
	<!--Navbar-->
	<nav>
		<div class="logo">
			<img src="img/logo.png" alt="PolaChrome-logo">
		</div>
		<div class="nav-items">
			<li><a class="red" href="home.html">HOME</a></li>
			<li><a class="orange"  href="faq.html">FAQs</a></li>
			<li><a class="yellow" href="product.html">PRODUCT</a></li>
			<li><a class="green"  href="about.html">ABOUT</a></li>
			<li><a class="blue"  href="conntact.html">CONTACT US</a></li>
			<li><a class="red" href="testimonial.html">TESTIMONIALS</a></li>
			<li><a class="orange" href="track-order.html">TRACK ORDER</a></li>
		</div>
	
		<div class="search-iconn">
			<span class="fas fa-search"></span>
		</div>
	
		<div class="cancel-search-iconn">
			<span class="fas fa-times"></span>
		</div>
	
		<div class="cancel-iconn">
			<span class="fas fa-times"></span>
		</div>
	
		<form action="#">
			<input type="search" class="search-data" placeholder="Search" required>
			<button type="submit" class="fas fa-search"></button>
		</form>
	
		<div class="user-iconn">
			<span class="fas fa-user"></span>
		</div>
		<div class="cart-iconn">
			<span class="fas fa-shopping-cart"></span>
		</div>
	
		<div class="menu-iconn">
			<span class="fas fa-bars"></span>
		</div>
	
	</nav>
	
	<!--Sidebar-->
	<!--<div class="sidebar">
		<h6>Admin</h6>
		<ul class="nav-links">
		
			<li>
			<a href="#" class="active">
				<i class='bx bx-grid-alt' ></i>
				<span class="links_name">Dashboard</span>
			</a>
			</li>
			<li>
			<a href="#">
				<i class='bx bx-user' ></i>
				<span class="links_name">My Profile</span>
			</a>
			</li>
			<li>
			<a href="#">
				<i class='bx bx-box' ></i>
				<span class="links_name" href="admin_products.php">Products</span>
			</a>
			</li>
			<li>
			<a href="#">
				<i class='bx bx-category' ></i>
				<span class="links_name">Categories</span>
			</a>
			</li>
			<li>
			<a href="#">
				<i class='bx bxs-user-account' ></i>
				<span class="links_name">Customers</span>
			</a>
			</li>
			<li>
			<a href="#">
				<i class='bx bx-cart' ></i>
				<span class="links_name">Orders</span>
			</a>
			</li>
			<li>
			<a href="#">
				<i class='bx bx-heart' ></i>
				<span class="links_name">Personalize</span>
			</a>
			</li>
		</ul>
	</div> -->
	
	
	<!-- <script>
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".sidebarBtn");
		sidebarBtn.onclick = function() {
			sidebar.classList.toggle("active");
			if(sidebar.classList.conntains("active")){
				sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
			}else
				sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
		}
	</script> -->
	
	<script src="navbar.js"></script>
	
	<div class="row"><!-- row 1 begin -->
		<div class="col-lg-12"><!-- col-lg-12 begin -->
			<ol class="breadcrumb"><!-- breadcrumb begin -->
				<li class="active"><!-- active begin -->
					
					<i class="fa fa-dashboard"></i> Dashboard / View Products
					
				</li><!-- active finish -->
			</ol><!-- breadcrumb finish -->
		</div><!-- col-lg-12 finish -->
	</div><!-- row 1 finish -->


	<!-- Modal -->
	<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
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
	
	<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to delete <?php echo $pro_var; ?>?</h5>
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

	<div class="row"><!-- row 2 begin -->
		<div class="col-lg-12"><!-- col-lg-12 begin -->
			<div class="panel panel-default"><!-- panel panel-default begin -->
				<div class="panel-heading"><!-- panel-heading begin -->
				   <h3 class="panel-title"><!-- panel-title begin -->
				   
					   <i class="fa fa-tags"></i>  View Products
					
				   </h3><!-- panel-title finish --> 
				</div><!-- panel-heading finish -->
				
				<div class="panel-body"><!-- panel-body begin -->
					<div class="table-responsive"><!-- table-responsive begin -->
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
									<td> <?php echo $pro_title; ?> 
										<input type="hidden" id="pro_id" value="<?=$pro_id?>" />
										<input type="hidden" id="pro_title" value="<?=$pro_title?>" />
										<input type="hidden" id="pro_info" value="<?=$pro_info?>" />
										<input type="hidden" id="pro_cat" value="<?=$pro_cat?>" />
										<input type="hidden" id="pro_img1" value="<?=$pro_img1?>" />
										<input type="hidden" id="pro_img2" value="<?=$pro_img2?>" />
										<input type="hidden" id="pro_img3" value="<?=$pro_img3?>" />
										<input type="hidden" id="pro_price" value="<?=$pro_price?>" />
										<input type="hidden" id="pro_quant" value="<?=$pro_quant?>" />
									</td>
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
										<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#updateModal">
											Update
										</button>
										<button class = "btn btn-danger" onclick="DeleteProduct()">Delete</button>
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
											<img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60">
											<img src="product_images/<?php echo $pro_img2; ?>" width="60" height="60">
											<img src="product_images/<?php echo $pro_img3; ?>" width="60" height="60">
										</td>
										<td> PHP <?php echo $pro_price; ?> </td>
										<td> <?php echo $pro_quant; ?> </td>
										<td> 
											<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#updateModal">
												Update
											</button>
											<!-- <button class = "btn btn-danger" onclick="DeleteVariation(<?php echo $pro_id; ?>)">Delete</button> -->
											<button class="btn btn-danger" onclick="DeleteVariation()">Delete</button>
											
										</td>
									</tr><!-- tr finish -->
									
									<?php } ?>
								</tr><!-- tr finish -->
								
								<?php } ?>
								
							</tbody><!-- tbody finish -->
							
						</table><!-- table table-striped table-bordered table-hover finish -->
					</div><!-- table-responsive finish -->
				</div><!-- panel-body finish -->
				
			</div><!-- panel panel-default finish -->
		</div><!-- col-lg-12 finish -->
	</div><!-- row 2 finish -->

	<script>
	
		/* $(document).ready(function(){
			
			function DeleteVariation(deleteid){
				
				$.ajax({
					url:"",
					type:"post",
					data:{
					},
					success:function(data,status){
						document.getElementById("demo").innerHTML = "Success";
					}
				});
			};
		}); */
	
		function DeleteProduct(deleteid){
			
			var deleteid=$('#pro_id').val();
	
			$.ajax({
				url:"includes/admin_products.inc.php",
				type:"POST",
				data:{
					deletesend:deleteid
				},
				success:function(data,status){
					console.log(status);
				},
			});
		}
		
		function DeleteVariation(){
			
			var deleteid=$('#var_id').val();
			
			$.ajax({
				url:"includes/admin_products.inc.php",
				type:'post',
				data:{
					deletevarsend:deleteid
				},
				success:function(data,status){
					console.log(status);
				},
			});
		}
		
		function GetDetails(updateid){
			$('hiddendata').val(updateid);
			
			$.POST("includes/admin_products.inc.php", {updateid:updateid}, function(data,
			status){
				var userid = JSON.parse(data);
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