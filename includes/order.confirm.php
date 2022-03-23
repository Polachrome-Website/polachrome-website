<?php

require_once 'db.php';

if(isset($_POST['send_pay_mode'])){

    $user_id = $_POST['send_user_id'];

    $shipping_full_name = $_POST['send_full_name'];

    $shipping_email = $_POST['send_email'];

    $shipping_contact = $_POST['send_contact'];

    $shipping_strt_bldg_hn = $_POST['send_strt_bldg_hn'];

    $shipping_reg_pro_cit_brgy = $_POST['send_reg_pro_cit_brgy'];

    $payment_mode = $_POST['send_pay_mode'];  

    $total = 0;

    $ship_fee = 45.00;

    $invoice_no = mt_rand();

    $date_now = date("Y-m-d");

    $order_status = "Pending";

    $select_cart = "select * from cart where user_id='$user_id'";

    $run_cart = mysqli_query($conn,$select_cart);

    while($row_cart = mysqli_fetch_array($run_cart)){

        $pro_id = $row_cart['prod_id'];
                    
        $pro_qty = $row_cart['qty'];
                    
        $get_products = "select * from products where prodID='$pro_id'";
                    
        $run_products = mysqli_query($conn,$get_products);

        while($row_products = mysqli_fetch_array($run_products)){

            $sub_total = $row_products['price']*$pro_qty;

            $total += $sub_total;  

            $total_fee = $total + $ship_fee;

            $insert_order = "INSERT into tbl_orders (customer_id, invoice_no, pro_id, pro_qty, amount, order_date, order_status) 
            VALUES (?,?,?,?,?,?,?)";

            $order_stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($order_stmt, $insert_order)) {
                header("location: ../summary.php?error=stmtfailed");
                exit();
               }
            else{
                mysqli_stmt_bind_param($order_stmt, "iiiiiss", $user_id, $invoice_no, $pro_id, $pro_qty, $sub_total, $date_now, $order_status);
                mysqli_stmt_execute($order_stmt);
                mysqli_stmt_close($order_stmt);

                header("location: ../upload-payment.php?status=success&refno=" . $invoice_no);
                exit();

            }
        }
    }
}

echo $user_id;
echo $shipping_full_name; 
echo $shipping_email;
echo $shipping_contact;
echo $shipping_strt_bldg_hn;  
echo $shipping_reg_pro_cit_brgy; 
echo $payment_mode; 


?>

