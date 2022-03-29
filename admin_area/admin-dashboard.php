<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-dashboard.css">
    <!--Bootstrap Cdn-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!--Font Awesome icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

   <!--Polaroid Font 
   <link href="//db.onlinewebfonts.com/c/1e5b7f8cdbcb1e579a6e53aaadaf0b67?family=FF+Real+Head" rel="stylesheet" type="text/css"/>--> 
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
        <li><a class="orange" href="track-order.html">TRACK ORDER</a></li>
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

<!--Sidebar-->
<div class="sidebar">
    <h6>Admin</h6>
      <ul class="nav-links">
       
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">My Profile</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-box' ></i>
            <span class="links_name">Products</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-category' ></i>
            <span class="links_name">Categories</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bxs-user-account' ></i>
            <span class="links_name">Customers</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cart' ></i>
            <span class="links_name">Orders</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Personalize</span>
          </a>
        </li>
      </ul>
  </div>


  <script>
    let sidebar = document.querySelector(".sidebar");
 let sidebarBtn = document.querySelector(".sidebarBtn");
 sidebarBtn.onclick = function() {
   sidebar.classList.toggle("active");
   if(sidebar.classList.contains("active")){
   sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
 }else
   sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
 }
  </script>
 
 <script src="navbar.js"></script>

</body>



  </html>