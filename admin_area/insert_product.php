<?php 

if(!isset($_SESSION['admin_email'])){
        
    echo "<script>window.open('login.php','_self')</script>";
    
}else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Insert Product</title>
	<meta name="viewport" conntent="width=device-width, initial-scale=1.0">
</head>

<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Insert Product 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_name" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Product Quantity </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="product_quantity" type="text" class="form-control" onkeydown="return validateIsNumericInput(event)" required>
                          
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Product Information </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <textarea name="product_info" cols="19" rows="6" class="form-control" required></textarea>
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Category </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <select name="product_category" class="form-control" required><!-- form-control Begin -->
                               
                               <option> Select a Category </option>
                               
                               <?php 
                               
                               $get_cat = "select * from categories";
                               $run_cat = mysqli_query($conn,$get_cat);
                               
                               while ($row_cat=mysqli_fetch_array($run_cat)){
                                   
                                   $catID = $row_cat['catID'];
                                   $catTitle = $row_cat['catTitle'];
                                   
                                   echo "
                                   
                                   <option value='$catID'> $catTitle </option>
                                   
                                   ";
                                   
                               }
                               
                               ?>
                               
                           </select><!-- form-control Finish -->
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Product Price </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="product_price" type="text" class="form-control" required>
                           
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
                          
                          <input name="product_img2" type="file" class="form-control" accept="image/*"  required>
                          
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
                          
                          <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
        
    <script src="js/jquery-331.min.js"></script>
    <!-- <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script> -->
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

        $product_category = $_POST['product_category'];
        $product_name = $_POST['product_name'];
        $product_info = $_POST['product_info'];
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

        if(in_array($file1ActualExt, $allowed) && in_array($file2ActualExt, $allowed) ){
        if($img1Error === 0 && $img2Error === 0 && $img3Error === 0 && $img4Error === 0 && $img5Error === 0){
            if($file1Size <= 5000000 && $file2Size <= 5000000 && $file3Size <= 5000000 && $file4Size <= 5000000 && $file5Size <= 5000000){
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

            $sql = "INSERT INTO products (prodName,catID,prodInfo,prodImg1,prodImg2,prodImg3,prodImg4,prodImg5,quantity,price) VALUES (?,?,?,?,?,?,?,?,?,?);"; 
            $stmt = mysqli_stmt_init($conn);
    
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: /insert_product.php?error=stmtfailed");
                exit();
            }
    
            mysqli_stmt_bind_param($stmt, "sissssssss", $product_name, $product_category, $product_info, $product_img1, $product_img2, $product_img3, $product_img4, $product_img5, $product_quantity, $product_price);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
    
            echo "<script>alert('Product has been inserted sucessfully')</script>";
            echo "<script>window.open('index.php?insert_product','_self')</script>";

            }else{
                echo "<script>alert('File size too large')</script>";
            }
        }else{
            echo "<script>alert('There was an error uploading your file. Please follow the guidelines stated, ensure to upload correct image format (jpg, jpeg, png, webp) and a file size of less than 5MB.')</script>";

        }
    
        }else{
            echo "<script>alert('There was an error uploading your file. Please follow the guidelines stated, ensure to upload correct image format (jpg, jpeg, png, webp) and a file size of less than 5MB.')</script>";
        }
     
        
    }
    
} catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();

}

?>

<?php } ?>

