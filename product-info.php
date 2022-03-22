<?php
    include("includes/header.php");


    if (isset($_POST['add-cart'])){
        //  print_r($_POST['productID']);
        if(isset($_SESSION['cart'])){

          $item_array_id = array_column($_SESSION['cart'],"productID"); //return array of productID

          if(in_array($_POST['productID'],$item_array_id)){
            echo "<script> alert('Product already added in cart') </script>";
            echo "<script> window.location = product-info.php </script>";

          }else{
            $count = count($_SESSION['cart']);
            $item_array = array(
              $product_id = $_POST['productID']
            );
            
            $_SESSION['cart'][$count] = $item_array;
            print_r($_SESSION['cart']);
          }

        }else{
          $item_array = array(
            $product_id = $_POST['productID']
          );

          //create new session variable
          $_SESSION['cart'][0] = $item_array;
          print_r($_SESSION['cart']);
        }

    }
	
	

?>

    <title>Product - <?php echo $pro_title; ?></title>

    <link rel="stylesheet" href="styles/product-info.css">

  </head>
  <body>

    <!--Body-->
    <div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "admin_area/product_images/<?php echo $pro_img1; ?>" alt = "polaroid lab">
              <img src = "admin_area/product_images/<?php echo $pro_img1; ?>" alt = "polaroid lab">
              <img src = "admin_area/product_images/<?php echo $pro_img2; ?>" alt = "polaroid lab">
              <img src = "admin_area/product_images/<?php echo $pro_img3; ?>" alt = "polaroid lab">
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
                <img src = "admin_area/product_images/<?php echo $pro_img1; ?>" alt = "polaroid lab">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
                <img src = "admin_area/product_images/<?php echo $pro_img2; ?>" alt = "polaroid lab">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
                <img src = "admin_area/product_images/<?php echo $pro_img3; ?>" alt = "polaroid lab">
              </a>
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title"> <?php echo $pro_title; ?></h2>
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.9(105)</span>
          </div>

        <!--From price to add to cart-->
        <div class = "product-price">
            <p class = "price"><span>₱<?php echo $pro_price; ?></span></p>
            <p class = "stocks"><span><?php echo $pro_quantity; ?> stocks left!</span></p>
        </div>  

        <!--quantity-->
        <div class = "purchase-info">
            <div class="qty">
                <p>Quantity<p></p>
                <input type = "number" class="input-qty" min = "0" value = "1">
            </div>
            <!--variation-->
            <div class="color-var">
                <p style="margin-top:5px; border-top: solid 1px black;">Color: 
				<button onclick="location.href='http://localhost/polachrome-website/product-info.php?prodID=<?php echo $_GET["prodID"] ?>'" type="button">Default</button>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM product_variation WHERE prodID = '" . $_GET["prodID"] . "'");
					while($row = mysqli_fetch_array($query))
					{
						?>
						<button onclick="location.href='http://localhost/polachrome-website/product-info.php?prodID=<?php echo $_GET["prodID"] ?>&varID=<?php echo $row["varID"] ?>'" type="button"><?php echo $row["prodVariation"] ?></button>
				
						<?php
					}
				?>
				</p>
                <div class="circle" style='background-color:#FF8200;'></div>
                <div class="circle" style='background-color:white;'></div>
                <div class="circle" style='background-color:brown;'></div>
            </div>
        </div>
        <form action="product-info.php?prodID=<?php echo $product_id; ?>" method="post">
        <button type = "submit" name = "add-cart" class = "add-to-card-btn">Add to Cart <i class = "fas fa-shopping-cart"></i></button>
        <input type='hidden' name='productID' value='$product_id'>
        </form>

          <!--Product information-->
          <div class = "product-detail">
            <br><br>
            <h2>Product Description</h2>
            <p>Product number: <?php echo $product_id; ?></p>

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!--Other scripts-->
    <script src="scripts/product-info.js"></script>
    <script src="scripts/navbar.js"></script>
  </body>

   <!--Footer Section-->
     <?php 
            include("includes/footer.php")
      ?>
<!--End of footer section-->

</html>