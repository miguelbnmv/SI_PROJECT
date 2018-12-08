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
        $result = pg_query($connection, "SELECT book_name, book_price FROM livro");
        $result = pg_fetch_all($result);
        foreach ($result as $linha)
        {
        echo ("<div class=\"book\">
                  <img src=\"assets/images/cover.jpg\">
                  <p class=\"book_title\">{$linha['book_name']}</p>
                  <p class=\"book_price\">{$linha['book_price']}€</p>
               </div>");
        }
        ?>
      </div>
      <div class="logout b-color">
          <a class="b-color" href="logout.php">logout</a>
      </div>
  </section>
</body>
</html>
