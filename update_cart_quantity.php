<?php
// require_once "ShoppingCart.php";
require_once "includes/db.php";

// $member_id = 2; // you can your integerate authentication module here to get logged in member

// $shoppingCart = new ShoppingCart();
 
// $shoppingCart->updateCartQuantity($_POST["new_quantity"], $_POST["cart_id"]);


extract($_POST);

if(isset($_POST['new_quantity']) && $_POST['cart_id']){
    $new_quantity = $_POST["new_quantity"];
    $cart_id = $_POST["cart_id"];

    $query = "UPDATE cart SET qty='$new_quantity' WHERE cart_id='$cart_id'";
    $run_query = mysqli_query($conn,$query);
}
           
?>