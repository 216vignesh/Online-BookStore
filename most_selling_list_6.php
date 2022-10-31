<!-- PHP code to establish connection with the localserver -->
<?php

 
// Username is root
$user = 'admin';
$password = 'Fit4M0Re!';
 
// Database name is geeksforgeeks
$database = 'BookStore';
 
// Server is localhost with
// port number 3306
$servername='dbms-project.csddeoelb5pk.us-east-1.rds.amazonaws.com:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}

if (isset($_POST['Memoir'])) {
// SQL query to select data from database
$sql = "SELECT Book.title AS Popular_In_Memoir, Author.name AS Author_Name,COUNT(*) AS NumberOfCopiesSold,Edition.price AS Price
FROM Book
INNER JOIN Edition ON Edition.bid=Book.bid
INNER JOIN Sales_Report ON Sales_Report.isbn=Edition.isbn
INNER JOIN Info ON Info.bid=Book.bid
INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid
WHERE Info.genre = 'Memoir'
GROUP BY Popular_In_Memoir
ORDER BY COUNT(*) DESC";
$result = $mysqli->query($sql);
$mysqli->close();


}
?>

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Online Book Store</title>
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
        <h1>Memoir Popular books</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Popular books in Memoir</th>
                 <th>Author</th>
                 <th>Price</th>
                 <th>Add to Cart</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['Popular_In_Memoir'];?></td>
                <td><?php echo $rows['Author_Name'];?></td>
                <td><?php echo $rows['Price'];?></td>
                <td><a href="#0" class="cd-add-to-cart js-cd-add-to-cart" data-price="<?php echo $rows['Price'];?>">Add To Cart</a></td>                
            </tr>
            <?php
                }
            ?>
        </table>
    </section>

    
</body>
 
</html>