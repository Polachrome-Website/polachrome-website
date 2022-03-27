<?php

include("db.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


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

            $prod_name = $row_products['prodName'];

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
                
                $data['id'] = $invoice_no; 
                echo json_encode($data);   //echo back from PHP script to be in the URL 
                
                exit();

                // header('Content-Type: application/json');
                // echo json_encode(['location'=>'../upload-payment.php?status=success&refno=' . $invoice_no]);
                // exit();

                // header("location: ../upload-payment.php?status=success&refno=" . $invoice_no);
                // exit();
            }
        }
    }
    // begin PHPMailer to send email order details //

$mail = new PHPMailer(true);
$userEmail = "mchacks996@gmail.com";
try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mchacks996@gmail.com';                     //SMTP username
    $mail->Password   = '!@#$%^&*()asdfghjkl';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mchacks996@gmail.com', 'Order Summary');
    $mail->addAddress($userEmail);     //Add a recipient
    // $mail->addReplyTo('no-reply@gmail.com', 'No reply');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Polachrome Order Details';
    $mail->Body    = '
    
    <h3> Thank you for shopping with Polachrome. We have recevied your order placed on '. $date .' </h3>
    <p> Here is the summary of your order: <br> 
        Product Name: ' . $prod_name . ' <br>
        Quantity: ' . $pro_qty . ' <br>
        Total Price: ' . $total_fee . ' <br>

    </p>

    <p> Please use this reset link within 10 minutes upon request. </p>
    ';


    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    // echo $url; 
     // header("Location: ../reset-pw.php?reset=success"); 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// end PHPMailer to send email order details //
}




// check if there are values are passed // 
echo $user_id;
echo $shipping_full_name; 
echo $shipping_email;
echo $shipping_contact;
echo $shipping_strt_bldg_hn;  
echo $shipping_reg_pro_cit_brgy; 
echo $payment_mode; 


?>

