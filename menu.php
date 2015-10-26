<?php
    if($_POST['submit'] == "Submit") {
		
		$errorMessage = "";

		$varTitle = $_POST['title'];
		$varAuthor = $_POST['author'];
		$varISBN = $_POST['ISBN'];
		$varCall_no = $_POST['call_no'];
        
        //make sure all fields are complete
		if(empty($varTitle)) {
			$errorMessage .= "Title";
			echo "<div class='alert alert-danger' role='alert'>";
			echo "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>";
			echo "<span class='sr-only'>Error:</span>";
  			echo " You forgot to enter the title!";
  			echo "</div>";

		}
		if(empty($varAuthor)) {
			$errorMessage .= "Author";
			echo "<div class='alert alert-danger' role='alert'>";
			echo "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>";
			echo "<span class='sr-only'>Error:</span>";
  			echo " You forgot to enter the title!";
  			echo "</div>";
		}
		if(empty($varISBN)) {
			$errorMessage .= "ISBN";
			echo "<div class='alert alert-danger' role='alert'>";
			echo "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>";
			echo "<span class='sr-only'>Error:</span>";
  			echo " You forgot to enter the title!";
  			echo "</div>";
		}
		if(empty($varCall_no)) {
			$errorMessage .= "Call_No";
			echo "<div class='alert alert-danger' role='alert'>";
			echo "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>";
			echo "<span class='sr-only'>Error:</span>";
  			echo " You forgot to enter the title!";
  			echo "</div>";
		}
		
		if(empty($errorMessage)) {
			$db = mysql_connect("localhost","root",""); //connect to database
			
			if(!$db) die("Error connecting to MySQL database.");
			mysql_select_db("library" ,$db);
			
			$sql = "INSERT INTO book (title, author, ISBN, call_no) VALUES (".
			PrepSQL($varTitle) . ", " .
			PrepSQL($varAuthor) . ", " .
			PrepSQL($varISBN) . ", " .
			PrepSQL($varCall_no) . ")";
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
			echo "<a href='addbook.html' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-repeat' aria-hidden='true'></span> Try Again</a>";
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