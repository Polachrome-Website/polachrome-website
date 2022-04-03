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
                           
                           <select name="product_name" class="form-control"><!-- form-control Begin -->
                               
                               <option> Select a Product </option>
                               
                               <?php 
                               
                               $get_var = "select * from products ORDER BY prodName";
                               $run_var = mysqli_query($conn,$get_var);
                               
                               while ($row_var=mysqli_fetch_array($run_var)){
                                   
                                   $prodID = $row_var['prodID'];
                                   $prodName = $row_var['prodName'];
                                   
                                   echo "
                                   
                                   <option value='$prodName'> $prodName </option>
                                   
                                   "; 
                               }
                               
                               ?>
                                <input type="hidden" name="prodID"  class="text-box" value="<?php echo $prodID ?>">
                               
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
                           
                           <input name="product_quantity" type="text" class="form-control" required>
                           
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
                          
                          <input name="product_img1" type="file" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img2" type="file" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
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

</body>
</html>


<?php 

try {
    if(isset($_POST['submit'])){

        $prodID = $_POST['prodID'];
        $product_variation = $_POST['product_variation'];
        $product_quantity = $_POST['product_quantity'];
        $product_price = $_POST['product_price'];
        
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];
        
        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];
        
        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");

        // echo "<p>$product_category </p>";

        // $insert_product = "insert into products (catID,prodName,prodInfo,prodImg1,prodImg2,prodImg3,quantity,price) values 
        // ('$product_category','$product_name','$product_info','$product_img1','$product_img2','$product_img3','$product_quantity','$product_price')";
        
        // $run_product = mysqli_query($conn,$insert_product);

        // if($run_product){

         
            
        // }

        $sql = "INSERT INTO product_variation (prodID,prodVariation,prodImg1,prodImg2,prodImg3,quantity,price) VALUES (?,?,?,?,?,?,?);"; 
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: /insert_product_variation.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sssssss", $prodID, $product_variation, $product_img1, $product_img2, $product_img3, $product_quantity, $product_price);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo "<script>alert('Variation has been added sucessfully')</script>";
        echo "<script>window.open('insert_product.php','_self')</script>";
       
    }
    
} catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();

}


?>