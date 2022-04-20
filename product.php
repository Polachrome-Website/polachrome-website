
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
       <div class="container" id="container-products">
           <h1>Products</h1>
           <div class="form">
                <input type="text" id="search_text" name="search-txt" class="search-data" placeholder="What are you looking for..." required>
                <button class="fas fa-search" onclick="displayData()"></button>
            </div>
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
                <div class="pagination">
                   <ul class="pagination"> <!-- pagination Begin -->

                   <?php

                   $query = "select * from products";

                   $result = mysqli_query($conn,$query);

                   $total_records = mysqli_num_rows($result);

                   $total_pages = ceil($total_records / $per_page);

                        echo "
                        
                            <li class='page-item first numb'>

                                <a href='product.php?page=1' style='display:block; color:black;'>".'First'."</a>

                            </li>
                        
                        ";

                        for($i=1; $i<=$total_pages; $i++){

                            echo "
                        
                            <li class='page-item numb'>

                                <a class='page-item numb' style='display:block; color:black;' href='product.php?page=".$i."'>".$i."</a>

                            </li>
                        
                        ";
                            
                        };
                        
                        echo "
                        
                        <li class='page-item numb'>

                            <a href='product.php?page=$total_pages' style='display:block; color:black;'>".'Last'."</a>

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
        <!-- <script src="scripts/product-pagination.js"></script> -->
        <!-- <script>
            link.addEventListener('click', function (event) {
                if (this.parentElement.classList.contains('isDisabled')) {
                    event.preventDefault();
                }
            });

        </script>
        <script>
              // selecting required element
                const element = document.querySelector(".pagination ul");
                let totalPages = <?php echo $total_pages ?>;
                let page = 1;

                //calling function with passing parameters and adding inside element which is ul tag
                element.innerHTML = createPagination(totalPages, page);
                function createPagination(totalPages, page){
                let liTag = '';
                let active;
                let beforePage = page - 1;
                let afterPage = page + 1;
                if(page > 1){ //show the next button if the page value is greater than 1
                    liTag += `<li class="btn prev" onclick="createPagination(totalPages, ${page - 1})"><span><i class="fas fa-angle-left"></i> Prev</span></li>`;
                }

                if(page > 2){ //if page value is less than 2 then add 1 after the previous button
                    liTag += `<li class="first numb" onclick="createPagination(totalPages, 1)"><span>1</span></li>`;
                    if(page > 3){ //if page value is greater than 3 then add this (...) after the first li or page
                    liTag += `<li class="dots"><span>...</span></li>`;
                    }
                }

                // how many pages or li show before the current li
                if (page == totalPages) {
                    beforePage = beforePage - 2;
                } else if (page == totalPages - 1) {
                    beforePage = beforePage - 1;
                }
                // how many pages or li show after the current li
                if (page == 1) {
                    afterPage = afterPage + 2;
                } else if (page == 2) {
                    afterPage  = afterPage + 1;
                }

                for (var plength = beforePage; plength <= afterPage; plength++) {
                    if (plength > totalPages) { //if plength is greater than totalPage length then continue
                    continue;
                    }
                    if (plength == 0) { //if plength is 0 than add +1 in plength value
                    plength = plength + 1;
                    }
                    if(page == plength){ //if page is equal to plength than assign active string in the active variable
                    active = "active";
                    }else{ //else leave empty to the active variable
                    active = "";
                    }
                    liTag += `<li class="numb ${active}" onclick="createPagination(totalPages, ${plength})"><span>${plength}</span></li>`;
                }

                if(page < totalPages - 1){ //if page value is less than totalPage value by -1 then show the last li or page
                    if(page < totalPages - 2){ //if page value is less than totalPage value by -2 then add this (...) before the last li or page
                    liTag += `<li class="dots"><span>...</span></li>`;
                    }
                    liTag += `<li class="last numb" onclick="createPagination(totalPages, ${totalPages})"><span>${totalPages}</span></li>`;
                }

                if (page < totalPages) { //show the next button if the page value is less than totalPage(20)
                    liTag += `<li class="btn next" onclick="createPagination(totalPages, ${page + 1})"><span>Next <i class="fas fa-angle-right"></i></span></li>`;
                }
                element.innerHTML = liTag; //add li tag inside ul tag
                return liTag; //reurn the li tag
                }       
        </script> -->
        
        <script>
		function displayData(){
			var search=$('#search_text').val();
			$.ajax({
				url:"includes/search.inc.php",
				type:'post',
				data:{
					search: search
				},
				success:function(data,status){
					$('#container-products').html(data);
				}
			})
		}
	</script>

    

    </body>
    <?php
        include("includes/footer.php");

    ?>
        
</html>