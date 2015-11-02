<?php
	if (isset($_POST['submit']) && $_POST['submit'] == "Submit") {
		
		$errorMessage = "";

		$varName = $_POST['name'];
		$varPassword = $_POST['password'];
        
		if (empty($varName)) {
			$errorMessage .= "<p>Enter your name</p>";
		}
		if (empty($varPassword)) {
			$errorMessage .= "<p>Enter password</p>";
		}
		
		if (empty($errorMessage)) {
			if (strcmp($varName,"admin")==0 && strcmp($varPassword,"password")==0) {
				header("Location: admin.html");
			} else {
				echo "<p>Password doesn't match.";
			}

		} else {
			echo $errorMessage;
		}
	}
	exit();
?>