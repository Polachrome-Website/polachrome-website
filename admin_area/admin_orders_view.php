<!DOCTYPE html>
<html>
<head>
	<title>View Orders</title>
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
			</ol><!-- breadcrumb finish -->
		</div><!-- col-lg-12 finish -->
	</div><!-- row 1 finish -->

	<!-- Modal -->
	<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel">Customer Information</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="update_c_name">Name</label>
					<input type="text" class="form-control" id="update_c_name" disabled>
				</div>

				<div class="form-group"><!-- form-group Begin -->
                      <label for="update_c_address" class="col-md-3 control-label">Address</label> 
						<input name="c_address" type="text" class="form-control" id="update_c_address" disabled>
                   </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->
                      <label for="update_c_email" class="col-md-3 control-label">Email</label> 
						<input name="c_email" type="text" class="form-control" id="update_c_email" disabled>
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->
                      <label for="update_c_contact" class="col-md-3 control-label">Contact</label> 
						<input name="c_contact" type="text" class="form-control" id="update_c_contact" disabled>
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->
                      <label for="update_pay_mode" class="col-md-3 control-label">Payment Mode</label> 
						<input name="pay_mode" type="text" class="form-control" id="update_pay_mode" disabled>
                </div><!-- form-group Finish -->

				<label class="col-md-3 control-label" for="update_order_status">Order Status</label> 
				    <select name="order_status" class="form-control" id="update_order_status"><!-- form-control Begin -->
                        <option> Pending </option>
                        <option> Processing </option>
                        <option> Shipped </option>
                        <option> On Delivery </option>
                        <option> Delivered </option>
                    </select>

			</div> 	<!-- end modal body -->
			<div class="modal-footer">
				<input type="hidden" id="hiddendata">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="updateDetails()">Save changes</button>
			</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel">Remove Order?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
            <div class="form-group">
					<label for="update_c_name">Name</label>
					<input type="text" class="form-control" id="del_c_name" disabled>
				</div>

				<div class="form-group"><!-- form-group Begin -->
                      <label for="update_c_address" class="col-md-3 control-label">Address</label> 
						<input name="c_address" type="text" class="form-control" id="del_c_address" disabled>
                   </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->
                      <label for="update_c_email" class="col-md-3 control-label">Email</label> 
						<input name="c_email" type="text" class="form-control" id="del_c_email" disabled>
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->
                      <label for="update_c_contact" class="col-md-3 control-label">Contact</label> 
						<input name="c_contact" type="text" class="form-control" id="del_c_contact" disabled>
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->
                      <label for="update_pay_mode" class="col-md-3 control-label">Payment Mode</label> 
						<input name="pay_mode" type="text" class="form-control" id="del_pay_mode" disabled>
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->
                      <label for="del_order_status" class="col-md-3 control-label">Order Status</label> 
						<input name="order_status" type="text" class="form-control" id="del_order_status" disabled>
                </div><!-- form-group Finish -->
			</div>
			<div class="modal-footer">
				<input type="hidden" id="hiddendeldata">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" onclick="DeleteOrder()">Delete</button>
			</div>
			</div>
		</div>
	</div>

    <!-- image modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
			</div>
			<div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                
                <img src="" class="imagepreview" style="width: 100%;" >
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
				   
					   <i class="fa fa-fw fa-book"></i>  View Orders
					
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
		});

        $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imageModal').modal('show');   
		});		
        });
		
		function displayCatalog(){
			var displayCatalog="true";
			$.ajax({
				url:"includes/admin_orders_view.inc.php",
				type:'post',
				data:{
					displayCatSend: displayCatalog
				},
				success:function(data,status){
					$('#displayCatList').html(data);
				}
			})
		}
		
		function displayData(){
			var displayData="true";
			$.ajax({
				url:"includes/admin_orders_view.inc.php",
				type:'post',
				data:{
					displaySend: displayData
				},
				success:function(data,status){
					$('#displayDataTable').html(data);
				}
			})
		}
		
		// function DeleteProduct(deleteid){
			
		// 	var deleteid=$('#pro_id').val();
	
		// 	$.ajax({
		// 		url:"includes/admin_orders_view.inc.php",
		// 		type:"POST",
		// 		data:{
		// 			deletesend:deleteid
		// 		},
		// 		success:function(data,status){
		// 			console.log(status);
		// 		}
		// 	});
		// }

        function GetDelDetails(updateid){
			$('#hiddendeldata').val(updateid);
			
			$.post("includes/admin_orders_view.inc.php", {delid:updateid}, function(data,status){
				var invoiceNo = JSON.parse(data);
				$('#del_c_name').val(invoiceNo.c_full_name)
				$('#del_c_address').val(invoiceNo.c_address)
				$('#del_c_email').val(invoiceNo.c_email)
				$('#del_c_contact').val(invoiceNo.c_contact)
                $('#del_pay_mode').val(invoiceNo.pay_mode)
                $('#del_order_status').val(invoiceNo.order_status)
			});
			
			$('#deleteModal').modal('show');
		}
		
        function DeleteOrder(deleteid){
            var hiddendata=$('#hiddendeldata').val();
            $.ajax({
                url:"includes/admin_orders_view.inc.php",
				type:"POST",
				data:{
					hiddendeldata:hiddendata
				},
                success:function(data,status){
                    $('#deleteModal').modal('hide');
					displayData(); 
				}
            });
        }
		
		
		function DeleteVariation(deleteid){
			
			$.ajax({
				url:"includes/admin_orders_view.inc.php",
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
			
			$.post("includes/admin_orders_view.inc.php", {updateid:updateid}, function(data,status){
				var invoiceNo = JSON.parse(data);
				$('#update_c_name').val(invoiceNo.c_full_name)
				$('#update_c_address').val(invoiceNo.c_address)
				$('#update_c_email').val(invoiceNo.c_email)
				$('#update_c_contact').val(invoiceNo.c_contact)
                $('#update_pay_mode').val(invoiceNo.pay_mode)
                $('#update_order_status').val(invoiceNo.order_status)
			});
			
			$('#updateModal').modal('show');
		}
		
		function updateDetails(){

			var update_order_status= $('#update_order_status').val();
			var update_quantity=$('#update_quantity').val();
			var hiddendata=$('#hiddendata').val();
			
			$.post("includes/admin_orders_view.inc.php", {
				update_order_status:update_order_status,
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
			
			$.post("includes/admin_orders_view.inc.php", {
				update_prodName:update_prodName,
				update_quantity:update_quantity,
				update_price:update_price,
				hiddenvardata:hiddendata
				}, function(data,status){
					$('#updateVarModal').modal('hide');
					displayData();
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