<?php
    include("includes/header.php");
?>
    <head>
        
        <title>User Profile</title>
        <link rel="stylesheet" href="styles/user-profile.css">
           
    </head>

<?php
    if(isset($_SESSION['userID'])){
        
        $get_uid = $_SESSION['userID'];

        $get_user = "select * from user_account where userID='$get_uid'";

        $run_user = mysqli_query($conn,$get_user);

        while($row_user=mysqli_fetch_array($run_user)){
            $accountPoints = $row_user['accountPoints'];
        }
    }
?>

<body>

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card profile-card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="img/user-icon.png" class="rounded-circle p-2">
                                <div class="mt-2">
                                    <h3><?php echo $_SESSION['fullName'];?></h3>   
                                </div>
                            </div>
                            <ul class="profile-details align-items-center text-center">
                                <li><a href="#">My Profile</a></li>
                                <li><a href="#">My Rewards</a></li>
                                <li><a href="#">Saved Address</a></li>
                                <li><a href="#">Change Password</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="d-flex align-items-center mb-3">My Profile</h5>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input id="newfullname" type="text" class="form-control" value="<?=$_SESSION["fullName"]?>">
                                </div>
                            </div>
							<div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input id="newusername" type="text" class="form-control" value="<?=$_SESSION["userName"]?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input id="newemail" type="email" class="form-control" value="<?=$_SESSION["email"]?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 ">
                                    <input type="button" class="btn-update" onclick="updateUser(<?=$_SESSION["userID"]?>)" value="Update">
                                </div>
                            </div>
                           
                        </div>
                    </div>
             
               <div class="row">
                   <div class="col-sm-12">
                       <div class="card mb-3 ">
                           <div class="card-body mb-3">
                            <h5 class="d-flex align-items-center mb-3">My Rewards</h5>
                            <p class="d-flex flex-column text-center">
                                <?php if(is_null($accountPoints)){ echo "Reward Points: 0"; }else{ echo "Reward Points: " . $accountPoints; }?>
                            </p>
                            <div class="accordion earn-points">
                                <h5><i class="fas fa-chevron-circle-down down-icon"></i>Ways to earn reward points </h5>
                                
                            </div>
                            <div class="panel">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                            <div class="accordion">
                                <h5><i class="fas fa-chevron-circle-down down "></i>Ways to redeem reward points </h5>
                                
                            </div>
                            <div class="panel">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="row"> <!--begin row -->
                <div class="col-sm-12"> <!--begin col-sm-12 -->
                    <div class="card mb-3 mt-0"> <!--begin card mb-3 mt-0 -->
                        <div class="card-body mb-3">
                         <h5 class="d-flex align-items-center mb-3">Shipping Address</h5>
                    
                        <?php //begin address display from DB
                            if (isset($_GET["addressid"])) {
                                $query = mysqli_query($conn, "SELECT * FROM user_account_address WHERE addressID = '" . $_GET["addressid"] . "'");
                                $row = mysqli_fetch_array($query);
                            ?>

                            <div class="row mb-3 align-items-center g-3">
                            <div class="col-sm-6">
                                <input type="text" name="fullname" class="form-control myInput" placeholder="Full Name" value="<?php echo $_SESSION['fullName'];?>" required>
                            </div>
                            <div class="col-sm-6">
                                    <input type="text" name="bldg" class="form-control myInput" 
                                    placeholder= "<?php if($check_address < 1){ echo "Building or Unit Number";}?>"
                                    value="<?php echo $row['bldg'] ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center g-3">
                            <div class="col-sm-6">
                                <input type="text" name="strt" class="form-control myInput" 
                                placeholder= "<?php if($check_address < 1){ echo "Street";}?>"
                                value="<?php echo $row['strt'] ?>" 
                                required>
                            </div>
                            <div class="col-sm-6">
                                    <input type="text" name="brgy" class="form-control myInput" 
                                    placeholder= "<?php if($check_address < 1){ echo "Barangay";}?>"
                                    value="<?php echo $row['brgy'] ?>" required>
                            </div>
                        </div>
						<div class="row mb-3 align-items-center g-3">
                            <div class="col-sm-6">
                                <input type="text" name="city" class="form-control myInput" 
                                placeholder= "<?php if($check_address < 1){ echo "City";}?>"
                                value="<?php echo $row['city'] ?>" required>
                            </div>
                            <div class="col-sm-6">
                                    <input type="text" name="region" class="form-control myInput" 
                                    placeholder= "<?php if($check_address < 1){ echo "Province";}?>"
                                    value="<?php echo $row['region'] ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center g-3">
                            <div class="col-sm-6">
                                <input type="text" name="contactNum" class="form-control myInput" 
                                placeholder= "<?php if($check_address < 1){ echo "Phone Number";}?>"
                                value="<?php echo $row['contactNum'] ?>" required>
                            </div>
                            <div class="col-sm-6">
                                    <input type="text" name="zip" class="form-control myInput" 
                                    placeholder= "<?php if($check_address < 1){ echo "Postal Code";}?>"
                                    value="<?php echo $row['zip'] ?>" required>
                            </div>
                        </div> 
                        <?php
		                    } //end Address display from DB

                        else{
                        ?>
                       		 <form action="includes/address.inc.php"  method="post"><!-- begin address display -->

                                <input type="hidden" name="addressid"  class="text-box" value="<?php echo $address_id ?>" >
                                <input type="hidden" name="userID"  class="text-box" value="<?php echo $_SESSION["userID"] ?>" required >
                                <div class="row mb-3 align-items-center g-3">
                                <div class="col-sm-6">
                                    <input type="text" name="fullname" class="form-control myInput" placeholder="Full Name" value="<?php echo $_SESSION['fullName'];?>" required>
                                </div>
                                <div class="col-sm-6">
                                        <input type="text" name="bldg" class="form-control myInput" 
                                        placeholder= "<?php if($check_address < 1){ echo "Building or Unit Number";}?>"
                                        value = "<?php if($check_address >= 1){ echo $address_bldg;}?>" required>
                                </div>
                                </div>
                                <div class="row mb-3 align-items-center g-3">
                                <div class="col-sm-6">
                                    <input type="text" name="strt" class="form-control myInput" 
                                    placeholder= "<?php if($check_address < 1){ echo "Street";}?>"
                                    value = "<?php if($check_address >= 1){ echo $address_strt;}?>"
                                    required>
                                </div>
                                <div class="col-sm-6">
                                        <input type="text" name="brgy" class="form-control myInput" 
                                        placeholder= "<?php if($check_address < 1){ echo "Barangay";}?>"
                                        value = "<?php if($check_address >= 1){ echo $address_brgy;}?>" required>
                                </div>
                                </div>
                                <div class="row mb-3 align-items-center g-3">
                                <div class="col-sm-6">
                                    <input type="text" name="city" class="form-control myInput" 
                                    placeholder= "<?php if($check_address < 1){ echo "City";}?>"
                                    value = "<?php if($check_address >= 1){ echo $address_city;}?>" required>
                                </div>
                                <div class="col-sm-6">
                                        <input type="text" name="region" class="form-control myInput" 
                                        placeholder= "<?php if($check_address < 1){ echo "Province";}?>"
                                    value = "<?php if($check_address >= 1){ echo $address_region;}?>" required>
                                </div>
                                </div>
                                <div class="row mb-3 align-items-center g-3">
                                <div class="col-sm-6">
                                    <input type="text" name="contactNum" class="form-control myInput" 
                                    placeholder= "<?php if($check_address < 1){ echo "Phone Number";}?>"
                                    value = "<?php if($check_address >= 1){ echo $address_contact;}?>" required>
                                </div>
                                <div class="col-sm-6">
                                        <input type="text" name="zip" class="form-control myInput" 
                                        placeholder= "<?php if($check_address < 1){ echo "Postal Code";}?>"
                                        value = "<?php if($check_address >= 1){ echo $address_zip;}?>" required>
                                </div>
                                </div> 
                   
                                <?php
                                }?>
                       

                        
                            
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <input type="submit" class="btn-update"  
                                name="<?php if($check_address < 1){echo "address-submit";} else {echo "address-save";} ?>"
                                value="<?php if($check_address < 1){echo "Add";}else{echo "Update";} ?>"
                                >
                                <?php 
                                    if($check_address >= 1){
                                        echo "<input type='button' class='btn-update btn-view' value='View Address'>";
                                    }
                                ?>

                                <!-- begin Modal -->
                                
                                 <!-- Password Modal -->
                                <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">New Password</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </div>
                                        <div class="modal-body">
                                            <div id="displayResult"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" id="hiddendata">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                </div><!-- END Password Modal -->

                                    <!-- User Modal -->
                                    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle"><div id="displayUserResult"></div></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" id="hiddendata">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div><!-- END User Modal -->

                                  <!-- Modal -->
                                    <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Saved Shipping Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <button type="submit" name="#" class="btn btn-primary btn-add-address" data-dismiss="modal">Add Address</button><br><br>
                                        
                                        <form action="includes/address.inc.php" method="post" id="addressForm">
                                        
                                        <?php

                                                $count = 1;
                                                
                                                $query = mysqli_query($conn, "SELECT * FROM user_account_address WHERE userID = '" . $_SESSION["userID"] . "'");
                                                while($row = mysqli_fetch_array($query))
                                                {
                                                    ?>
                                                    <input type="radio" id="address<?php echo $count ?>" name="address" value="<?php echo $row['addressID'] ?>">
                                                    <label for="address<?php echo $count ?>"><?php echo $row['bldg'], ", ", $row['strt'], ", ", $row['brgy'], ", ", $row['city'], ", ", $row['region'], ", ", $row['zip'], ", ", $row['contactNum'] ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                      
                                                            <!-- <a href="#" style="cursor:pointer;" id="submit-delete-address" class="fa fa-trash delete-icon" name="address-delete"></a> -->
                                                            <!-- <a href="" onclick="subForm('delete-address')" style="cursor:pointer;" id="delete-icon" name="address-delete" class="fa fa-trash delete-icon" ></a> -->
                                                          
                                                        </label><br>
                                                       
                                                    
  
                                                    <?php
                                                    $count += 1;
                                                }
                                            $count -= 1;
                                            ?>
                                              <!-- <button type="submit" name="address-delete"><i class="fa fa-trash"></i></button> -->
                                        </div>
                                        </form>
                                        <div class="modal-footer">
                                            <button type="submit" name="address-delete" class="btn btn-edit btn-danger">Delete</button>
                                            <button type="submit" name="address-select" class="btn btn-success">Set Default</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div> <!--finish Modal -->

                                    <!-- begin Add Address Modal -->
                                  <!-- Modal -->
                                  <form action="includes/address.inc.php" method="post">
                                  <div class="modal fade" id="addAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Add Address</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                                <input type="hidden" id="addUserAddress" name="userID"  class="text-box" value="<?php echo $_SESSION["userID"] ?>" required >
                                                <input type="text" id="addBldg" name="abldg" class="form-control myInput" placeholder="Building and Unit Number" required></br>
                                                <input type="text" id="addStrt" name="astrt" class="form-control myInput" placeholder= "Street" required></br>
                                                <input type="text" id="addBrgy" name="abrgy" class="form-control myInput" placeholder="Barangay" required></br>
                                                <input type="text" id="addCity" name="acity" class="form-control myInput" placeholder="City" required></br>
                                                <input type="text" id="addRegion" name="aregion" class="form-control myInput" placeholder="Province" required></br>
                                                <input type="text" id="addContact" name="acontactNum" class="form-control myInput" placeholder="Phone Number" required></br>
                                                <input type="text" id="addZip" name="azip" class="form-control myInput" placeholder="Postal Code" required></br>
                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" name="#" class="btn btn-secondary btn-back" data-dismiss="modal">Cancel</button>
                                            <button type="submit" name="address-submit-add" class="btn btn-primary">Save</button>
                                        </div>
                                        </div>
                                    </div>
                                    </form>
                                    </div> <!--finish Add Address Modal -->
                            </div>
                        </div>
                        </form>
                        </div>
                    </div> <!--finish card mb-3 mt-0 -->
                </div> <!-- end col-sm-12 -->
            </div> <!--finish row -->
            <?php
                if (isset($_GET["erroraddress"])) {
                    if ($_GET["erroraddress"] == "none") {
                        echo "<script type='text/javascript'>
                
                            Swal.fire({
                                text: 'Shipping Address added Successfully!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            })
                            </script>";
                    }
                }
            ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3 mt-0">
                        <div class="card-body mb-3">
                         <h5 class="d-flex align-items-center mb-3">Change Password</h5>
                         <div class="row mb-3">
                            
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="oldpw" placeholder="Old Password" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="newpw" placeholder="New Password" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                          
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="confpw" placeholder="Re-enter new password" required>
                            </div>
                        </div>
                            
                         
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <input type="button" id="btn-update-pass" class="btn-update" onclick="updatePassword(<?=$_SESSION["userID"]?>)" value="Update">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

              
            </div>
          
        </div>
    </div>
    </div>
    
    <?php
        
        if (isset($_GET["action"])) {
            if ($_GET["action"] == "updatepwsuccess") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Password was updated successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
                
                </script>";
            }
            if ($_GET["action"] == "updatepwnotmatch") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Password does not match! Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
                
                </script>";
            }
            if ($_GET["action"] == "updateoldpwnotmatch") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Password does not match! Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
                
                </script>";
            }
            if ($_GET["action"] == "errorweakpw") {
                echo "<script type='text/javascript'>
                
                Swal.fire({
                    text: 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character (!,@,#,$,%,^)',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
                
                </script>";
            }
        }

    
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="scripts/navbar.js"></script>
    
    <!--FAQs script-->
    <script src="faq.js"></script>

    <!-- <script>

    $(document).ready(function (){
        $('#orderConfirm').on('click',function(e){
            e.preventDefault();

            Swal.fire({
                    title: "Confirm Order?",
                    text: "Please make sure that all details are correct.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#00C851",
                    confirmButtonText: "Place Order",
                    cancelButtonText: "Cancel",
                 }).then((result) => {

                    var oldpw=$('#oldpw').val();
                    var newpw=$('#newpw').val();
                    var confpw=$('#confpw').val();


                 });
        });
    });
            
    </script> -->

    <script>
	
	
    function updateUser(userID){
		var newfullname=$('#newfullname').val();
		var newemail=$('#newemail').val();
		var newusername=$('#newusername').val();
		
		$.post("includes/functions.inc.php", {
			newfullname:newfullname,
			newemail:newemail,
			newusername:newusername,
			userUID:userID
			}, function(data,status){
				$('#userModal').modal('show');
				$('#displayUserResult').html(data);
		});
		
	}
	
	function updatePassword(userID){

		var oldpw=$('#oldpw').val();
		var newpw=$('#newpw').val();
		var confpw=$('#confpw').val();
		
		$.post("includes/functions.inc.php", {
			oldpw:oldpw,
			newpw:newpw,
			confpw:confpw,
			passUID:userID
			}, function(data,status){
				$('#passwordModal').modal('show');
				$('#displayResult').html(data);
				clearText();
		});
		
	}
	
	function clearPassText(){
		$('#oldpw').val("");
		$('#newpw').val("");
		$('#confpw').val("");
	}
		
    </script>


    <!-- View modal script -->
    <script>
    
        $(document).ready(function (){

            $('.btn-view').on('click',function(){

                $('#addressModal').modal('show');
            
            });

            $('.btn-edit').on('click',function(){

                $('#addressModal').modal('hide');

            });

            $('.btn-add-address').on('click',function(){

                $('#addAddressModal').modal('show');
                $('#AddressModal').modal('hide');

            });

            // $('#submit-delete-address').click(function(){
            //     document.getElementById("addressForm").submit();
            // });
        });

        function addAddress(){
            var addUserAddress=$('#addUserAddress').val();
            var addBldg=$('#addBldg').val();
            var addStrt=$('#addStrt').val();
            var addBrgy=$('#addBrgy').val();
            var addCity=$('#addCity').val();
            var addRegion=$('#addRegion').val();
            var addContact=$('#addContact').val();
            var addZip=$('#addZip').val();

            $.ajax({
                url:"includes/address.inc.php",
                type:"post",
                data:{
                    addUserAddress:addUserAddress,
                    addBldg:addBldg,
                    addStrt:addStrt,
                    addBrgy:addBrgy,
                    addCity:addCity,
                    addRegion:addRegion,
                    addContact:addContact,
                    addZip:addZip

                },
                success:function(data,status){
                    console.log(status);
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

 <!--Footer Section-->
 <footer class="footer">
    <div class="row">
        <!--Logo-->   
        <div class="col-lg-3 col-md-6 col sm-6">
            <div class="footer-about">
                <h3>We're here to help</h3>
                <p><a href="contact.php">Get in touch</a> with our customer service team.</p>
                <img src="img/mop.png">
            </div>
        </div>

        <!--About-->
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
            <div class="footer-widget">
                <h6>ABOUT</h6>
                <ul class="social-icon">
                <li><a href="about.php">PolaChrome</a></li>
                <li><a href="about.php">Polaroid Features</a></li>
                <li><a href="about.php">Comparison Chart</a></li>
                </ul>
            </div>
        </div>

        <!--Follow us-->
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
            <div class="footer-widget">
                <h6>FOLLOW US</h6>
                <ul class="social-icon">
                    <li><a href="https://www.facebook.com/PolaChrome/"><i class="fab fa-facebook"></i> PolaChrome</i></a></li>
                    <li><a href="https://www.instagram.com/pola.chrome/"><i class="fab fa-instagram-square"></i> PolaChrome</i></a></li>
                </ul>
            </div>
        </div>

        <!--Certificates-->
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
            <div class="footer-widget">
                <h6>CERTIFICATES</h6>
                <div class="dti-logo">
                    <img src="img/dti.png">
                </div>       
            </div>
        </div>
    </div>

    <!--Copyright-->
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="footer-copyright-text">
                <p>Copyright &copy; 2022 All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!--End of footer section-->

</html>