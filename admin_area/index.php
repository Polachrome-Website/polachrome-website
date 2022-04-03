<?php 

    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('../login.php','_self')</script>";
        
    }else{

        //begin fetch ADMIN deets
        $admin_session = $_SESSION['admin_email'];

        $get_admin = "select * from admin where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($conn,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);

        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_username'];

        $admin_email = $row_admin['admin_email'];
        //finish fetch ADMIN deets

        //begin fetch PRODUCT deets

        $get_products = "select * from products";
        
        $run_products = mysqli_query($conn,$get_products);
        
        $count_products = mysqli_num_rows($run_products);

        //finish fetch PRODUCT deets

        //begin fetch PRODUCT CATERGORIES deets

        $get_p_categories = "select * from categories";
        
        $run_p_categories = mysqli_query($conn,$get_p_categories);
         
        $count_p_categories = mysqli_num_rows($run_p_categories);
 
        //finish fetch PRODUCT CATERGORIES deets 

        //begin fetch USERS deets

        $get_customers = "select * from user_account";
        
        $run_customers = mysqli_query($conn,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);

        //finish fetch USERS deets

        //begin fetch ORDER deets

        $get_pending_orders = "select * from tbl_orders";
        
        $run_pending_orders = mysqli_query($conn,$get_pending_orders);
        
        $count_pending_orders = mysqli_num_rows($run_pending_orders);

        //finish fetch ORDER deets

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Polachrome Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }   if(isset($_GET['insert_product'])){
                        
                        include("insert_product.php");
                    
                }    if(isset($_GET['add_variation'])){
                        
                        include("insert_product_variation.php");
                
                }  
                    if(isset($_GET['view_products'])){
                        
                        include("admin_products.php");

                }  if(isset($_GET['view_registered'])){
                        
                        include("admin_user_view.php");

                }   if(isset($_GET['view_orders'])){
                        
                        include("admin_orders_view.php");
                }   
                
                
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>


<?php } ?>