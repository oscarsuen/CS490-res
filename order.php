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

        <form action = "checkout.php" method="post">
            
            <?php

                $db = mysql_connect("localhost","root","");

                        if(!$db) die("Error connecting to MySQL database.");
                        mysql_select_db("delivery" ,$db);
               
                $result = mysql_query("SELECT * FROM food");

                echo "
                <table border = 1>
                <tr><td>ID</td><td>name</td><td>price</td><td>order?</td></tr>";
                while($row= mysql_fetch_array($result))
                      echo("<tr><td>".
                            PrepSQL($row['id'])."</td><td>".
                            PrepSQL($row['name'])."</td><td>".
                            PrepSQL($row['price'])."</td><td>".
                            "<input type='checkbox' name='".$row['id']." value=true></td></tr>");
             echo "</table>";
            
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
            
            Your Address: 
                <input type="text" name="address">
            <br>
            Your area:
                <input type="text" name="area">
            <br>
            Your customer ID:
                <input type="text" name="id">
            
            <input type="submit" name="submit" value="submit"/>

        </form>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
</body>
</html>

