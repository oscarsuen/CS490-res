<?php
    if($_POST['submit'] == "Submit") {
		
		$errorMessage = "";

		$name = $_POST['Item Name'];
		$price = $_POST['Price'];

        
        //make sure all fields are complete
		if(empty($name)) {
			$errorMessage .= "name";
			echo "<div class='alert alert-danger' role='alert'>";
			echo "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>";
			echo "<span class='sr-only'>Error:</span>";
  			echo " You forgot to enter item name!";
  			echo "</div>";

		}
        if(0 == preg_match("/^\d\d?\.\d?\d?$/", $price)){
            $errorMessage .= "price";
            echo "<div class='alert alert-danger' role='alert'>";
			echo "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>";
			echo "<span class='sr-only'>Error:</span>";
  			echo " Invalid Price!";
  			echo "</div>";
        }


		
		if(empty($errorMessage)) {
			$db = mysql_connect("localhost","root",""); //connect to database
			
			if(!$db) die("Error connecting to MySQL database.");
			mysql_select_db("delivery" ,$db);
			
			$sql = "INSERT INTO food (name, price) VALUES (".
			PrepSQL($name) . ", " .
			PrepSQL($price) . ")";
			mysql_query($sql);

			$rollno = mysql_query("SELECT ID FROM book ORDER BY id DESC LIMIT 1");
			

			$row = mysql_fetch_array($rollno);
			
			echo "<div class='alert alert-success' role='alert'>";
			echo "<span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>";
			echo "<span class='sr-only'>Success</span>";
  			echo " Book added!";
  			echo "</div>";	

			echo("<p>Book ID: " . $row['ID']. "</p>");
			echo("</br>");

			echo "<a href='addbook.html' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-repeat' aria-hidden='true'></span> Submit Another Entry</a>";

			exit();
		} else {
			echo "<a href='menu.html' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-repeat' aria-hidden='true'></span> Try Again</a>";
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