<?php               

    $db = mysql_connect("localhost","root","");
    if(!$db) die("Error connecting to MySQL database.");
    mysql_select_db("delivery" ,$db);
    $result = mysql_query("SELECT * FROM food");
    

    exit();
?>