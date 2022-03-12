<!DOCTYPE html>
<html>
	<?php
		session_start();
	?>
    <meta ch
    <head>
        <title>User Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="user-profile.css">
            <!--Bootstrap Cdn-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!--Font Awesome icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

   <!--Polaroid Font 
   <link href="//db.onlinewebfonts.com/c/1e5b7f8cdbcb1e579a6e53aaadaf0b67?family=FF+Real+Head" rel="stylesheet" type="text/css"/>--> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    </head>

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
            <li><a class="blue"  href="contact.html">CONTACT US</a></li>
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

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card profile-card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="img/user-icon.png" class="rounded-circle p-2">
                                <div class="mt-2">
                                    <h3>Juan Dela Cruz</h3>   
                                </div>
                            </div>
                            <ul class="profile-details align-items-center text-center">
                                <li><a href="#">My Profile</a></li>
                                <li><a href="#">My Rewards</a></li>
                                <li><a href="#">Saved Address</a></li>
                                <li><a href="#">Change Password</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="d-flex align-items-center mb-3">My Profile</h5>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="Juan Dela Cruz">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="col-sm-9 ">
                                    <input type="text" class="form-control" value="juandc">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" value="jdelacruz@gmail.com">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 ">
                                    <input type="button" class="btn-update" value="Update">
                                </div>
                            </div>
                           
                        </div>
                    </div>
             
               <div class="row">
                   <div class="col-sm-12">
                       <div class="card mb-3 ">
                           <div class="card-body mb-3">
                            <h5 class="d-flex align-items-center mb-3">My Rewards</h5>
                            <p class="d-flex flex-column text-center">Reward Points: 1250</p>
                            <div class="accordion earn-points">
                                <h5><i class="fas fa-chevron-circle-down down-icon"></i>Ways to earn reward points </h5>
                                
                            </div>
                            <div class="panel">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                            <div class="accordion">
                                <h5><i class="fas fa-chevron-circle-down down "></i>Ways to redeem reward points </h5>
                                
                            </div>
                            <div class="panel">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3 mt-0">
                        <div class="card-body mb-3">
                         <h5 class="d-flex align-items-center mb-3">Shipping Address</h5>
						 <form action="includes/address.inc.php"  method="post">
						 <input type="hidden" name="userID"  class="text-box" value="<?php echo $_SESSION["userID"] ?>" required >
                        <div class="row mb-3 align-items-center g-3">
                            <div class="col-sm-6">
                                <input type="text" name="fullname" class="form-control myInput" placeholder="Full Name" required>
                            </div>
                            <div class="col-sm-6">
                                    <input type="text" name="bldg" class="form-control myInput" placeholder="Building and Unit Number" required>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center g-3">
                            <div class="col-sm-6">
                                <input type="text" name="strt" class="form-control myInput" placeholder="Street" required>
                            </div>
                            <div class="col-sm-6">
                                    <input type="text" name="brgy" class="form-control myInput" placeholder="Barangay" required>
                            </div>
                        </div>
						<div class="row mb-3 align-items-center g-3">
                            <div class="col-sm-6">
                                <input type="text" name="city" class="form-control myInput" placeholder="City" required>
                            </div>
                            <div class="col-sm-6">
                                    <input type="text" name="region" class="form-control myInput" placeholder="Region" required>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center g-3">
                            <div class="col-sm-6">
                                <input type="text" name="contactNum" class="form-control myInput" placeholder="Phone Number" required>
                            </div>
                            <div class="col-sm-6">
                                    <input type="text" name="zip" class="form-control myInput" placeholder="Postal Code" required>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <input type="submit" name="address-submit" class="btn-update" value="Update">
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3 mt-0">
                        <div class="card-body mb-3">
                         <h5 class="d-flex align-items-center mb-3">Change Password</h5>
                         <div class="row mb-3">
                            
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Old Password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="New Password">
                            </div>
                        </div>
                        <div class="row mb-3">
                          
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Re-enter new password">
                            </div>
                        </div>
                            
                         
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <input type="button" class="btn-update" value="Update">
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>

              
            </div>
          
        </div>
    </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="navbar.js"></script>
    
    <!--FAQs script-->
    <script src="faq.js"></script>

</body>

 <!--Footer Section-->
 <footer class="footer">
    <div class="row">
        <!--Logo-->   
        <div class="col-lg-3 col-md-6 col sm-6">
            <div class="footer-about">
                <h3>We're here to help</h3>
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
                    <li><a href="https://www.instagram.com/pola.chrome/"><i class="fab fa-instagram-square"></i> PolaChrome</i></a></li>
                </ul>
            </div>
        </div>

        <!--Certificates-->
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
            <div class="footer-widget">
                <h6>CERTIFICATES</h6>
                <div class="dti-logo">
                    <img src="img/dti.png">
                </div>       
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