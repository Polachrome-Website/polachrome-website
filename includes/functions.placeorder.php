<?php
require_once "shoppingCart.php";




$db = mysqli_connect("localhost","root","123456","polachrome_db");
/// begin getRealIpUser functions ///

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

/// finish getRealIpUser functions ///

/// begin add_cart functions ///

function add_cart(){

    if(isset($_SESSION['userID'])){
        $user_id = $_SESSION['userID'];
    }
    // if(!isset($_SESSION['userID'])){
    //     $user_id = $_SESSION['guest_id']
    // }

    // if(isset($_SESSION['guest'])){
    //     $user_id = $_SESSION['guest'];
    // }
    
    $shoppingCart = new ShoppingCart();
    if(isset($_GET['action'])){
        switch ($_GET['action']){
        case "add_cart":
            if(! empty($_POST["product_qty"])){

                $p_id = $_GET["code"];

                $productResult = $shoppingCart->getProductByCode($_GET["code"]);
                
                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["prod_id"], $user_id);

                if (! empty($cartResult)) {
                    // Update cart item quantity in database
                    $newQuantity = $cartResult[0]["qty"] + $_POST["product_qty"];
                    $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
                    echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
                } else {
                    // Add to cart table
                    $shoppingCart->addToCart($productResult[0]["prodID"], $_POST["product_qty"], $user_id);
                    echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
                }
            }
            break;
            case "remove":
                // Delete single entry from the cart
                $shoppingCart->deleteCartItem($_GET["id"]);
                break;
            case "empty":
                // Empty cart
                $shoppingCart->emptyCart($user_id);
                break;
    }
}


// global $db;

// // $ip_add = getRealIpUser();

// $p_id = $_GET['code'];

// $product_qty = $_POST['product_qty'];

// $check_product = "select * from cart where user_id='$user_id' AND p_id='$p_id'";

// $run_check = mysqli_query($db,$check_product);

// if(mysqli_num_rows($run_check)>0){
    
//     echo "<script>alert('This product has already added in cart')</script>";
//     echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
    
// }else{
    
//     $query = "insert into cart (p_id,user_id,qty) values ('$p_id','$user_id','$product_qty')";
    
//     $run_query = mysqli_query($db,$query);
    
//     echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
    
//     }
//     }
}

/// finish add_cart functions ///


function add_cart_guest(){
   
    $user_id = $_SESSION['guest_id'];
 
    
    $shoppingCart = new ShoppingCart();
    if(isset($_GET['action'])){
        switch ($_GET['action']){
        case "add_cart":
            if(! empty($_POST["product_qty"])){

                $p_id = $_GET["code"];

                $productResult = $shoppingCart->getProductByCode($_GET["code"]);
                
                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["prod_id"], $user_id);

                if (! empty($cartResult)) {
                    // Update cart item quantity in database
                    $newQuantity = $cartResult[0]["qty"] + $_POST["product_qty"];
                    $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
                    echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
                } else {
                    // Add to cart table
                    $shoppingCart->addToCart($productResult[0]["prodID"], $_POST["product_qty"], $user_id);
                    echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
                }
            }
            break;
            case "remove":
                // Delete single entry from the cart
                $shoppingCart->deleteCartItem($_GET["id"]);
                break;
            case "empty":
                // Empty cart
                $shoppingCart->emptyCart($user_id);
                break;
        }
    }
}

//begin items function ///

function items(){
    global $db;

    // $ip_add = getRealIpUser();
    if(isset($_SESSION['userID'])){
        $user_id = $_SESSION['userID'];
    }
    // else{
    //     $user_id = mt_rand(2000,9000);
    // }
    
    $get_items = "select * from cart where user_id='$user_id'";

    $run_items = mysqli_query($db,$get_items);

    $count_items = mysqli_num_rows($run_items);

    if($count_items > 0){
        echo $count_items;
    }else{
        echo "0";
    }
}


function guest_items(){
    global $db;

    // $ip_add = getRealIpUser();
    $guest_id = $_SESSION['guest_id'];
    // else{
    //     $user_id = mt_rand(2000,9000);
    // }
    
    $get_items = "select * from cart where user_id='$guest_id'";

    $run_items = mysqli_query($db,$get_items);

    $count_items = mysqli_num_rows($run_items);

    if($count_items > 0){
        echo $count_items;
    }else{
        echo "0";
    }
}

/// finish items function

///begin items_qty

function items_qty(){
    global $db;

    // $ip_add = getRealIpUser();

    if(isset($_SESSION['userID'])){
        $user_id = $_SESSION['userID'];
    }
    // else{
    //    $user_id = mt_rand(2000,9000);
    // }


    $get_items = "select SUM(qty) as qty_total from cart where user_id='$user_id'";

    $run_items = mysqli_query($db,$get_items);

    while($row = mysqli_fetch_assoc($run_items)){
        echo $row['qty_total'];
    }
}



?>