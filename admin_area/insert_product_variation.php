<?php 

include("includes/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Insert Product Variation</title>
	<meta name="viewport" conntent="width=device-width, initial-scale=1.0">

</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Variation
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Insert Variation 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
			   
					<div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Product Name </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
					   
                           <select name="prodID" class="form-control"><!-- form-control Begin -->
                               
								<option> Select a Product </option>
								
								<?php 
								
								$get_var = "select * from products ORDER BY prodName";
								$run_var = mysqli_query($conn,$get_var);
								
								while ($row_var=mysqli_fetch_array($run_var)){
									
									$prodID = $row_var['prodID'];
									
									$prodName = $row_var['prodName'];
									
									?>
									<option name="prodID" value='<?=$prodID?>'> <?=$prodName?> </option>
									
									
									<?php
								}
								
								?>
                           </select><!-- form-control Finish -->
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
				   
				   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Variation Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_variation" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Product Quantity </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="product_quantity" type="text" class="form-control"  onkeydown='return validateIsNumericInput(event)' required>
                           <!-- <h6 style="color:red;"><i>***does not accept 0 as value</i></h6>  -->

                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Product Price </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="product_price" type="text" class="form-control"  onkeydown='return validateIsNumericInput(event)' required>
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
    
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img1" type="file" class="form-control" accept="image/*"  required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img2" type="file" accept="image/*"  class="form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img3" type="file" accept="image/*"  class="form-control form-height-custom">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Product Image 4 </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="product_img4" type="file" accept="image/*" class="form-control form-height-custom">
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Product Image 5 </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="product_img5" type="file" accept="image/*" class="form-control form-height-custom">

                           <h6 style="color:red;"><i>Notes: Image files only. Max size - 5MB. Preferred Resolution - 800x800px </i></h6> 
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Add Variation" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
        
    <script src="js/jquery-331.min.js"></script>

    <script>

    /**
    Checks the ASCII code input by the user is one of the following:
        - Between 48 and 57: Numbers along the top row of the keyboard
        - Between 96 and 105: Numbers in the numeric keypad
        - Either 8 or 46: The backspace and delete keys enabling user to change their input
        - Either 37 or 39: The left and right cursor keys enabling user to navigate their input
    */

    function validateIsNumericInput(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        permittedKeys = [8, 46, 37, 39]
        if ((ASCIICode >= 48 && ASCIICode <= 57) || (ASCIICode >= 96 && ASCIICode <= 105)) {
            return true;
        };
        if (permittedKeys.includes(ASCIICode)) {
            return true;
        };
        return false;
    }

    function validateIsNumericInputQuantity(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        permittedKeys = [8, 46, 37, 39]
        if ((ASCIICode >= 49 && ASCIICode <= 57) || (ASCIICode >= 97 && ASCIICode <= 105)) {
            return true;
        };
        if (permittedKeys.includes(ASCIICode)) {
            return true;
        };
        return false;
    }

    </script>


</body>
</html>


<?php 

try {
    if(isset($_POST['submit'])){

        $prodID = $_POST['prodID'];
        $product_variation = $_POST['product_variation'];
        $product_quantity = $_POST['product_quantity'];
        $product_price = $_POST['product_price'];
        
        //image process

        $allowed = array('jpg', 'jpeg', 'png', 'webp', 'jfif', 'tfif');
        
        $product_img1 = $_FILES['product_img1']['name'];
        $img1Error = $_FILES['product_img1']['error'];
        $file1Size = $_FILES['product_img1']['size'];
        $file1Ext = explode('.', $product_img1);
        $file1ActualExt = strtolower(end($file1Ext));
        

        $product_img2 = $_FILES['product_img2']['name'];
        $img2Error = $_FILES['product_img2']['error'];
        $file2Size = $_FILES['product_img2']['size'];
        $file2Ext = explode('.', $product_img2);
        $file2ActualExt = strtolower(end($file2Ext));

        $product_img3 = $_FILES['product_img3']['name'];
        $img3Error = $_FILES['product_img3']['error'];
        $file3Size = $_FILES['product_img3']['size'];

        $product_img4 = $_FILES['product_img4']['name'];
        $img4Error = $_FILES['product_img4']['error'];
        $file4Size = $_FILES['product_img4']['size'];

        $product_img5 = $_FILES['product_img5']['name'];
        $img5Error = $_FILES['product_img5']['error'];
        $file5Size = $_FILES['product_img5']['size'];

            $temp_name1 = $_FILES['product_img1']['tmp_name'];
            $temp_name2 = $_FILES['product_img2']['tmp_name'];
            $temp_name3 = $_FILES['product_img3']['tmp_name'];
            $temp_name4 = $_FILES['product_img4']['tmp_name'];
            $temp_name5 = $_FILES['product_img5']['tmp_name'];
            
            move_uploaded_file($temp_name1,"product_images/$product_img1");
            move_uploaded_file($temp_name2,"product_images/$product_img2");
            move_uploaded_file($temp_name3,"product_images/$product_img3");
            move_uploaded_file($temp_name4,"product_images/$product_img4");
            move_uploaded_file($temp_name5,"product_images/$product_img5");

            $sql = "INSERT INTO product_variation (prodID,prodVariation,prodImg1,prodImg2,prodImg3,prodImg4,prodImg5,quantity,price) VALUES (?,?,?,?,?,?,?,?,?);"; 
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: /insert_product_variation.php?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "sssssssss", $prodID, $product_variation, $product_img1, $product_img2, $product_img3, $product_img4, $product_img5, $product_quantity, $product_price);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo "<script>alert('Variation has been added sucessfully')</script>";
            echo "<script>window.open('index.php?add_variation','_self')</script>";

            }
    
    
} catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();

}


?>