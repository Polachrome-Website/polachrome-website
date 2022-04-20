<!DOCTYPE html>
<html>
<head>
	<title>View Products</title>
	<meta name="viewport" conntent="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" href="admin-dashboard.css"> -->
	<!--Bootstrap Cdn-->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
-->
	<!--Font Awesome iconns-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
	<link href='https://unpkg.com/boxiconns@2.0.7/css/boxiconns.min.css' rel='stylesheet'>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

<!--Polaroid Font 
<link href="//db.onlinewebfonts.com/c/1e5b7f8cdbcb1e579a6e53aaadaf0b67?family=FF+Real+Head" rel="stylesheet" type="text/css"/>--> 
</head>

<body>
	
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
				<h4 class="modal-title" id="modalLabel">Update Product</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="update_prodID">Product ID</label>
					<input type="text" class="form-control" id="update_prodID" disabled>
				</div>
				<div class="form-group"><!-- form-group Begin -->
					<label for="update_prodName" class="col-md-3 control-label"> Product Name </label> 
					<input name="product_name" type="text" class="form-control" id="update_prodName" >
				</div><!-- form-group Finish -->
				<div class="form-group">
                    <label for="update_prodInfos">Product Info</label><br>
                    <textarea name="update_prodInfos" cols="19" rows="6" class="form-control" id="update_prodInfo"></textarea>
                </div>
				<label class="col-md-3 control-label" for="update_catID"> Category </label> 
				<div id="displayCatList"></div>
				
				
				<div class="form-group"><!-- form-group Begin -->
					<label for="update_price" class="col-md-3 control-label"> Product Price </label> 
					<input name="product_price" type="text" class="form-control" id="update_price" >
				</div><!-- form-group Finish -->
				<div class="form-group"><!-- form-group Begin -->
					<label for="update_quantity" class="col-md-3 control-label"> Quantity </label> 
					<input name="product_quantity" type="text" class="form-control"  id="update_quantity" >
				</div><!-- form-group Finish -->
			</div>
			<div class="modal-footer">
				<input type="hidden" id="hiddendata">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="updateDetails()">Save changes</button>
			</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="updateVarModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel">Update Product</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="update_varID">Product ID</label>
					<input type="text" class="form-control" id="update_varID" disabled>
				</div>
				<div class="form-group"><!-- form-group Begin -->
                      <label for="update_varName" class="col-md-3 control-label"> Variation Name </label> 
						<input name="product_name" type="text" class="form-control" id="update_varName">
                   </div><!-- form-group Finish -->
		
				<div class="form-group"><!-- form-group Begin -->
					<label for="update_varprice" class="col-md-3 control-label"> Product Price </label> 
					<input name="product_price" type="text" class="form-control" id="update_varprice">
				</div><!-- form-group Finish -->
				<div class="form-group"><!-- form-group Begin -->
					<label for="update_varquantity" class="col-md-3 control-label"> Quantity </label> 
					<input name="product_quantity" type="text" class="form-control"  id="update_varquantity">
				</div><!-- form-group Finish -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="UpdateVarDetails()">Save changes</button>
				<input type="hidden" id="hiddenvardata">
			</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel">Delete Product?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="del_prodID">Product ID</label>
					<input type="text" class="form-control" id="del_prodID" disabled>
				</div>
				<div class="form-group"><!-- form-group Begin -->
                      <label for="del_prodName" class="col-md-3 control-label"> Product Name </label> 
						<input name="product_name" type="text" class="form-control" id="del_prodName" disabled>
                   </div><!-- form-group Finish -->
				<div class="form-group">
					<label for="del_prodInfo">Product Info</label><br>
					<textarea name="del_prodInfo" cols="19" rows="6" class="form-control" id="del_prodInfo" disabled></textarea>
				</div>
				
				<label class="col-md-3 control-label"> Product Images </label> 
				<div id="displayDelProdImages"></div>
				<div class="form-group"><!-- form-group Begin -->
					<label for="del_price" class="col-md-3 control-label"> Product Price </label> 
					<input name="product_price" type="text" class="form-control" id="del_price" disabled>
				</div><!-- form-group Finish -->
				<div class="form-group"><!-- form-group Begin -->
					<label for="del_quantity" class="col-md-3 control-label"> Quantity </label> 
					<input name="product_quantity" type="text" class="form-control"  id="del_quantity" disabled>
				</div><!-- form-group Finish -->
			</div>
			<div class="modal-footer">
				<input type="hidden" id="hiddendeldata">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" onclick="deleteDetails()">Delete</button>
			</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="deleteVarModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Delete Product?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="del_varID">Product ID</label>
					<input type="text" class="form-control" id="del_varID" disabled>
				</div>
				<div class="form-group"><!-- form-group Begin -->
                      <label for="del_varName" class="col-md-3 control-label"> Variation Name </label> 
						<input name="product_name" type="text" class="form-control" id="del_varName" disabled>
                   </div><!-- form-group Finish -->
				<label class="col-md-3 control-label"> Product Images </label> 
				<div class="form-group" id="displayDelVarProdImages"></div>
				<div class="form-group"><!-- form-group Begin -->
					<label for="del_varprice" class="col-md-3 control-label"> Product Price </label> 
					<input name="product_price" type="text" class="form-control" id="del_varprice" disabled>
				</div><!-- form-group Finish -->
				<div class="form-group"><!-- form-group Begin -->
					<label for="del_varquantity" class="col-md-3 control-label"> Quantity </label> 
					<input name="product_quantity" type="text" class="form-control"  id="del_varquantity" disabled>
				</div><!-- form-group Finish -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" onclick="deleteVarDetails()">Delete</button>
				<input type="hidden" id="hiddendelvardata">
			</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="updateImgModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="includes/admin_products.inc.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalCenterTitle">Update Product Image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

            <label class="col-md-3 control-label"> Product Images </label> 
			<br><br>
            <div id="displayProdImages"></div>

            <div class="form-group"><!-- form-group Begin -->
                <input name="update_prodImg1" type="file" class="form-control" id="update_prodImg1" />

            </div><!-- form-group Finish -->
            <div class="form-group">

                <input name="update_prodImg2" type="file" class="form-control" id="update_prodImg2">

            </div>

            <div class="form-group">

                <input name="update_prodImg3" type="file" class="form-control form-height-custom" id="update_prodImg3">

            </div><!-- form-group Finish -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submitUpdateImg">Update</button>
                <input type="hidden" name="hiddenimgsdata" id="hiddenimgsdata">
            </div>
            </form>
            </div>
        </div>
    </div>

	<div class="modal fade" id="updatevarImgModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="includes/admin_products.inc.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

            <label class="col-md-3 control-label"> Product Images </label> 
            <div id="displayVarProdImages"></div>

            <div class="form-group"><!-- form-group Begin -->
                <input name="update_varprodImg1" type="file" class="form-control" >

            </div><!-- form-group Finish -->
            <div class="form-group">

                <input name="update_varprodImg2" type="file" class="form-control" >

            </div>

            <div class="form-group">

                <input name="update_varprodImg3" type="file" class="form-control form-height-custom" >

            </div><!-- form-group Finish -->


            </div>
            <div class="modal-footer">
            <input type="text" name="hiddenimgsvardata" id="hiddenimgsvardata">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submitvarUpdateImg">Update</button>
            </div>
            </form>
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
						<div id="displayDataTable"></div>
						
					</div><!-- table-responsive finish -->
				</div><!-- panel-body finish -->
				
			</div><!-- panel panel-default finish -->
		</div><!-- col-lg-12 finish -->
	</div><!-- row 2 finish -->

	<script>
	
	$(document).ready(function(){
				displayData(),
				displayCatalog();
				displayDelCategory();
		});
		
		function displayCatalog(){
			var displayCatalog="true";
			$.ajax({
				url:"includes/admin_products.inc.php",
				type:'post',
				data:{
					displayCatSend: displayCatalog
				},
				success:function(data,status){
					$('#displayCatList').html(data);
				}
			})
		}
		
		function displayDelCategory(){
			var displayDelCategory="true";
			$.ajax({
				url:"includes/admin_products.inc.php",
				type:'post',
				data:{
					displayCatSend: displayDelCategory
				},
				success:function(data,status){
					$('#displayDelCatList').html(data);
				}
			})
		}

		function GetImgs(updateid){
                $('#hiddenimgsdata').val(updateid);

                $.post("includes/admin_products.inc.php", {updateid:updateid}, function(data,status){
                });

                $('#updateImgModal').modal('show');
                displayImages();
            }

			function GetImgsvar(updateid){
                $('#hiddenimgsvardata').val(updateid);

                $.post("includes/admin_products.inc.php", {updateid:updateid}, function(data,status){
                });

                $('#updatevarImgModal').modal('show');
                displayVarImages();
            }
		
		function displayImages(){
			var displayImages="true";
            var hiddenimgdata=$('#hiddenimgsdata').val();
			$.ajax({
				url:"includes/admin_products.inc.php",
				type:'post',
				data:{
					displayImgSend: displayImages,
					hiddenimgdata:hiddenimgdata
				},
				success:function(data,status){
					$('#displayProdImages').html(data);
				}
			})
		}
		
		function displayVarImages(){
            var displayVarImages="true";
            var hiddenimgdata=$('#hiddenimgsvardata').val();
            $.ajax({
                url:"includes/admin_products.inc.php",
                type:'post',
                data:{
                    displayVarImgSend: displayVarImages,
                    hiddenimgdata:hiddenimgdata
                },
                success:function(data,status){
                    $('#displayVarProdImages').html(data);
                }
            })
        }
		
		function displayDelImages(){
			var displayDelImages="true";
			var hiddenimgdata=$('#hiddendeldata').val();
			$.ajax({
				url:"includes/admin_products.inc.php",
				type:'post',
				data:{
					displayImgSend: displayDelImages,
					hiddenimgdata:hiddenimgdata
				},
				success:function(data,status){
					$('#displayDelProdImages').html(data);
				}
			})
		}
		
		function displayDelVarImages(){
			var displayDelVarImages="true";
			var hiddenimgdata=$('#hiddendelvardata').val();
			$.ajax({
				url:"includes/admin_products.inc.php",
				type:'post',
				data:{
					displayVarImgSend: displayDelVarImages,
					hiddenimgdata:hiddenimgdata
				},
				success:function(data,status){
					$('#displayDelVarProdImages').html(data);
				}
			})
		}
		
		function displayData(){
			var displayData="true";
			$.ajax({
				url:"includes/admin_products.inc.php",
				type:'post',
				data:{
					displaySend: displayData
				},
				success:function(data,status){
					$('#displayDataTable').html(data);
				}
			})
		}
		
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
				type:'post',
				data:{
					deletevarsend:deleteid
				},
				success:function(data,status){
					displayData();
				}
			});
		}
		
		function GetDetails(updateid){
			$('#hiddendata').val(updateid);
			
			$.post("includes/admin_products.inc.php", {updateid:updateid}, function(data,status){
				var prodID = JSON.parse(data);
				$('#update_prodID').val(prodID.prodID)
				$('#update_prodName').val(prodID.prodName)
				$('#update_prodInfo').val(prodID.prodInfo)
				$('#update_catID').val(prodID.catID)
				$('#update_price').val(prodID.price)
				$('#update_quantity').val(prodID.quantity)
			});
			
			$('#updateModal').modal('show');
			displayImages();
		}
		
		function GetVarDetails(updatevarid){
			$('#hiddenvardata').val(updatevarid);
			
			$.post("includes/admin_products.inc.php", {updatevarid:updatevarid}, function(data,status){
				var varID = JSON.parse(data);
				$('#update_varID').val(varID.prodID)
				$('#update_varName').val(varID.prodVariation)
				$('#update_varprice').val(varID.price)
				$('#update_varquantity').val(varID.quantity)
			});
			
			$('#updateVarModal').modal('show');
			displayVarImages();
		}
		
		function GetDelDetails(updateid){
			$('#hiddendeldata').val(updateid);
			
			$.post("includes/admin_products.inc.php", {delid:updateid}, function(data,status){
				var prodID = JSON.parse(data);
				$('#del_prodID').val(prodID.prodID)
				$('#del_prodName').val(prodID.prodName)
				$('#del_prodInfo').val(prodID.prodInfo)
				$('#del_price').val(prodID.price)
				$('#del_quantity').val(prodID.quantity)
			});
			
			$('#deleteModal').modal('show');
			displayDelImages();
		}
		
		function GetDelVarDetails(updatevarid){
			$('#hiddendelvardata').val(updatevarid);
			
			$.post("includes/admin_products.inc.php", {delvarid:updatevarid}, function(data,status){
				var varID = JSON.parse(data);
				$('#del_varID').val(varID.prodID)
				$('#del_varName').val(varID.prodVariation)
				$('#del_varprice').val(varID.price)
				$('#del_varquantity').val(varID.quantity)
			});
			
			$('#deleteVarModal').modal('show');
			displayDelVarImages();
		}
		
		function updateDetails(){
			var update_prodName=$('#update_prodName').val();
			var update_prodInfo=$('#update_prodInfo').val();
			var update_catID=$('#update_catID').val();
			var update_price=$('#update_price').val();
			var update_prodImg1=$('#upload_prodImg1').val();
			var update_prodImg2=$('#upload_prodImg2').val();
			var update_prodImg3=$('#upload_prodImg3').val();
			var update_quantity=$('#update_quantity').val();
			var hiddendata=$('#hiddendata').val();
			
			$.post("includes/admin_products.inc.php", {
				update_prodName:update_prodName,
				update_prodInfo:update_prodInfo,
				update_catID:update_catID,
				update_quantity:update_quantity,
				update_price:update_price,
				update_prodImg1:update_prodImg1,
				update_prodImg2:update_prodImg2,
				update_prodImg3:update_prodImg3,
				hiddendata:hiddendata
				}, function(data,status){
					$('#updateModal').modal('hide');
					displayData();
			});
			
		}
		
		function UpdateVarDetails(){
			var update_prodName=$('#update_varName').val();
			var update_price=$('#update_varprice').val();
			var update_quantity=$('#update_varquantity').val();
			var hiddendata=$('#hiddenvardata').val();
			
			$.post("includes/admin_products.inc.php", {
				update_prodName:update_prodName,
				update_quantity:update_quantity,
				update_price:update_price,
				hiddenvardata:hiddendata
				}, function(data,status){
					$('#updateVarModal').modal('hide');
					displayData();
			});
			
		}
		
		function deleteDetails(){
			var hiddendata=$('#hiddendeldata').val();
			
			$.post("includes/admin_products.inc.php", {
				hiddendeldata:hiddendata
				}, function(data,status){
					$('#deleteModal').modal('hide');
					displayData();
			});
			
		}
		
		function deleteVarDetails(){
			var hiddendata=$('#hiddendelvardata').val();
			
			$.post("includes/admin_products.inc.php", {
				hiddendelvardata:hiddendata
				}, function(data,status){
					$('#deleteVarModal').modal('hide');
					displayData();
			});
			
		}
	</script>

</body>

</html>