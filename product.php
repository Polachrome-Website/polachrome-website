
   <?php
    $active='Product';
    include("includes/header.php");
   ?>
    <head>
        <title>Products</title>
      
        <!--Main css-->
        <link rel="stylesheet" href="styles/product.css">
    </head>

        <!--Body-->
       <div class="container">
           <h1>Products</h1>
              
            <div class="row"> <!-- row Begin -->
                
                <?php

            
                    $per_page = 12;

                    if(isset($_GET['page'])){
                                
                        $page = $_GET['page'];
                        
                    }else{
                        
                        $page=1;
                        
                    }
                    
                    $start_from = ($page-1) * $per_page;

                    
                    $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";

                    $run_products = mysqli_query($conn,$get_products);

                    while($row_products=mysqli_fetch_array($run_products)){
                                
                        $prodID = $row_products['prodID'];

                        $prodName = $row_products['prodName'];

                        $prodPrice = $row_products['price'];

                        $prodImg1 = $row_products['prodImg1'];
                        
                        echo "
                        
                            <div class='col-md-3 col-sm-6 my-3 my-md-0 '>

                             <div class='card shadow'>
                                <div>
                                <a href='product-info.php?prodID=$prodID'>
                                <img src='admin_area/product_images/$prodImg1' class='prod-img img-fluid'/>
                                </div>
                                  
                                    <div class='card-body'>
                                    
                                    <h6 class='card-title'> $prodName </h6>

                                    <h6 class='card-text'> ₱$prodPrice </h6>
                                    </div>
                                </div>
                            </div>                              
                        ";
                    }
                ?>
        
        </div> <!-- row Finish -->


        <!--Bootsrap JS cdn-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="scripts/navbar.js"></script>
    

    </body>
        
</html>