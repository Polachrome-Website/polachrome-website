<head>
    <!--for alert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>

<?php
	include("functions.inc.php");

	if (isset($_POST["reset-password-submit"])) {
		
		$selector = $_POST["selector"];
		$validator = $_POST["validator"];
		$password = $_POST["pwd"];
		$passwordRepeat = $_POST["pwd-repeat"];
		
		if(empty($password) || empty($passwordRepeat)) {

			include("../new-pw.php?error=empty&selector=" . $selector . "&validator=" . $validator);
			exit();
		} 
		
		else if (pwdMatch($password, $passwordRepeat) !== false) {
			header ("Location: ../new-pw.php?error=pwdnotsame&selector=" . $selector . "&validator=" . $validator); 
			exit();
		}
		
		 else if(pwdStrength($password) !== false){
			header ("Location: ../new-pw.php?error=weakpwd&selector=" . $selector . "&validator=" . $validator); 
			exit();
		}
		
		$currentDate = date("U");
		
		require 'db.php';
		
		$sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "There was an error! 1";
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
			mysqli_stmt_execute($stmt);
			
			$result = mysqli_stmt_get_result($stmt);
			if (!$row = mysqli_fetch_assoc($result)) {
				echo "Please resubmit your reset request.";
				exit();
			} else {
				
				$tokenBin = hex2bin($validator);
				$tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
				
				if ($tokenCheck === false) {
					echo "Please resubmit your reset request.";
					exit();
				} elseif ($tokenCheck == true) {
					
					$tokenEmail = $row['pwdResetEmail'];
					
					$sql = "SELECT * FROM user_account WHERE email=?;";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "There was an error! 2";
						exit();
					} else {
						mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						if (!$row = mysqli_fetch_assoc($result)) {
							echo "There was an error! 3";
							exit();
						} else {
							
							$sql = "UPDATE user_account SET password=? WHERE email=?";
							$stmt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($stmt, $sql)) {
								echo "There was an error! 4";
								exit();
							} else {
								$newPwdHash = password_hash($password, PASSWORD_DEFAULT);
								mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
								mysqli_stmt_execute($stmt);
								
								$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
								$stmt = mysqli_stmt_init($conn);
								if (!mysqli_stmt_prepare($stmt, $sql)) {
									echo "There was an error! 5";
									exit();
								} else {
									mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
									mysqli_stmt_execute($stmt);
									header("LOCATION: ../login.php?newpwd=passwordupdated");
								}
							}
						}
					}
					
				}
			}
		}
		
	} else {
	header("Location: ../login.php");
	}
?>