<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<?php
		session_start();
	?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register on PolaChrome</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Bootsrap 4-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--Font Awesome icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

        <!--Polaroid Font-->
        <link href="//db.onlinewebfonts.com/c/1e5b7f8cdbcb1e579a6e53aaadaf0b67?family=FF+Real+Head" rel="stylesheet" type="text/css"/>

        <!--Main css-->
</head>
        <link rel="stylesheet" href="login.css">
<body>
<!--Navbar-->
    <nav>
        <div class="logo">
            <img src="img/logo.png" alt="PolaChrome-logo">
        </div>
        <div class="nav-items">
            <li><a class="red" href="home.html">HOME</a></li>
            <li><a class="orange"  href="faq.html">FAQs</a></li>
            <li><a class="yellow" href="product.html">PRODUCT</a></li>
            <li><a class="green"  href="about.html">ABOUT</a></li>
            <li><a class="blue" style="color:#198cd9" href="contact.html">CONTACT US</a></li>
            <li><a class="red" href="testimonial.html">TESTIMONIALS</a></li>
        </div>

        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>

        <div class="cancel-search-icon">
            <span class="fas fa-times"></span>
        </div>

        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>

        <form action="#">
            <input type="search" class="search-data" placeholder="Search" required>
            <button type="submit" class="fas fa-search"></button>
        </form>

        <div class="user-icon">
            <span class="fas fa-user"></span>
        </div>
        <div class="cart-icon">
            <span class="fas fa-shopping-cart"></span>
        </div>

        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
    </nav>
    <!--End of Navbar section-->
    <section>
	<center>
        <h2>Edit an Address</h2>
		
	<form action="includes/address.inc.php" method="post">
	<p>
	<?php
		require_once ('includes/db.php');
		include ('includes/functions.inc.php');
		$count = 1;
		
		$query = mysqli_query($conn, "SELECT * FROM user_account_address WHERE userID = '" . $_SESSION["userID"] . "'");
		while($row = mysqli_fetch_array($query))
		{
			?>
			<input type="radio" id="address<?php echo $count ?>" name="address" value="<?php echo $row['addressID'] ?>">
			<label for="address<?php echo $count ?>"><?php echo $row['bldg'], ", ", $row['strt'], ", ", $row['brgy'], ", ", $row['city'], ", ", $row['region'], ", ", $row['zip'], ", ", $row['contactNum'] ?></label><br>
	
			<?php
			$count += 1;
		}
	$count -= 1;
	?>
	
	<input type="submit" name="address-edit" class="send-btn" value="Edit"><input type="submit" name="address-delete" class="send-btn" value="Delete">
	</p>
	</form>
	<form action="includes/address.inc.php"  method="post">
		<input type="hidden" name="userID"  class="text-box" value="<?php echo $_SESSION["userID"] ?>" required >
		<?php
		if (isset($_GET["addressid"])) {
			$query = mysqli_query($conn, "SELECT * FROM user_account_address WHERE addressID = '" . $_GET["addressid"] . "'");
			$row = mysqli_fetch_array($query);
			?>
			<input type="hidden" name="addressid"  class="text-box" value="<?php echo $_GET["addressid"] ?>" >
			<input type="text" name="contactNum"  class="text-box" placeholder="Contact Number" value="<?php echo $row['contactNum'] ?>" required>
			<input type="text" name="bldg"  class="text-box" placeholder="Building and Unit Number" value="<?php echo $row['bldg'] ?>" required>
			<input type="text" name="strt"  class="text-box" placeholder="Street" value="<?php echo $row['strt'] ?>" required>
			<input type="text" name="brgy"  class="text-box" placeholder="Barangay" value="<?php echo $row['brgy'] ?>" required>
			<input type="text" name="city"  class="text-box" placeholder="City" value="<?php echo $row['city'] ?>" required>
			<input type="text" name="region"  class="text-box" placeholder="Region" value="<?php echo $row['region'] ?>" required>
			<input type="text" name="zip"  class="text-box" placeholder="ZIP Code" value="<?php echo $row['zip'] ?>" required><br>
		<?php
		}
		else
		{
		?>
			<input type="text" name="contactNum"  class="text-box" placeholder="Contact Number" required>
			<input type="text" name="bldg"  class="text-box" placeholder="Building and Unit Number" required>
			<input type="text" name="strt"  class="text-box" placeholder="Street" required>
			<input type="text" name="brgy"  class="text-box" placeholder="Barangay" required>
			<input type="text" name="city"  class="text-box" placeholder="City" required>
			<input type="text" name="region"  class="text-box" placeholder="Region" required>
			<input type="text" name="zip"  class="text-box" placeholder="ZIP Code" required><br>
		<?php
		}
		?>
		<input type="submit" name="address-submit" class="send-btn" value="Save">
	
    </form>
	</center>
    </section>

   
</body>
<!--Footer Section-->
  <footer class="footer">
    <div class="row">
        <!--Logo-->   
        <div class="col-lg-3 col-md-6 col sm-6">
            <div class="footer-about">
                <h3>Contact Us</h3>
                <p><a href="contact.html">Get in touch</a> with our customer service team.</p>
                <img src="img/mop.png">
            </div>
        </div>

        <!--About-->
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
            <div class="footer-widget">
                <h6>ABOUT</h6>
                <ul class="social-icon">
                <li><a href="about.html">PolaChrome</a></li>
                <li><a href="features.html">Polaroid Features</a></li>
                <li><a href="chart.html">Comparison Chart</a></li>
                </ul>
            </div>
        </div>

        <!--Follow us-->
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
            <div class="footer-widget">
                <h6>FOLLOW US</h6>
                <ul class="social-icon">
                    <li><a href="https://www.facebook.com/PolaChrome/"><i class="fab fa-facebook"></i> PolaChrome</i></a></li>
                    <li><a href="https://www.instagram.com/pola.chrome"><i class="fab fa-instagram-square"></i> PolaChrome</i></a></li>
                </ul>
            </div>
        </div>

    </div>

    <!--Copyright-->
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="footer-copyright-text">
                <p>Copyright &copy; 2022 All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!--End of footer section-->
</html>