<?php

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
    if(isset($_GET['add_cart'])){

        global $db;

        $ip_add = getRealIpUser();

        $p_id = $_GET['add_cart'];

        $product_qty = $_POST['product_qty'];

        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into cart (p_id,ip_add,qty) values ('$p_id','$ip_add','$product_qty')";
            
            $run_query = mysqli_query($db,$query);
            
            echo "<script>window.open('product-info.php?prodID=$p_id','_self')</script>";
            
        }
    }
}

/// finish add_cart functions ///

//begin items function ///

function items(){
    global $db;

    $ip_add = getRealIpUser();

    $get_items = "select * from cart where ip_add='$ip_add'";

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

    $ip_add = getRealIpUser();

    $get_items = "select SUM(qty) as qty_total from cart where ip_add='$ip_add'";

    $run_items = mysqli_query($db,$get_items);

    while($row = mysqli_fetch_assoc($run_items)){
        echo $row['qty_total'];
    }
}

?>