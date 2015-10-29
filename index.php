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
			if (strcmp($varName,"admin")==0 && strcmp($varPassword,"password")) {
				header("Location: admin.html")
			}
			$db = mysql_connect("localhost","root","");
			
			if(!$db) die("Error connecting to MySQL database.");
			mysql_select_db("delivery" ,$db);

			$checkQuery = mysql_query("SELECT password FROM customer WHERE name='".$varName."'");
			$usrPass = mysql_fetch_array($checkQuery)['password'];

			if (strcmp($usrPass,$varPassword) == 0) {
				header("Location: customers.html");
				exit();
			} else {
				echo "<p>Password doesn't match</p>";
			}

		} else {
			echo $errorMessage;
		}
	}
	exit();
?>