<?php               

    if($_POST['submit'] == 'submit'){
        
        
        $address = $_POST['address'];
        $area = $_POST['area'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        
        $error = "";
        
        if(preg_match("/^\d\d?$", $area) == 0){
            $error.="You forgot to enter a valid area. ";
        }
        if(empty($id) && empty($name)){
            $error.= "Please enter a valid customer ID or your name.";
        }
        
        
        if(empty($error)){
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

            if(empty($id)){
                mysql_query("INSERT INTO customer(name, num_orders) VALUES (".PrepSQL($name).",1)");
                $newid = mysql_query("SELECT ID FROM customer WHERE name = " . PrepSQL($name) . " ORDER BY id DESC LIMIT 1");
                $row = mysql_fetch_array($newid);
                $id = $row['ID'];
                echo "Your new customer ID is ".$row['ID'];
            }else{
                mysql_query("UPDATE customer SET num_rows = num_rows + 1 WHERE id = " . PrepSQL($id));
            }

            $boys = mysql_query("SELECT * FROM boy WHERE area = ".PrepSQL($area));
            $row = mysql_fetch_array($boys);
            echo "Your boy is ". $row['name'];
            //assigns you a boy

            mysql_query("INSERT INTO order (description, price, boy_id, customer_id) VALUES (".PrepSQL($items).", ".$price.", ".$row[id].", ".PrepSQL($id)); //creates the order

            exit();
        }else{
            echo $error;
        }
        
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