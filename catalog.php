<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/catalog.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
  <div id="mySidenav" class="sidenav w-color">
      <p class="sidebar_title">To make your life </br><strong>a lot easier</strong>, sort by</p>
      <label class="check_container">Author
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
      </label>
      <label class="check_container">Year
        <input type="radio" name="radio">
        <span class="checkmark"></span>
      </label>
      <label class="check_container">Price
        <input type="radio" name="radio">
        <span class="checkmark"></span>
      </label>
      <label class="check_container">Publishing Company
          <input type="radio" name="radio">
          <span onclick="displayForm(this)" value="1" class="checkmark"></span>
      </label>
      <div id="panel">
        <label class="check_container">Marvel
          <input type="radio" name="radio">
          <span class="checkmark"></span>
        </label>
        <label class="check_container">DC Comics
          <input type="radio" name="radio">
          <span class="checkmark"></span>
        </label>
        <label class="check_container">Others
          <input type="radio" name="radio">
          <span class="checkmark"></span>
        </label>
      </div>
      <script type="text/javascript">
          function displayForm(c){
              if(c.value == "1"){
                  document.getElementById("panel").style.visibility='visible';
              }
              else{
                  document.getElementById("panel").style.visibility='hidden';
              }
          }
      </script>
  </div>
  <section class="main">
      <?php
        include 'header.php';
      ?>
      <div class="main-container">
<?php
include 'server-connection.php';
$rowResource = pg_query($connection, "SELECT count(*) AS exact_count FROM livro");
$rowCount = pg_fetch_result($rowResource, 0, 0);

for ($i = 0; $i < $rowCount; $i++) {
    $BOOKNAME = pg_query($connection, "SELECT book_name FROM livro");
    $ALLBOOKS[$i]= pg_fetch_result($BOOKNAME,$i,0);
    $BOOKPRICE = pg_query($connection, "SELECT book_price FROM livro");
    $ALLPRICES[$i]= pg_fetch_result($BOOKPRICE,$i,0);
}
    for ($i = 0; $i < $rowCount; $i++) {
        echo ("<div class=\"book\">
          <img src=\"assets/images/cover.jpg\">
          <p class=\"book_title\">$ALLBOOKS[$i]</p>
          <p class=\"book_price\"> $ALLPRICES[$i]$</p>
        </div>");
     }
?>
    </div>

      <div class="logout b-color">
          <a class="b-color" href="logout.php">logout</a>
      </div>
      <div class="add-book">
              <div class=" w-color ">
                  <form action="admin_add.php" method="POST" id="formAdd">
                      <input name="title" type="text" placeholder="Title"/>
                      <input name="author" type="text" placeholder="Author"/>
                      <input name="publisher" type="text" placeholder="Publisher"/>
                      <input name="price" type="number" placeholder="Price"/>
                      <input name="date" type="date"/>
                      <textarea name="description" placeholder="Description"></textarea>
                      <input type="submit" name="Submit" value="Add Book"/>
                  </form>
              </div>
      </div>
  </section>
</body>
</html>");
