<?php               

    if($_POST['submit'] == 'Submit'){
        
        
        $address = $_POST['address'];
        $area = $_POST['area'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        
        $error = "";
        
        if(preg_match("/^\d+$/", $area) == 0){
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

            //works
            while($row= mysql_fetch_array($result)){
                if($_POST["".$row['id']] > 0){
                    $items .= $row['id'] . "x" . $_POST["".$row['id']]." ";
                    $price += $row['price'] * $_POST["".$row['id']];
                }
            }

            //works
            if(empty($id)){
                mysql_query("INSERT INTO customer(name, num_orders) VALUES (".PrepSQL($name).",1)");
                $newid = mysql_query("SELECT ID FROM customer WHERE name = " . PrepSQL($name) . " ORDER BY id DESC LIMIT 1");
                $row = mysql_fetch_array($newid);
                $id = $row['ID'];
                echo "Your new customer ID is ".$row['ID'];
            } else {
                mysql_query("UPDATE customer SET num_orders = num_orders + 1 WHERE id = " . PrepSQL($id));
            }

            //works
            $boys = mysql_query("SELECT * FROM boy WHERE area = ".PrepSQL($area));
            $row = mysql_fetch_array($boys);
            echo "Your boy is ". $row['name'];
            //assigns you a boy
            
            mysql_query("INSERT INTO orders (description, price, boy_id, customer_id) VALUES (".PrepSQL($items).", ".$price.", ".$row['id'].", ".$id.")"); //creates the order

            exit();
        }else{
            echo $error;
        }
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
?>