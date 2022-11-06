<?php
  require_once "./db.php";
 
  if (isset($_POST['query'])) {
      $query = "SELECT Book.title AS Title, Author.name AS Author_Name, Edition.price AS Price FROM Book INNER JOIN Edition ON Edition.bid=Book.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid where Title LIKE '%{$_POST['query']}%'";
      $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
        // echo $res['Title']. "<br/>";
        echo "<form action='display_book.php' method='post' accept-charset='utf-8' class='custom-display-book'>
        <a href='display_book.php?id='".$res['Title']."' target='_blank'>".$res['Title']."</a><br/>
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