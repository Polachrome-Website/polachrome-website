<?php
require_once "ShoppingCart.php";

// $member_id = 2; // you can your integerate authentication module here to get logged in member

$shoppingCart = new ShoppingCart();
 
$shoppingCart->updateCartQuantity($_POST["new_quantity"], $_POST["cart_id"]);
                
?>