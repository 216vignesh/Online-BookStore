<?php
  require_once "./db.php";
  $user = 'admin';
  $password = 'Fit4M0Re!';
  session_start();
// Database name is geeksforgeeks
  $database = 'BookStore';
// Server is localhost with
// port number 3306
  $servername='dbms-project.csddeoelb5pk.us-east-1.rds.amazonaws.com:3306';
  $mysqli = new mysqli($servername, $user,
                $password, $database);
$link = mysqli_connect($servername, $user, $password, $database);
  
  if(isset($_POST['Title']))
  {
    $_SESSION['Title']=$_POST['book'];
    // $_SESSION['title']=$_POST['title'];
    $sql = "SELECT Book.title AS Title, Author.name AS Author_Name, Edition.price AS Price, Edition.Format as Format FROM Book INNER JOIN Edition ON Edition.bid=Book.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid where Book.title='".$_SESSION['Title']."'";
    if(mysqli_query($link, $sql)){
                
                } else{
                echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
                }    
    $result2 = $mysqli->query($sql);
    $mysqli->close();
  }

  if(isset($_POST['add'])){
                $_SESSION['title']=$_POST['title'];
                $_SESSION['price']=$_POST['price'];
                $_SESSION['quantity']=$_POST['quantity'];
                $sql = "SELECT Book.title AS Title, Author.name AS Author_Name, Edition.price AS Price, Edition.Format as Format FROM Book INNER JOIN Edition ON Edition.bid=Book.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid where Book.title='".$_SESSION['title']."'";
                
                $sql2="INSERT INTO Cart(email,quantity,price,book_title)Values('aallen@example.net','".$_SESSION['quantity']."','".$_SESSION['price']."','".$_SESSION['title']."')";
                if(mysqli_query($link, $sql2)){
                
                } else{
                echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
                }                 
                
                $result2 = $mysqli->query($sql);
                $mysqli->close();
                }
 
  if (isset($_POST['query'])) {
      $query = "SELECT Book.title AS Title, Author.name AS Author_Name, Edition.price AS Price FROM Book INNER JOIN Edition ON Edition.bid=Book.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid where Title LIKE '%{$_POST['query']}%'";
      $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
          
        // echo $res['Title']. "<br/>";
        echo "<form action='ajax-live-search.php' method='post' accept-charset='utf-8' class='custom-display-book'>
        
        <input type='text' name='book' value='".$res['Title']."' readonly>
        <input type='submit' name='Title' value='Check this book'>
        </form>";
      }
    } else {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          Book not found
      </div>
      ";
    }
  }

?>
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
    <form action="cart.php" method="post" accept-charset="utf-8" class="custom-add2cart">
   <div class="add-button-wrapper widget-fingerprint-product-add-button">
       <input type="submit" name="display_cart"class="btn regular-button regular-main-button add2cart submit" value="Display cart">
           
   </div>
</form>
    <section>
        <h1>About this book</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Format type</th>
                <th>Add to Cart</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php

                // LOOP TILL END OF DATA
                while($rows=$result2->fetch_assoc())
                {
                    
                    
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><input type="text" name="title" value="<?php echo $rows["Title"] ?>" readonly></td>
                <td><?php echo $rows['Author_Name'];?></td>
                <td><input type="text" name="price" value="<?php echo $rows['Price'] ?>" readonly></td>
                <td><input type="text" name="format" value="<?php echo $rows['Format'] ?>" readonly></td>
                <td><input type="number" name="quantity"><input type="submit" name="add" value="Add to Cart"></td>
                
            </tr>
        </form>
            <?php
                
                }
            ?>
        </table>
        </section>

    
</body>
 
</html>