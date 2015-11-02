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
    
    if($_POST["submit"] == "Submit") {
        
        $errorMessage = "";

        if(!isset($_POST['showcustomers'])&&!isset($_POST['showboys'])&&!isset($_POST['showorders'])) {
            $errorMessage .= "None";
            echo "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>";
            echo "<span class='sr-only'>Error:</span>";
            echo " You didn't select anything!";
            echo "</div>";
        }
          
        echo('<html>
        <head></head>
        <body>');
        
        if(empty($errorMessage)) {
            $db = mysql_connect("localhost","root","");

            if(!$db) die("Error connecting to MySQL database.");
            mysql_select_db("delivery" ,$db);

            if (isset($_POST['showcustomers'])) {
                $customerresult = mysql_query("SELECT * FROM customer");

                echo "<h3>Customers</h3><br/ ><table class='table table-striped table-hover'><thead><tr><th>ID</th><th>Name</th><th>Orders</th></tr></thead>";
                
                while($row= mysql_fetch_array($customerresult))
                      echo("<tr><td>".
                            $row['id']."</td><td>".
                            $row['name']."</td><td>".
                            $row['num_orders']."</td></tr>");
             echo "</table>";
            }

            if (isset($_POST['showboys'])) {
                $boysresult = mysql_query("SELECT * FROM boy");

                echo "<h3>Boys</h3><br/ ><table class='table'><tr><td>ID</td><td>Name</td><td>Area</td></tr>";
                while($row = mysql_fetch_array($boysresult))
                      echo("<tr><td>".
                           $row['id']."</td><td>".
                           $row['name']."</td><td>".
                           sprintf('%05d', $row['area'])."</td></tr>");
                echo "</table>";
            }
            

            if (isset($_POST['showorders'])) {
                $ordersresult = mysql_query("SELECT C.name AS cname, B.name AS bname, O.description, O.price, O.id 
                    FROM boy B, customer C, orders O
                    WHERE B.id = O.boy_id AND C.id = O.customer_id");

                echo "<h3>Orders</h3><br/ ><table class='table'><tr><td>Customer</td><td>Boy</td><td>Description</td><td>Price</td><td>ID</td></tr>";
                while($row = mysql_fetch_array($ordersresult))
                      echo("<tr><td>".
                           $row['cname']."</td><td>".
                           $row['bname']."</td><td>".
                           $row['description']."</td><td>".
                           $row['price']."</td><td>".
                           $row['id']."</td></tr>");
                echo "</table>";
            }


            echo "<a href='admin.html' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-repeat' aria-hidden='true'></span> Generate Another Report</a>";
            exit();
        }
        else {
            echo "<a href='admin.html' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-repeat' aria-hidden='true'></span> Try Again</a>";
        } 
    }

?>