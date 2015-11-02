<?php               

    if($_POST['submit'] == 'submit'){
        
        
        $address = $_POST['address'];
        $area = $_POST['area'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        
        
        //todo check if name/custID/address/area are valid
        
        
        
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




        mysql_query("INSERT INTO order ()"); //todo create the order



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
    }
?>