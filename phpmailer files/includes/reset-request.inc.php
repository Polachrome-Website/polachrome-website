<?php

if (isset($_POST["reset-request-submit"])){
	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);
	
	$url = "www.polachrome.com/forgottenpassword/create-new-passwoprd.php?selector=" . $selector . "&validator=" . bin2hex($token); 
	
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
	
	<?php
	require 'PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smpt.sendgrid.net';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'user@example.com';                 // SMTP username
	$mail->Password = 'secret';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
	
	$mail->From = 'from@example.com';
	$mail->FromName = 'Mailer';
	$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
	$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('info@example.com', 'Information');
	$mail->addCC('cc@example.com');
	$mail->addBCC('bcc@example.com');
	
	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = 'Here is the subject';
	$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent';
}
	
} else {
	header("Location: ../index.php");
}