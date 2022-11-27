<!-- PHP code to establish connection with the localserver -->
<?php

$user = 'admin';
$password = 'Fit4M0Re!';
 
$database = 'BookStore';
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

    $sql = "SELECT pid FROM Publisher;";
    $result1 = $mysqli->query($sql);
    $result2 = $mysqli->query($sql);
    $result3 = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Update</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      }
      h1 {
      margin: 0;
      font-weight: 400;
      }
      h3 {
      margin: 12px 0;
      color: #8ebf42;
      }

      .main-block {
      display: flex;
      align-items: center;
      
      background: #fff;
      }
      form {
      width: 100%;
      padding: 20px;
      }
      fieldset {
      border: none;
      border-top: 1px solid #8ebf42;
      }
      .account-details, .personal-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .account-details >div, .personal-details >div >div {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      }
      .account-details >div, .personal-details >div, input, label {
      width: 100%;
      }
      label {
      padding: 0 5px;
      text-align: right;
      vertical-align: middle;
      }
      input {
      padding: 5px;
      vertical-align: middle;
      }
      .checkbox {
      margin-bottom: 10px;
      }
      select, .children, .gender, .bdate-block {
      width: calc(100% + 26px);
      padding: 5px 0;
      }
      select {
      background: transparent;
      }
      .gender input {
      width: auto;
      } 
      .gender label {
      padding: 0 5px 0 0;
      } 
      .bdate-block {
      display: flex;
      justify-content: space-between;
      }
      .birthdate select.day {
      width: 35px;
      }
      .birthdate select.mounth {
      width: calc(100% - 94px);
      }
      .birthdate input {
      width: 38px;
      vertical-align: unset;
      }
      .checkbox input, .children input {
      width: auto;
      margin: -2px 10px 0 0;
      }
      .checkbox a {
      color: #8ebf42;
      }
      .checkbox a:hover {
      color: #82b534;
      }
      button {
      width: 50%;
      padding: 10px 50px;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background: #8ebf42; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #82b534;
      }
      @media (min-width: 568px) {
      .account-details >div, .personal-details >div {
      width: 50%;
      }
      label {
      width: 40%;
      }
      input {
      width: 60%;
      }
      select, .children, .gender, .bdate-block {
      width: calc(60% + 16px);
      }
      }
    </style>
  </head>
  <body>
    <form role="form" method="post" action="updateAll.php" id="pubById" align="center">
      <h1>Update Publisher Details</h1>
      <fieldset>
        <div class="account-details">
          <!--<div><label>Publisher ID (Should already exist)</label><input type="text" name="pId" required></div>-->
          <div>
            <label>Publisher ID</label>
              <!--<select name="PublisherID" required id="PublisherID">
                <option value="here">here</option>-->
                <?php 
                echo "<select id='pId' name='pId'>";

                while ($row = mysqli_fetch_array($result1)) {
                   unset($id, $name);
                   $id = $row['pid'];
                   $name = $row['name']; 
                   ?>
                   <!--echo '<option value="'.$id.'">'.$name.'</option>';-->
                   <option value="<?= $id?>"><?= $id?></option>
                 <?php }
                 echo "</select>";
                ?>
              <!--</select>-->
            </div>
          <div><label>Publisher Name</label><input type="text" name="publisherName" required></div>
          <div><label>Year Established</label><input type="number" min="0" step="any" name="publisherYear" required></div>
        </fieldset>
      <button type="submit" href="/" name="pubById">Submit</button>
    </form>

    <!--<form role="form" method="post" action="updateAll.php" id="pubByName" align="center">
      <h1>Update publisher details by entering Name</h1>
      <fieldset>
        <div class="account-details">
          <div><label>Publisher ID</label><input type="text" name="pid" required></div>
          <div><label>Publisher Name</label><input type="text" name="publisherName" required></div>
          <div><label>Year Established</label><input type="number" min="0" min="0" step="any" name="publisherYear" required></div>
        </fieldset>
      <button type="submit" href="/" name="pubByName" >Submit</button>
    </form>

    <form role="form" method="post" action="updateAll.php" id="bkByTitle" align="center">
      <h1>Update book details by entering Book Title</h1>
      <fieldset>
        <div class="account-details">
          #<Book(title, book id, pid)>
          <div><label>Book Title</label><input type="text" name="bTitle" required></div>
          <div><label>Book ID</label><input type="text" name="bId" required></div>
          <div><label>Publisher ID (Should already exist)</label><input type="text" name="pId" required></div>
          <div>
            <label>Publisher ID</label>
              #<select name="PublisherID" required id="PublisherID">
                #<option value="here">here</option>
                <?php 
                echo "<select id='pId' name='pId'>";

                while ($row = mysqli_fetch_array($result2)) {
                   unset($id, $name);
                   $id = $row['pid'];
                   $name = $row['name']; 
                   ?>
                   #echo '<option value="'.$id.'">'.$name.'</option>';
                   <option value="<?= $id?>"><?= $id?></option>
                 <?php }
                 echo "</select>";
                ?>
              #</select>
            </div>
        </fieldset>
      <button type="submit" href="/" name="bkByTitle" >Submit</button>
    </form>-->

    <form role="form" method="post" action="updateAll.php" id="bkById" align="center">
      <h1>Update Book Details</h1>
      <fieldset>
        <div class="account-details">
          <!--Book(title, book id, pid)-->
          <div><label>Book Title</label><input type="text" name="bTitle" required></div>
          <div><label>Book ID</label><input type="text" name="bId" required></div>
          <!--<div><label>Publisher ID (Should already exist)</label><input type="text" name="pId" required></div>-->
          <div>
            <label>Publisher ID</label>
              <!--<select name="PublisherID" required id="PublisherID">
                <option value="here">here</option>-->
                <?php 
                echo "<select id='pId' name='pId'>";

                while ($row = mysqli_fetch_array($result3)) {
                   unset($id, $name);
                   $id = $row['pid'];
                   $name = $row['name']; 
                   ?>
                   <!--echo '<option value="'.$id.'">'.$name.'</option>';-->
                   <option value="<?= $id?>"><?= $id?></option>
                 <?php }
                 echo "</select>";
                ?>
              <!--</select>-->
            </div></div>
        </fieldset>
      <button type="submit" href="/" name="bkById" >Submit</button>
    </form>

    <!--aid name country-->
    <form role="form" method="post" action="updateAll.php" id="authById" align="center">
      <h1>Update Author Details</h1>
      <fieldset>
        <div class="account-details">
          <div><label>Author ID</label><input type="text" name="aId" required></div>
          <div><label>Author Name</label><input type="text" name="aName" required></div>
          <div><label>Country</label>
          <select name="country" required>
            <option value="">Select...</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="New Zealand">New Zealand</option>
              <option value="Norway">Norway</option>
              <option value="United States">United States</option>
              <option value="Brazil">Brazil</option>
              <option value="Germany">Germany</option>
              <option value="Hong Kong">Hong Kong</option>
              <option value="Canada">Canada</option>
              <option value="South Africa">South Africa</option>
              <option value="China">China</option>
              <option value="Netherlands">Netherlands</option>
              <option value="Singapore">Singapore</option>
              <option value="ZZ">ZZ</option>
          </select>
          </div>
        </fieldset>
      <button type="submit" href="/" name="authById" >Submit</button>
    </form>

    <!--<form role="form" method="post"action="updateAll.php"id="authByName" align="center">
      <h1>Update author details by entering Author Name</h1>
      <fieldset>
        <div class="account-details">
          <div><label>Author ID</label><input type="text" name="aId" required></div>
          <div><label>Author Name</label><input type="text" name="aName" required></div>
          <div><label>Country</label>
          <select name="country" required>
            <option value="">Select...</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="New Zealand">New Zealand</option>
              <option value="Norway">Norway</option>
              <option value="United States">United States</option>
              <option value="Brazil">Brazil</option>
              <option value="Germany">Germany</option>
              <option value="Hong Kong">Hong Kong</option>
              <option value="Canada">Canada</option>
              <option value="South Africa">South Africa</option>
              <option value="China">China</option>
              <option value="Netherlands">Netherlands</option>
              <option value="Singapore">Singapore</option>
              <option value="ZZ">ZZ</option>
          </select>
          </div>
        </fieldset>
      <button type="submit" href="/" name="authByName" >Submit</button>
    </form>-->

    <!--
    Decide how and what can be updated in Awards table
    <form role="form" method="post"action="updateAll.php"id="awards" align="center">
      <h1>Update awards table</h1>
      <fieldset>
        <div class="account-details">
          <div><label>Book Title</label><input type="text" name="bTitle" required></div>
          <div><label>Award Name</label><input type="text" name="awardName" required></div>
          <div><label>Award Year</label><input type="number" min="1900" max="2022" name="awardYear" required></div>
          <div><label>Book Title New</label><input type="text" name="bTitleNew" required></div>
          <div><label>Updated Award Name</label><input type="text" name="awardNameNew" required></div>
          <div><label>Updated Award Year</label><input type="number" min="1900" max="2022" name="awardYearNew" required></div>
        </fieldset>
      <button type="submit" href="/" name="awards" >Submit</button>
    </form>-->

    <form role="form" method="post"action="updateAll.php"id="info" align="center">
      <h1>Update Info Table</h1>
      <fieldset>
        <div class="account-details">
          <div><label>Book ID</label><input type="text" name="bId" required></div>
          <div><label>Genre </label>
          <select name="genre" required>
              <option value="">Select...</option>
              <option value="Young Adult">Young Adult</option>
              <option value="Mystery">Mystery</option>
              <option value="Fiction">Fiction</option>
              <option value="Childrens">Childrens</option>
              <option value="SciFi/Fantasy">SciFi/Fantasy</option>
              <option value="Romance">Romance</option>
              <option value="Nonfiction">Nonfiction</option>
              <option value="Memoir">Memoir</option>
          </select>
          </div>
          <div><label>Volume</label><input type="number" min="0" name="volume" required></div>
        </fieldset>
      <button type="submit" href="/" name="info" >Submit</button>
    </form>

    <form role="form" method="post"action="updateAll.php"id="editionIsbn" align="center">
      <h1>Update Edition Table</h1>
      <fieldset><!--isbn='', bid='', publication_date='', pages='', print_run='', price='', format=''-->
        <div class="account-details">
          <div><label>ISBN</label><input type="text" name="isbn" required></div>
          <div><label>Book ID</label><input type="text" name="bid" required></div>
          <div><label>Publication Date</label><input type="date" name="pubDate" required></div>
          <div><label>Pages</label><input type="number" min="0" name="pages" required></div>
          <div><label>Print Run</label><input type="number" min="0" name="printRun" required></div>
          <div><label>Price</label><input type="number" min="0" step="any" name="price" required></div>
          <div><label>Format </label>
            <select name="format" required>
              <option value="">Select...</option>
              <option value="Mass market paperback">Mass market paperback</option>
              <option value="Board book">Board book</option>
              <option value="Paperback">Paperback</option>
              <option value="Trade paperback">Trade paperback</option>
              <option value="Hardcover">Hardcover</option>
              <option value="Graphic">Graphic</option>
            </select>
          </div>
        </fieldset>
      </div>
      <button type="submit" href="/" name="editionIsbn" >Submit</button>
    </form>

    <!--<form role="form" method="post"action="updateEditionBid.php"id="editionBid" align="center">
      <h1>Update Edition table by Book ID</h1>
      <fieldset>
        <div class="account-details">
          <div><label>ISBN</label><input type="text" name="isbn" required></div>
          <div><label>Book ID</label><input type="text" name="bid" required></div>
          <div><label>Publication Date</label><input type="date" name="pubDate" required></div>
          <div><label>Pages</label><input type="number" min="0" name="pages" required></div>
          <div><label>Print Run</label><input type="number" min="0" name="printRun" required></div>
          <div><label>Price</label><input type="number" min="0" step="any" name="price" required></div>
          <div><label>Format</label><input type="text" name="format" required></div>
        </fieldset>
      <button type="submit" href="/" name="editionBid" >Submit</button>
    </form>-->

  </body>
</html>