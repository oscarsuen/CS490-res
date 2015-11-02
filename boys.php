<!DOCTYPE HTML>

<html>
<head>
    <title>Restaurant System</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Home</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          
     
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container theme-showcase" role="main">
      <div class="jumbotron">

<?php
    if($_POST['submit'] == "Submit") {
		
		$errorMessage = "";

		$name = $_POST['boy_name'];
		$area = $_POST['boy_area'];

        
        //make sure all fields are complete
		if(empty($name)) {
			$errorMessage .= "name";
  			echo "<div class='alert alert-dismissible alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  <strong> Oh snap!</strong> You haven't entered the boy's name!
</div>";

		}
        if(0 == preg_match("/^\d+$/", $area)){
            $errorMessage .= "area";
  			echo "<div class='alert alert-dismissible alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  <strong> Oh snap!</strong> You haven't entered the area code!
</div>";
        }


		
		if(empty($errorMessage)) {
			$db = mysql_connect("localhost","root",""); //connect to database
			if(!$db) die("Error connecting to MySQL database.");
			mysql_select_db("delivery" ,$db);
			$sql = "INSERT INTO boy (name, area) VALUES (".
			PrepSQL($name) . ", " .
			PrepSQL($area) . ")";
			mysql_query($sql);

			echo "<div class='alert alert-dismissible alert-success'>
  <button type='butto' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>
  <strong> Yay!</strong> Boy successfully added!
		</div>";
			echo "<a href='admin.html' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-repeat' aria-hidden='true'></span> Go back</a>";
			exit();
		} else {
            echo "<div class='alert alert-dismissible alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  <strong> Oh snap!</strong> There has been a failure.
</div>";
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

</div>

  
  <!-- Optional theme -->
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
</body>
</html>