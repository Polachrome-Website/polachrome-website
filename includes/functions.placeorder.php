<?php
require_once "shoppingCart.php";


 // RemoteMySQL Connection

 $server = "remotemysql.com";
 $username = "kgNGVMmxvF";
 $password = "WAQHRpOvnw";
 $db = "kgNGVMmxvF";
 
 $db = mysqli_connect($server,$username,$password,$db);

 
//connect local DB

// $db = mysqli_connect("localhost","root","123456","polachrome_db");


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
   
    $shoppingCart = new ShoppingCart();
    if(isset($_GET['action'])){
        switch ($_GET['action']){
            case "add_cart":
                if(!empty($_POST["product_qty"])){ //begin !empty product qty post
                    
                    global $db;

                    $p_id = $_GET["code"];
    
                    $pro_qty = $_POST["product_qty"];

                    $pro_variation = $_POST["product_variation"];

                    $pro_variation = 0;
    
					if(isset($_GET['varcode'])){
						$pro_variation = $_GET['varcode'];
					}
					
                    $get_products = "SELECT * FROM products WHERE prodID='$p_id'";
    
                    //get cart items by product
                    $get_cart = "SELECT * FROM cart WHERE prod_id='$p_id' and user_id='$user_id'";
    
                    $run_cart = mysqli_query($db,$get_cart);

                    while($row_cart = mysqli_fetch_array($run_cart)){

                        $cart_id = $row_cart['cart_id'];

                        $cart_qty = $row_cart['qty'];
                    }
            
                    $count = mysqli_num_rows($run_cart);
    
    
                    if(!empty($count)){
                        //update cart item quantity in database
                        $newQuantity = $cart_qty + $pro_qty;

                        $update_qty = "UPDATE cart SET qty='$newQuantity' WHERE cart_id='$cart_id'";
    
                        $run_cart = mysqli_query($db,$update_qty);
    
                        echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
    
                    }
                    else{
    
                        $insert_cart = "INSERT into cart (prod_id, var_id, user_id, qty) VALUES (?,?,?,?)";
            
                        $cart_stmt = mysqli_stmt_init($db);
            
                        if (!mysqli_stmt_prepare($cart_stmt, $insert_cart)) {
                            header("location: ../product-info.php?prodID=" . $p_id . "&error=stmtfailed");
                            exit();
                           }
                        else{
                            mysqli_stmt_bind_param($cart_stmt, "iiii", $p_id, $pro_variation, $user_id, $pro_qty);
                            mysqli_stmt_execute($cart_stmt);
                            mysqli_stmt_close($cart_stmt);
    
                            echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
                            exit();
                    }
                }
    
            }//finish !empty product qty post
            break;
            case "remove":
            // Delete single entry from the cart
            
            //get cart items by product
               
            global $db;

            $cart_id = $_GET["id"];

            $delete_cart = "DELETE from cart WHERE cart_id='$cart_id'";

            $run_cart = mysqli_query($db,$delete_cart);

            echo "<script>window.open('cart.php','_self')</script>";

            break;

            case "empty":
                // Empty cart
                global $db;

                $empty_cart = "DELETE from cart WHERE user_id='$user_id'";

                $run_empty = mysqli_query($db,$empty_cart);

                echo "<script>window.open('cart.php','_self')</script>";

                break;
    }
}
}

/// finish add_cart functions ///


function add_cart_guest(){
    
    $user_id = $_SESSION['guest_id'];
 
    $shoppingCart = new ShoppingCart();
    if(isset($_GET['action'])){
        switch ($_GET['action']){
            case "add_cart":
                if(!empty($_POST["product_qty"])){ //begin !empty product qty post
                    
                    global $db;

                    $p_id = $_GET["code"];
    
                    $pro_qty = $_POST["product_qty"];

                    $pro_variation = $_POST["product_variation"];

                    if($pro_variation != null){
                        $pro_variation = 0;
                    }
    
                    $get_products = "SELECT * FROM products WHERE prodID='$p_id'";

                    $run_products = mysqli_query($db,$get_products);

                    while($row_products = mysqli_fetch_array($run_products)){

                        $product_tbl_quantity = $row_products['quantity'];

                    }
            
                    //get cart items by product
                    $get_cart = "SELECT * FROM cart WHERE prod_id='$p_id' and user_id='$user_id'";
    
                    $run_cart = mysqli_query($db,$get_cart);

                    while($row_cart = mysqli_fetch_array($run_cart)){

                        $cart_id = $row_cart['cart_id'];

                        $cart_qty = $row_cart['qty'];
                    }
            
                    $count = mysqli_num_rows($run_cart);
    
    
                    if(!empty($count)){
                            if($cart_qty != $product_tbl_quantity){
                            //update cart item quantity in database
                            $newQuantity = $cart_qty + $pro_qty;

                            $update_qty = "UPDATE cart SET qty='$newQuantity' WHERE cart_id='$cart_id'";
        
                            $run_cart = mysqli_query($db,$update_qty);
        
                            echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
                        }
                        else{
                            set_message("You have exceeded ung stock na meron lang kami");
                            echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
                        }
                    }
                    else{

                        if($pro_variation == null){
                            $pro_variation = 0;
                        }
    
                        $insert_cart = "INSERT into cart (prod_id, var_id, user_id, qty) VALUES (?,?,?,?)";
            
                        $cart_stmt = mysqli_stmt_init($db);
            
                        if (!mysqli_stmt_prepare($cart_stmt, $insert_cart)) {
                            header("location: ../product-info.php?prodID=" . $p_id . "&error=stmtfailed");
                            exit();
                           }
                        else{
                            mysqli_stmt_bind_param($cart_stmt, "iisi", $p_id, $pro_variation, $user_id, $pro_qty);
                            mysqli_stmt_execute($cart_stmt);
                            mysqli_stmt_close($cart_stmt);
    
                            echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
                            exit();
                    }
                }
    
            }//finish !empty product qty post
            break;
            case "remove":
            // Delete single entry from the cart
            
            //get cart items by product
               
            global $db;

            $cart_id = $_GET["id"];

            $delete_cart = "DELETE from cart WHERE cart_id='$cart_id'";

            $run_cart = mysqli_query($db,$delete_cart);

            echo "<script>window.open('cart.php','_self')</script>";

            break;

            case "empty":
                // Empty cart
                global $db;

                $empty_cart = "DELETE from cart WHERE user_id='$user_id'";

                $run_empty = mysqli_query($db,$empty_cart);

                echo "<script>window.open('cart.php','_self')</script>";

                break;
        }
    }
}

//begin items function ///

function items(){
    global $db;


    if(isset($_SESSION['userID'])){
        $user_id = $_SESSION['userID'];
    }
  
    
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


    if(!isset($_SESSION['userID'])){
        $guest_id = $_SESSION['guest_id'];
    }
  
    
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
    else{
        $user_id = $_SESSION['guest_id'];
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