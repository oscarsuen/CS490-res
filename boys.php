<?php
\    if($_POST['submit'] == "submit") {
		
		$errorMessage = "";

		$name = $_POST['Name'];
		$area = $_POST['Area'];

        
        //make sure all fields are complete
		if(empty($name)) {
			$errorMessage .= "name";
  			echo " You forgot to enter a boy name!";

		}
        if(0 == preg_match("/^\d+$/", $price)){
            $errorMessage .= "are";
  			echo "You forgot to enter an area!";
        }


		
		if(empty($errorMessage)) {
			$db = mysql_connect("localhost","root",""); //connect to database
			if(!$db) die("Error connecting to MySQL database.");
			mysql_select_db("delivery" ,$db);
			$sql = "INSERT INTO boy (name, area) VALUES (".
			PrepSQL($name) . ", " .
			PrepSQL($area) . ")";
			mysql_query($sql);


			exit();
		} else {
            echo "there has been a failure.";
        }

	}
	
	// function: PrepSQL()
	// use stripslashes and mysql_real_escape_string PHP functions
	// to sanitize a string for use in an SQL query
	// also puts single quotes around the string
	//
	function PrepSQL($value) {
		// Stripslashes
		if(get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		
		// Quote
		$value = "'" . mysql_real_escape_string($value) . "'";
		
		return($value);
	}



?>