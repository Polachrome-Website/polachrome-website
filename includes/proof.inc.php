<?php
    require_once 'db.php';

    if(isset($_POST['payment-upload'])){

        $refence_no = $_POST['reference_no'];

        $select_user = "SELECT * from tbl_orders where invoice_no='$refence_no'";
        $run_user = mysqli_query($conn,$select_user);
        while($row_orders = mysqli_fetch_array($run_user)){
            $customer_id = $row_orders['customer_id'];
            $pro_id = $row_orders['pro_id'];
            $pro_qty = $row_orders['pro_qty'];
        }

        $update_quantity = "UPDATE products SET quantity=quantity-'$pro_qty' WHERE prodID='$pro_id' AND quantity>0";

        $run_qty_update = mysqli_query($conn,$update_quantity);

        $select_cart = "SELECT * from cart where user_id='$customer_id'";
        $run_cart = mysqli_query($conn,$select_cart);
        while($row_cart = mysqli_fetch_array($run_cart)){
            $cart_id = $row_cart['cart_id'];
        }

        $deleteQuery = "DELETE from cart where cart_id=?";
        $stmtDelete = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmtDelete, $deleteQuery)) {
            echo "There was an error!";
            exit();
        } else {
            mysqli_stmt_bind_param($stmtDelete, "i", $cart_id);
            mysqli_stmt_execute($stmtDelete);
            mysqli_stmt_close($stmtDelete);
            //header("LOCATION: ../login.php?newpwd=passwordupdated");
        }

        $img_payment = $_FILES['img_payment']['name'];
        $temp_name1 = $_FILES['img_payment']['tmp_name'];
        $fileSize = $_FILES['img_payment']['size'];
        $fileError = $_FILES['img_payment']['error'];

        $fileExt = explode('.', $img_payment);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize <= 5000000){
                    $file_moved = move_uploaded_file($temp_name1,"../img/payments/$img_payment");

                    if($file_moved){
                    $query = "UPDATE tbl_orders SET order_status=?,payment_proof=? where invoice_no = ?";
                    $stmt = mysqli_stmt_init($conn);
                    $update_status = "Processing";
            
                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        header("location: /upload-payment.php?error=stmtfailed");
                        exit();
                    }else{
            
                        mysqli_stmt_bind_param($stmt, "ssi", $update_status, $img_payment, $refence_no);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
            
                        header("location: ../index.php?status=uploadsuccess&refno=" . $refence_no);
                        exit();
                    }
                    $update_customers = "UPDATE tbl_orders_customers SET order_status='Processing' WHERE invoice_no = '$refence_no'";
                    $run_update = mysqli_query($conn, $update_customers);
            
                   
            
            
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
            
                // echo $cart_id;
                // echo $customer_id;
                }
            }
                else{
                    echo "<script> alert('File size is too big') </script>";
                }
            }else{
                $refence_no = $_POST['reference_no'];
                header("Location: ../upload-payment.php?status=errorupload&refno=" . $refence_no); 
            }
           
        }else{
            $refence_no = $_POST['reference_no'];
            header("Location: ../upload-payment.php?status=errorupload&refno=" . $refence_no); 
        }


      

?>