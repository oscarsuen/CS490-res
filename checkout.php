<?php               

    $db = mysql_connect("localhost","root","");
    if(!$db) die("Error connecting to MySQL database.");
    mysql_select_db("delivery" ,$db);
    $result = mysql_query("SELECT * FROM food");
    
    $items[];

    while($row= mysql_fetch_array($result));
        

    exit();
?>