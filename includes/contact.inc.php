<?php

//Import PHPMailer classes into the global namespace
	//These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';


if (isset($_POST["contact-us-submit"])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	

	$mail = new PHPMailer(true);

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
		$mail->setFrom($email, 'Inquiry from Contact Us ');
		$mail->addAddress('mchacks996@gmail.com');     //Add a recipient
		// $mail->addReplyTo('$email');

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Polachrome Inquiry';
		$mail->Body    = $message;


		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}

	echo $email;
	echo $name;
	echo $message;

}
