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

                
                while($row= mysql_fetch_array($result))
        
                      echo ("<div class='container'>
                            <div class='list-group'>".
                            $row['name']." ".
                            "$".$row['price'].
                            "<span class='pull-right'>
                                <div class='input-group input-group-sm'>
                               
                <span class='input-group-addon'><i class='glyphicon glyphicon-shopping-cart'></i></span>
                <input type='text' class='form-control' name='quantity' value='' placeholder='Quantity'>
                                                            
                </div>
                             </span></div></div>");

            ?>
            <br>
            <!--<form name="order_customer_info" role="form" action="checkout.php" method="post"> -->
                
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" class="form-control" name="address" value="" placeholder="Your address">                                        
                </div>
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                <input type="text" class="form-control" name="area" value="" placeholder="Your area code">                                        
                </div>
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"></i></span>
                <input type="text" class="form-control" name="id" value="" placeholder="Your customer ID (if applicable)"> 
                </div>
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" name="name" value="" placeholder="Your name"> 
                </div>
                <br><br>
                
                <button type="submit" class="btn btn-success" name="submit" value="Submit"><span class="glyphicon glyphicon-check"></span>  Checkout</button>
            <!--</form>-->


        </form>
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  
</body>
</html>

