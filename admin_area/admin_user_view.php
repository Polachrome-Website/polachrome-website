<!DOCTYPE html>
<html>
<head>
	<title>View Users</title>
	<meta name="viewport" conntent="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" href="admin-dashboard.css"> -->
	<!--Bootstrap Cdn-->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		
	<!--Font Awesome iconns-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
	<link href='https://unpkg.com/boxiconns@2.0.7/css/boxiconns.min.css' rel='stylesheet'>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 -->
		<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!--Polaroid Font 
<link href="//db.onlinewebfonts.com/c/1e5b7f8cdbcb1e579a6e53aaadaf0b67?family=FF+Real+Head" rel="stylesheet" type="text/css"/>--> 
</head>

<body>
	
	
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
	
	
	<!--<script>
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".sidebarBtn");
		sidebarBtn.onclick = function() {
			sidebar.classList.toggle("active");
			if(sidebar.classList.conntains("active")){
				sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
			}else
				sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
		}
	</script>-->
	
	<!-- <script src="navbar.js"></script> -->
	
	<div class="row"><!-- row 1 begin -->
		<div class="col-lg-12"><!-- col-lg-12 begin -->
			<ol class="breadcrumb"><!-- breadcrumb begin -->
				<li class="active"><!-- active begin -->
					
					<i class="fa fa-dashboard"></i> Dashboard / View Users
					
				</li><!-- active finish -->
			</ol><!-- breadcrumb finish -->
		</div><!-- col-lg-12 finish -->
	</div><!-- row 1 finish -->

	<!-- Modal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel">Are you sure you want to delete this user?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="update_userID">User ID</label>
					<input type="text" class="form-control" id="update_userID" disabled>
				</div>
				<div class="form-group"><!-- form-group Begin -->
                      <label for="update_userName" class="col-md-3 control-label"> User Name </label> 
						<input name="product_name" type="text" class="form-control" id="update_userName" disabled>
                   </div><!-- form-group Finish -->
				<div class="form-group">
					<label for="update_email">Email</label><br>
					<input name="update_email" type="text" class="form-control" id="update_email" disabled>
				</div>
				
				<div class="form-group"><!-- form-group Begin -->
					<label for="update_last" class="col-md-3 control-label"> Full Name </label> 
					<input name="update_last" type="text" class="form-control" id="update_last" disabled>
                       
				</div><!-- form-group Finish -->
                   
				<!-- form-group Begin -->
				<!-- <div class="form-group">
					<label for="update_first" class="col-md-3 control-label"> First Name </label> 
					<input name="update_first" type="text" class="form-control" id="update_first" disabled>
				</div> -->
				<!-- form-group Finish -->
				
				<div class="form-group"><!-- form-group Begin -->
					<label for="update_points" class="col-md-3 control-label"> Account Points </label> 
					<input name="update_points" type="text" class="form-control" id="update_points" disabled>
				</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="hiddendata">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" onclick="deleteDetails()">Delete</button>
			</div>
			</div>
		</div>
	</div>

	<div class="row"><!-- row 2 begin -->
		<div class="col-lg-12"><!-- col-lg-12 begin -->
			<div class="panel panel-default"><!-- panel panel-default begin -->
				<div class="panel-heading"><!-- panel-heading begin -->
				   <h3 class="panel-title"><!-- panel-title begin -->
				   
					   <i class="fa fa-tags"></i>  View Users
					
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
				displayData();
		});
		
		function displayData(){
			var displayData="true";
			$.ajax({
				url:"includes/admin_user_view.inc.php",
				type:'post',
				data:{
					displaySend: displayData
				},
				success:function(data,status){
					$('#displayDataTable').html(data);
				}
			})
		}
		
		function DeleteUser(deleteid){
			
			var deleteid=$('#pro_id').val();
	
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
		
		function GetDetails(updateid){
			$('#hiddendata').val(updateid);
			
			$.post("includes/admin_user_view.inc.php", {updateid:updateid}, function(data,status){
				var userID = JSON.parse(data);
				$('#update_userID').val(userID.userID)
				$('#update_userName').val(userID.userName)
				$('#update_email').val(userID.email)
				$('#update_last').val(userID.lastName)
				$('#update_first').val(userID.firstName)
				$('#update_points').val(userID.accountPoints)
			});
			
			$('#deleteModal').modal('show');
		}
		
		function deleteDetails(){
			var hiddendata=$('#hiddendata').val();
			
			$.post("includes/admin_user_view.inc.php", {
				hiddendata:hiddendata
				}, function(data,status){
					$('#deleteModal').modal('hide');
					displayData();
			});
			
		}
		
	</script>

</body>



</html>