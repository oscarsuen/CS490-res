<HTML>
    <head><title>Order</title></head>
    <body>
        Order
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
                            $row['id']."</td><td>".
                            $row['name']."</td><td>".
                            $row['price']."</td><td>".
                            "<input type='checkbox' name='".$row['id']."' value='".$row['id']."'></td></tr>");
             echo "</table>";

            ?>
            
            
            <input type="submit" name="submit" value="submit"/>

        </form>
    </body>
</HTML>    
