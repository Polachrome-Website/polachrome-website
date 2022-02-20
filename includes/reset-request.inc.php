<?php

//Import PHPMailer classes into the global namespace
	//These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';


if (isset($_POST["reset-request-submit"])){
	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);
	
	$url = "www.polachrome.com/forgottenpassword/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token); 
	
	$expires = date("U") + 180;
	
	require 'db.php';
	
	$userEmail = $_POST["email"];
	
	$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "There was an error!";
		exit();
	} else {
		mysqli_stmt_bind_param($stmt, "s", $userEmail);
		mysqli_stmt_execute($stmt);
		//header("LOCATION: ../login.php?newpwd=passwordupdated");
	}
	
	$sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "There was an error!";
		exit();
	} else {
		$hashedToken = password_hash($token, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
		mysqli_stmt_execute($stmt);
		
	}
	
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

	
	/* $to = $userEmail;
	
	$subject = "Reset your password for PolaChrome";
	
	$message = '<p>We receieved a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p>';
	$message .= '<p>Here is your password reset link: </br>';
	$message .= '<a href="' . $url . '">' . $url . '</a></p>';
	
	$headers = "From: Test <polachrome@gmail.com>\r\n";
	$headers .= "Reply-To: polachrome@gmail.com\r\n";
	$headers .= "Content-type: text/html\r\n";
	
	
	
	$retval = mail ($to,$subject,$message,null,$headers);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
	
	echo $url; */
	/* header("Location: ../reset-pw.php?reset=success"); */
	
	
	//Create an instance; passing `true` enables exceptions
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
		$mail->setFrom('mchacks996@gmail.com', 'Test Password Reset');
		$mail->addAddress($userEmail);     //Add a recipient
		// $mail->addReplyTo('no-reply@gmail.com', 'No reply');

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Here is the subject';
		$mail->Body    = '
		
		<p>We receieved a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email. 
		
		</br>

		Here is your password reset link: </br>

		<a href="' . $url . '">' . $url . '</a>

		</p>
		';


		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}


}