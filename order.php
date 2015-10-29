<HTML>
    <head><title>Add Menu Item</title></head>
    <body>
        Add Menu Item
        <form action = "checkout.php" method="post">
            
            Item name <input type = "text" name ="Name"><br>
            Price<input type = "text" name="Price"><br>

            <?php

                $db = mysql_connect("localhost","root","");

                        if(!$db) die("Error connecting to MySQL database.");
                        mysql_select_db("delivery" ,$db);
               
                $result = mysql_query("SELECT * FROM food");

                echo "Food<br/> 
                <table border = 1>
                <tr><td>ID</td><td>name</td><td>price</td><td>order?</td></tr>";
                while($row= mysql_fetch_array($bookresult))
                      echo("<tr><td>".
                            $row['ID']."</td><td>".
                            $row['name']."</td><td>".
                            $row['price']."</td></tr>".
                            "<input type='checkbox' name='".$row['ID']."' value='".$row['ID']."'>");
             echo "</table>";

            ?>
            
            
            <input type="submit" name="submit" value="submit"/>

        </form>
    </body>
</HTML>    
