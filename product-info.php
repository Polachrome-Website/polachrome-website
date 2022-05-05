<?php
    include("includes/header.php");
   

    // if (isset($_POST['add-cart'])){
    //      print_r($_POST['productID']);
    //     if(isset($_SESSION['cart'])){

    //       $item_array_id = array_column($_SESSION['cart'],"productID"); //return array of productID

    //       if(in_array($_POST['productID'],$item_array_id)){
    //         echo "<script> alert('Product already added in cart') </script>";
    //         echo "<script> window.location = product-info.php </script>";

    //       }else{
    //         $count = count($_SESSION['cart']);
    //         $item_array = array(
    //           $product_id = $_POST['productID']
    //         );
            
    //         $_SESSION['cart'][$count] = $item_array;
    //         print_r($_SESSION['cart']);
    //       }

    //     }else{
    //       $item_array = array(
    //         $product_id = $_POST['productID']
    //       );

    //       //create new session variable
    //       $_SESSION['cart'][0] = $item_array;
    //       print_r($_SESSION['cart']);
    //     }

    // }

?>

    <title>Product - <?php echo $pro_title; ?></title>

    <link rel="stylesheet" href="styles/product-info.css">
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
  <body>

    <!--Body-->

    <?php 
    
    if(isset($_SESSION['userID'])){
          add_cart();
    }
    if(!isset($_SESSION['userID'])){
          add_cart_guest();
    }
      //setting form action if product has variation
      $action = '';

    ?>
    <?php
	if(isset($_GET['varID'])){?>
    <form action="product-info.php?action=add_cart&code=<?php echo $product_id;?>&varcode=<?php echo $var_id;?>" method="post">
	<?php
	}else{?>
		<form action="product-info.php?action=add_cart&code=<?php echo $product_id;?>" method="post">
	<?php } ?>

    <div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "admin_area/product_images/<?php echo $pro_img1; ?>" alt = "polaroid lab">
              <img src = "admin_area/product_images/<?php echo $pro_img2; ?>" alt = "polaroid lab">
              <?php
                if($pro_img3 != null){
                  echo "<img src = 'admin_area/product_images/$pro_img3' alt = 'polaroid lab'>";
                }
              ?>
              <?php
                if($pro_img4 != null){
                  echo "<img src = 'admin_area/product_images/$pro_img4' alt = 'polaroid lab'>";
                }
              ?>
              <?php
                if($pro_img5 != null){
                  echo "<img src = 'admin_area/product_images/$pro_img5' alt = 'polaroid lab'>";
                }
              ?>
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "admin_area/product_images/<?php echo $pro_img1; ?>" alt = "polaroid lab">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src = "admin_area/product_images/<?php echo $pro_img2; ?>" alt = "polaroid lab">
              </a>
            </div>
            <div class = "img-item">
            <?php
              if($pro_img3 != null){
                  echo "
                  <a href = '#' data-id = '3' style='all:unset'>
                  <img src = 'admin_area/product_images/$pro_img3' alt = 'polaroid lab'>
                  ";
                }else{
              ?>
               <!-- Do not display img select #3 -->
             <?php } ?>
            </div>
            <div class = "img-item">
            <?php
              if($pro_img4 != null){
                  echo "
                  <a href = '#' data-id = '4' style='all:unset';>
                  <img src = 'admin_area/product_images/$pro_img4' alt = 'polaroid lab'>
                  ";
                }
                else{
              ?>
              <!-- Do not display img select #4 -->
              <?php } ?>
            </div>
            <div class = "img-item">
            <?php
              if($pro_img5 != null){
                  echo "
                  <a href = '#' data-id = '5' style='all:unset';>
                  <img src = 'admin_area/product_images/$pro_img5' alt = 'polaroid lab'>
                  ";
                }
                else{
              ?>
              <!-- Do not display img select #5 -->
              <?php } ?>
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title"> <?php echo $pro_title; ?></h2>
          <div class = "product-rating">
            <?php if($cat_id == '3'){
              echo "<span>Available for Pre-Order</span>";
            }else{
              echo "<span>Product is Available</span>";
            } 
            ?>
            
          </div>

        <!--From price to add to cart-->
        <div class="product-price">
            <p class="price-pro"><span>₱<?php echo $pro_price; ?></span></p>
            <p class="stocks">
            <?php if($pro_quantity <=5 ){echo $pro_quantity . " stocks left!";}  
            ?>
            </i></p>
            <?php
             if($pro_quantity > 5 ){
            ?>
            <p class="stocks-greater"><?php echo $pro_quantity; ?> items available. </p>
            <?php } ?>
        </div>  

        <!--quantity-->
        <div class = "purchase-info">
            <div class="qty">
                <p>Quantity<p></p>
                <input type = "number" name= "product_qty" class="input-qty" min = "1" max="<?php echo "$pro_quantity" ?>" value = "1">
            </div>
            <!--variation-->
            <div class="color-var">
            <?php
                $action = '';
                $prod_id = $_GET["prodID"];
                $query = "SELECT * FROM product_variation WHERE prodID = '$prod_id'";
                $run_query = mysqli_query($conn,$query);
                $count = mysqli_num_rows($run_query);

                while($row_var = mysqli_fetch_array($run_query)){
                      $var_id = $row_var["varID"];
                }

                if($count==0){
                 echo  "<p style='margin-top:5px; border-top: solid 1px black;''>";
                 $action = "product-info.php?action=add_cart&code=<?php echo $product_id;?>";
                }else{ 
                 $action = "product-info.php?action=add_cart&code=<?php echo $product_id;?>&var=<?php echo $var_id ?>";
            ?>
            <p style="margin-top:5px; border-top: solid 1px black;">Variation: 
			<button class="circle" onclick="location.href='https://polachrome.herokuapp.com/product-info.php?prodID=<?php echo $_GET["prodID"] ?>'" type="button">
      <?php if($pro_title === 'Go Film'){echo "White Frame";} 
            elseif($pro_title === 'Polaroid Go Instant Camera'){echo "Black";}
            elseif($pro_title === 'Polaroid Now Instant Camera'){echo "Black";}
            elseif($pro_title === 'Polaroid Now+ Instant Camera'){echo "Black";} 
            elseif($pro_title === 'Polaroid SX-70 SLR'){echo "SX-70 Original";} 
            elseif($pro_title === 'Photo Album'){echo "Small (40 Photos)";} 
            elseif($pro_title === 'Camera Strap - Flat'){echo "Yellow";} 
            elseif($pro_title === 'Camera Strap - Round'){echo "Yellow";} 
              else{echo "Default";} ?>
      </button>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM product_variation WHERE prodID = '" . $_GET["prodID"] . "'");
					while($row = mysqli_fetch_array($query))
					{
            $var_quantity = $row["quantity"];
						?>
						<button <?php if($var_quantity >0){echo "class='circle'";} if($var_quantity == 0){echo "class='circle isDisabled'";} ?> 
            onclick="location.href='https://polachrome.herokuapp.com/product-info.php?prodID=<?php echo $_GET["prodID"] ?>&varID=<?php echo $row["varID"] ?>'" type="button"><?php echo $row["prodVariation"] ?></button>
    
						<?php
					}
        }
				?>
         
				</p>
              
            </div>
        </div>
        
        <?php 
           if(isset($_SESSION['admin_email'])){
            
          }else{
        ?>
        <button type = "submit" name = "add_cart" class = "add-to-card-btn">Add to Cart <i class = "fas fa-shopping-cart"></i></button>
        <input type='hidden' name='productID' value="<?php echo $product_id; ?>">
        </form>
        <?php } ?>
          <!--Product information-->
          <div class = "product-detail">
            <br><br><br>
            <h2>Product Description</h2>
            <!-- <p>Product number: <?php echo $product_id; ?></p> -->

            <p>
            <?php echo $pro_desc; ?>
            </p>

          </div>
        </div>
      </div>
    </div>
  </form>
    <!--End of Body-->
    
    <!--Bootsrap JS cdn-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!--Other scripts-->
    <script src="scripts/product-info.js"></script>
    <script src="scripts/navbar.js"></script>

    <?php include("includes/footer.php") ?>
  </body>

</html>