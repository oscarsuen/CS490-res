<HTML>
    <head><title>Add Menu Item</title></head>
    <body>
        Add Menu Item
        <form action = "checkout.php" method="post">
           <table border = 1>
            
            Item name <input type = "text" name ="Name"><br>
            Price<input type = "text" name="Price"><br>

            <?php

                $db = mysql_connect("localhost","root","");

                        if(!$db) die("Error connecting to MySQL database.");
                        mysql_select_db("delivery" ,$db);
               
                $result = mysql_query("SELECT * FROM food");

                echo "<h3>Books</h3><br/ ><table class='table table-striped'><tr><td>ID</td><td>Title</td><td>Author</td><td>ISBN</td><td>Call No</td><td>Shelf Status</td></tr>";
                while($row= mysql_fetch_array($bookresult))
                      echo("<tr><td>".
                            $row['ID']."</td><td>".
                            $row['title']."</td><td>".
                            $row['author']."</td><td>".
                            $row['ISBN']."</td><td>".
                            $row['call_no']."</td><td>".
                            $row['shelf_status']."</td></tr>");
             echo "</table>";

               


            ?>
            
            </table>       
            
            <input type="submit" name="submit" value="submit"/>

        </form>
    </body>
</HTML>    
