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

$link = mysqli_connect($servername, $user, $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}


// SQL query to select data from database
$sql = "SELECT Publisher_book.Publisher, author_writes_book_won_awards.Author,
    author_writes_book_won_awards.Book ,
    author_writes_book_won_awards.Award, Book.bid, RATING_VIEWS.Rating, 
        Edition.price, Edition.Format 
        FROM author_writes_book_won_awards
        INNER JOIN Publisher_book ON Publisher_book.Book = author_writes_book_won_awards.Book
        INNER JOIN Book ON Book.title = author_writes_book_won_awards.Book
        INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid = Book.bid
        INNER JOIN Edition ON Edition.bid = Book.bid
        ORDER BY Publisher;";

$result = $mysqli->query($sql);

if(mysqli_query($link, $sql)){
                
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}                 
                
$result = $mysqli->query($sql);
$mysqli->close();

if(isset($_POST['add'])){
                $_SESSION['title']=$_POST['title'];
                $_SESSION['price']=$_POST['price'];
                $_SESSION['quantity']=$_POST['quantity'];
                $_SESSION['bid']=$_POST['bid'];
                $_SESSION['Format']=$_POST['Format'];
                $_SESSION['Rating']=$_POST['Rating'];

                $sql = "SELECT Publisher_book.Publisher, author_writes_book_won_awards.Author,
    author_writes_book_won_awards.Book ,
    author_writes_book_won_awards.Award, Book.bid, RATING_VIEWS.Rating, 
        Edition.price, Edition.Format 
        FROM author_writes_book_won_awards
        INNER JOIN Publisher_book ON Publisher_book.Book = author_writes_book_won_awards.Book
        INNER JOIN Book ON Book.title = author_writes_book_won_awards.Book
        INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid = Book.bid
        INNER JOIN Edition ON Edition.bid = Book.bid
        ORDER BY Publisher;";
                
                $sql2="
                INSERT INTO Cart(email,quantity,price,book_title,bid,Format,Rating)
                Values('".$_SESSION['email']."','".$_SESSION['quantity']."','".$_SESSION['price']."','".$_SESSION['title']."','".$_SESSION['bid']."','".$_SESSION['Format']."','".$_SESSION['Rating']."')";

                if(mysqli_query($link, $sql2)){
                
                } else{
                echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
                }                 
                
                $result = $mysqli->query($sql);
                $mysqli->close();
                }

?>

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Top Publishers</title>
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
        <form action="cart.php" method="post" accept-charset="utf-8" class="custom-add2cart">
   <div class="add-button-wrapper widget-fingerprint-product-add-button">
       <input type="submit" name="display_cart"class="btn regular-button regular-main-button add2cart submit" value="Display cart">
           
   </div>
</form>
    <section>
        <h1>Publishing Houses with Award Winning Books</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <!--Publisher_book.Publisher, author_writes_book_won_awards.Author,
            author_writes_book_won_awards.Book ,author_writes_book_won_awards.Award-->
                <th>Publisher</th>
                <th>Author</th>
                <th>Book</th>
                
                <th>Award</th>
                <th>Book ID</th>
                <th>Format</th>
                <th>Price</th>
                <th>Add to Cart</th>
                <th>Ratings</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
                    $_SESSION["Book"]=$rows['Book'];
                    $_SESSION["Price"]=$rows['price'];
                    $_SESSION["Rating"]=$rows['Rating'];
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['Publisher'];?></td>
                <td><?php echo $rows['Author'];?></td>
                <td><input type="text" name="title" value="<?php echo $rows["Book"] ?>" readonly></td>
                <td><?php echo $rows['Award'];?></td>
                <td><input type="text" name="bid" value="<?php echo $rows['bid'];?>" readonly></td>
                <td><input type="text" name="Format" value="<?php echo $rows['Format'];?>" readonly></td>
                <td><input type="text" name="price" value="<?php echo $rows['price'] ?>" readonly></td>
                <td><input type="number" name="quantity" min="1" max="100"><input type="submit" name="add" value="Add to Cart"></td>
                <td><input type="text" name="Rating" value="<?php echo round($rows['Rating'],2);?>" readonly>
            <!--</tr>-->
        </form>
        <form action="rating.php" method="POST">
                <input type="text" name="bid" value="<?php echo $rows['bid'];?>" hidden>

                <input type="submit" name="add1" value="Submit a Review"></td>
        </form>

            </tr>
        </form>
            <?php
                }
            ?>
        </table>
    </section>

    
</body>
 
</html>