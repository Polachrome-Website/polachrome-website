<?php
    include "db.php";

    // $input = $_POST['search'];
    // $input = preg_replace("#[^0-9a-z]#i","",$input);
/* 
    if(isset($_POST['submit-search'])){
        $input = $_POST['search-txt'];

        $sql = "SELECT * from products WHERE prodName LIKE '{$input}%'";

        $result = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($result);

        if($count == 0){
            echo "walang products";
        }
    } */
	
	if(isset($_POST['search'])){
		
		
		$cards = '<h1>Products</h1>
            <div class="form">
            <input type="search" id="search_text" name="search-txt" class="search-data" placeholder="What are you looking for..." required>
            <button class="fas fa-search" onclick="displayData()"></button>
            </div>
            <div class="row" id="row-products">';
		// try {
			
			$per_page = 12;

			if(isset($_GET['page'])){
						
				$page = $_GET['page'];
				
			}else{
				
				$page=1;
				
			}
			
			$start_from = ($page-1) * $per_page;
	
			$search= $_POST['search'];
			$get_products = "select * from products where prodName like '%".$search."%'  order by 1 DESC LIMIT $start_from,$per_page";
			$run_products = mysqli_query($conn,$get_products);
			while($row_products=mysqli_fetch_array($run_products)){
                                
				$prodID = $row_products['prodID'];
	
				$prodName = $row_products['prodName'];
	
				$prodPrice = $row_products['price'];
	
				$proQty = $row_products['quantity'];
	
				$prodImg1 = $row_products['prodImg1'];
	
	
				if($proQty != 0){
				$cards .= "
				
					<div class='col'>
						<a href='product-info.php?prodID=$prodID' class='card'>
					<div class='prod-img img-fluid' style='background-image: url(admin_area/product_images/$prodImg1);'></div>
						<p>$prodName</p>
						<h6>₱$prodPrice </h6>
						</a>
					</div>
				
				";}
				else{
					$cards .= "
				
					<div class='col isDisabled'>
						<a href='product-info.php?prodID=$prodID' class='card' aria-disabled='true'>
					<div class='prod-img img-fluid' style='background-image: url(admin_area/product_images/$prodImg1);'></div>
						<p>$prodName</p>
						<h6>₱$prodPrice </h6>
						<h6 style='color:red;'>Out of Stock</h6>
						</a>
					</div>
				
				";}
			}
			$cards .= '</div>
				<center>
                <div class="pagination">
                   <ul class="pagination"> <!-- pagination Begin -->';


                   $query = "select * from products where prodName like '%".$search."%'";

                   $result = mysqli_query($conn,$query);

                   $total_records = mysqli_num_rows($result);

                   $total_pages = ceil($total_records / $per_page);

                        $cards .= "
                        
                            <li class='page-item first numb'>

                                <a href='product.php?page=1' style='display:block; color:black;'>".'First'."</a>

                            </li>
                        
                        ";

                        for($i=1; $i<=$total_pages; $i++){

                            $cards .= "
                        
                            <li class='page-item numb'>

                                <a class='page-item numb' style='display:block; color:black;' href='product.php?page=".$i."'>".$i."</a>

                            </li>
                        
                        ";
                            
                        };
                        
                        $cards .= "
                        
                        <li class='page-item numb'>

                            <a href='product.php?page=$total_pages' style='display:block; color:black;'>".'Last'."</a>

                        </li>
                    
                    ";


                $cards .= '</ul>
                </div>
            
        </div>';
		/* }catch(Exception e) {
			
		} */
		echo $cards;
	}
?>

