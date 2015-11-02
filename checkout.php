<?php               

    $db = mysql_connect("localhost","root","");
    if(!$db) die("Error connecting to MySQL database.");
    mysql_select_db("delivery" ,$db);
    $result = mysql_query("SELECT * FROM food");
    
    $items = ""; // list of item ids
    $price = 0; //total price of the order

    while($row= mysql_fetch_array($result)){
        if($_POST["".$row['id']] == 'true'){
            $items .= $row['id'] . " ";
            $price += $row['price'];
        }
    } 

    
    //address now


    mysql_query("INSERT INTO order ()");

        //todo check which check boxes are checked, add those ids to the description, query for a boy, add an order and compute price
    

    exit();

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