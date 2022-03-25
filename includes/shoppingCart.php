<?php
require_once "cartController.php";

class ShoppingCart extends DBController{

    ///BEGIN NEW SHOPPING CART FUNCTIONS
    function getAllProduct()
    {
        $query = "SELECT * FROM products";
        
        $productResult = $this->getDBResult($query);
        return $productResult;
    }
    
    function getMemberCartItem($member_id)
    {
        $query = "SELECT products.*, cart.id as cart_id,cart.qty FROM products, cart WHERE 
            products.prodID = cart.prod_id AND cart.user_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }
    
    function getProductByCode($product_id)
    {
        $query = "SELECT * FROM products WHERE prodID=?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $product_id
            )
        );
        
        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }
    
    function getCartItemByProduct($product_id, $user_id)
    {
        $query = "SELECT * FROM cart WHERE prod_id = ? AND user_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $user_id
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }
    
    function addToCart($product_id, $quantity, $user_id)
    {
        $query = "INSERT INTO cart (prod_id,qty,user_id) VALUES (?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $user_id
            )
        );
        
        $this->updateDB($query, $params);
    }
    
    function updateCartQuantity($quantity, $cart_id)
    {
        $query = "UPDATE cart SET  qty = ? WHERE cart_id= ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $this->updateDB($query, $params);
    }
    
    function deleteCartItem($cart_id)
    {
        $query = "DELETE FROM cart WHERE cart_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $this->updateDB($query, $params);
    }
    
    function emptyCart($member_id)
    {
        $query = "DELETE FROM cart WHERE user_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $this->updateDB($query, $params);
        }
    }
    ///END NEW SHOPPING CART FUNCTIONS

?>