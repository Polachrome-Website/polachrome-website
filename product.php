
   <?php
    $active='Product';
    include("includes/header.php");
   ?>
    <head>
        <title>Products</title>
      
        <!--Main css-->
        <link rel="stylesheet" href="styles/product-new.css">
        <style>
            .isDisabled{
                color: currentColor;
                cursor: not-allowed;
                opacity: 0.5;
                text-decoration: none;
                pointer-events: none;
                cursor: not-allowed;
                opacity: 0.5;
                }
        </style>
    </head>

        <!--Body-->
       <div class="container">
           <h1>Products</h1>
           <form action="includes/search.inc.php" method="post">
            <input type="text" id="search_text" name="search-txt" class="search-data" placeholder="What are you looking for..." required>
            <button type="submit" name="submit-search" class="fas fa-search"></button>
          </form>
            <div class="row" id="row-products">
                
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

                        $proQty = $row_products['quantity'];

                        $prodImg1 = $row_products['prodImg1'];


                        if($proQty != 0){
                        echo "
                    
                            <div class='col'>
                                <a href='product-info.php?prodID=$prodID' class='card'>
                            <div class='prod-img img-fluid' style='background-image: url(admin_area/product_images/$prodImg1);'></div>
                                <h6>$prodName</h2>
                                <h6>₱$prodPrice </h6>
                                </a>
                            </div>
                     
                        ";}
                        else{
                            echo "
                    
                            <div class='col isDisabled'>
                                <a href='product-info.php?prodID=$prodID' class='card' aria-disabled='true'>
                            <div class='prod-img img-fluid' style='background-image: url(admin_area/product_images/$prodImg1);'></div>
                                <h6>$prodName</h6>
                                <h6>₱$prodPrice </h6>
                                <h6 style='color:red;'>Out of Stock</h6>
                                </a>
                            </div>
                     
                        ";}
                        }
                    
                ?>
              
            </div>  <!-- row Finish -->

            <center>
                <div class="row">
                   <ul class="pagination"> <!-- pagination Begin -->

                   <?php

                   $query = "select * from products";

                   $result = mysqli_query($conn,$query);

                   $total_records = mysqli_num_rows($result);

                   $total_pages = ceil($total_records / $per_page);

                        echo "
                        
                            <li class='page-item'>

                                <a href='product.php?page=1'>".'First Page'."</a>

                            </li>
                        
                        ";

                        for($i=1; $i<=$total_pages; $i++){

                            echo "
                        
                            <li class='page-item'>

                                <a href='product.php?page=".$i."'>".$i."</a>

                            </li>
                        
                        ";
                            
                        };
                        
                        echo "
                        
                        <li class='page-item'>

                            <a href='product.php?page=$total_pages'>".'Last Page'."</a>

                        </li>
                    
                    ";

                    ?>

                    </ul>
                    </div>
            
        </div> <!-- container Finish -->

                        
        <!--Bootsrap JS cdn-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="scripts/navbar.js"></script>
        <script src="scripts/cart-dropdown.js"></script>
        <script>
            link.addEventListener('click', function (event) {
                if (this.parentElement.classList.contains('isDisabled')) {
                    event.preventDefault();
                }
            });

        </script>
        <script>
                     
        </script>

    

    </body>
    <?php
        include("includes/footer.php");

    ?>
        
</html>