<?php
    
    if($_POST["submit"] == "Submit") {
        
        $errorMessage = "";

        if(!isset($_POST['showcustomers'])&&!isset($_POST['showboys'])&&!isset($_POST['showorders'])) {
            $errorMessage .= "None";
            echo " You didn't select anything!";
        }
          
        echo('<html>
        <head></head>
        <body>');
        
        if(empty($errorMessage)) {
            $db = mysql_connect("localhost","root","");

            if(!$db) die("Error connecting to MySQL database.");
            mysql_select_db("delivery" ,$db);

            if (isset($_POST['showcustomers'])) {
                $customerresult = mysql_query("SELECT * FROM customers");

                echo "<h3>Customers</h3><br/ ><table border='1'><tr><td>ID</td><td>Name</td><td>Orders</td></tr>";
                while($row= mysql_fetch_array($customerresult))
                      echo("<tr><td>".
                            $row['ID']."</td><td>".
                            $row['name']."</td><td>".
                            $row['num_order']."</td></tr>");
             echo "</table>";
            }

            if (isset($_POST['showboys'])) {
                $boysresult = mysql_query("SELECT * FROM boys");

                echo "<h3>Boys</h3><br/ ><table border='1'><tr><td>ID</td><td>Name</td><td>Area</td></tr>";
                while($row = mysql_fetch_array($boysresult))
                      echo("<tr><td>".
                           $row['ID']."</td><td>".
                           $row['name']."</td><td>".
                           $row['area']."</td></tr>");
                echo "</table>";
            }

            if (isset($_POST['showorders'])) {
                $ordersresult = mysql_query("SELECT C.name AS cname, B.name AS bname, O.description, O.price, O.id 
                    FROM boy B, customer C, orders O
                    WHERE B.id = O.boy_id AND C.id = O.customer_id");

                echo "<h3>Orders</h3><br/ ><table border='1'><tr><td>Customer</td><td>Boy</td><td>Description</td><td>Price</td><td>ID</td></tr>";
                while($row = mysql_fetch_array($loanresult))
                      echo("<tr><td>".
                           $row['cname']."</td><td>".
                           $row['bname']."</td><td>".
                           $row['description']."</td><td>".
                           $row['price']."</td><td>".
                           $row['id']."</td></tr>");
                echo "</table>";
            }


            echo "<a href='report.html' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-repeat' aria-hidden='true'></span> Submit Another Entry</a>";
            exit();
        }
        else {
            echo "<a href='report.html' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-repeat' aria-hidden='true'></span> Try Again</a>";
        } 
    }

?>