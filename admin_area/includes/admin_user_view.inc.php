<?php
	include 'db.php';
	
	extract($_POST);
	
	if(isset($_POST['displaySend'])){
		$table = '<table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
							
							<thead><!-- thead begin -->
								<tr><!-- tr begin -->
									<th> User ID: </th>
									<th> Username: </th>
									<th> Email: </th>
									<th> Last Name: </th>
									<th> First Name: </th>
									<th> Account Points: </th>
									<th> Manager Users: </th>
								</tr><!-- tr finish -->
							</thead><!-- thead finish -->
							
							<tbody><!-- tbody begin -->';
							$i = 0;
							$get_pro ="select * from user_account";
							$run_pro = mysqli_query($conn, $get_pro);
							while ($row_pro = mysqli_fetch_assoc($run_pro)){
								$userID = $row_pro['userID'];
								$userName = $row_pro['userName'];
								$email = $row_pro['email'];
								$lastName = $row_pro['lastName'];
								$firstName = $row_pro['firstName'];
								$accountPoints = $row_pro['accountPoints'];
								$table.='<tr>
									<td>'.$userID.'</td>
									<td>'.$userName.' </td>
									<td>'.$email.'</td>
									<td>'.$lastName.'</td>
									<td>'. $firstName.' </td>
									<td> '. $accountPoints.' </td>
									<td>
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="GetDetails('.$userID.')">
											Delete
										</button>
									</td>
									</tr><!-- tr finish -->
									';
							}
							
		echo $table;
	}
	
	if(isset($_POST['updateid'])){
		
		$userID=$_POST['updateid'];
		
		$sql = "SELECT * FROM user_account WHERE userID = $userID";
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
		$sql = "DELETE from user_account WHERE userID='".$uniqueid."'";
		$result = mysqli_query($conn,$sql);
	}
	
?>
