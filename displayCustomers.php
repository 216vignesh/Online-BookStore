<!-- PHP code to establish connection with the localserver -->
<?php

$user = 'admin';
$password = 'Fit4M0Re!';
$database = 'BookStore';
$servername='dbms-project.csddeoelb5pk.us-east-1.rds.amazonaws.com:3306';

$mysqli = new mysqli($servername, $user, $password, $database);

$link = mysqli_connect($servername, $user, $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    echo "error";
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
    $sql = "SELECT email, name, contactno, shippingAdd 
            FROM Customer
            ORDER BY name
            LIMIT 100;";

?>

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
 
<head>
    <meta charset="UTF-8">
    
    <title>Sales Report Table</title>
    
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    <section>
        <h1>Sales Report Table</h1>
        <!-- TABLE CONSTRUCTION email, name, contactno, shippingAdd -->
        <table>
            <tr>
                <th>Email</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Shipping Address</th>

            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                $result = $mysqli->query($sql);
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
                    
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH ROW OF EVERY COLUMN-->
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['contactno'];?></td>
                <td><?php echo $rows['shippingAdd'];?></td>
            </tr>
        </form>
            <?php
                
                }
                $mysqli->close();
            ?>
        </table>
        </section>

    
</body>
 
</html>
