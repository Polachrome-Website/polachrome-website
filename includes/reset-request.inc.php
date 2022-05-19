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


if (isset($_POST["reset-request-submit"])){

	$user_email = $_POST['email'];

	// echo "<p> $user_email </p>";

	$get_email = "select * from user_account where email='$user_email'";

	$run_email = mysqli_query($conn,$get_email);

	$verify = mysqli_num_rows($run_email);

	if($verify==1){
		$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);

	$url = "http://" . $_SERVER["HTTP_HOST"] . "/polachrome/new-pw.php?selector=" . $selector . "&validator=" . bin2hex($token);
	// $url = "www.polachrome.com/forgottenpassword/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token); 
	
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


	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = 1; 
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'polacromenoreply@gmail.com';                     //SMTP username
		$mail->Password   = 'group4softwareeng2022';                               //SMTP 
		$mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('polacromenoreply@gmail.com', 'Test Password Reset');
		$mail->addAddress($userEmail);     //Add a recipient
		// $mail->addReplyTo('no-reply@gmail.com', 'No reply');

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Polachrome Password Reset';
		$mail->Body    = '
		
		<p>We receieved a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email. 
		
		</br>
		Here is your password reset link: </br>
		<a href="' . $url . '">' . $url . '</a>
		</p> </br>
		<p> Please use this reset link within 10 minutes upon request. </p>
		';


		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		// echo $url; 
	 	header("Location: ../reset-pw.php?reset=success"); 
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
	}else{
		header("Location: ../reset-pw.php?reset=notregistered"); 
	}

}



