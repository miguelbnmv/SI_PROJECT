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
      <form method="POST" id="formCreateComment">
          <label class="check_container">Name
              <input type="radio" name="order" value="book_name">
              <span value="book_name" class="checkmark"></span>
          </label>
          <label class="check_container">Author
              <input type="radio" name="order" value="book_author">
            <span value="book_author" class="checkmark"></span>
          </label>
          <label class="check_container">Year
              <input type="radio" name="order" value="book_date">
            <span value="book_date" class="checkmark"></span>
          </label>
          <label class="check_container">Price
              <input type="radio" name="order" value="book_price">
            <span value="book_price" class="checkmark"></span>
          </label>
          <label class="check_container">Publishing Company
              <input type="radio" name="order" value="book_publisher">
              <span value="book_publisher" class="checkmark"></span>
          </label>
          <input type='submit' value='submit_order' name='submit_rating'>
      </form>
  </div>
  <section class="main">
      <?php
        include 'header.php';
      ?>
      <div class="main-container">
        <?php
        include 'server-connection.php';

        if(isset($_POST["submit_rating"])) {
            $result = pg_query($connection, "SELECT book_name, book_author, book_price, book_publisher, book_date FROM livro order by {$_POST["order"]}");
            $result = pg_fetch_all($result);
            foreach ($result as $linha)
            {
                echo ("<div class=\"book\">
                      <img src=\"assets/images/cover.jpg\">
                      <p class=\"book_title\">{$linha['book_name']}</p>
                      <p class=\"book_price\">{$linha['book_price']}€</p>
                   </div>");
            }
        } else {
            $result = pg_query($connection, "SELECT book_name, book_author, book_price, book_publisher, book_date FROM livro");
            $result = pg_fetch_all($result);
            foreach ($result as $linha)
            {
               echo ("<div class=\"book\">
                      <img src=\"assets/images/cover.jpg\">
                      <p class=\"book_title\">{$linha['book_name']}</p>
                      <p class=\"book_price\">{$linha['book_price']}€</p>
                   </div>");
            }
        }
        ?>
      </div>
      <div class="logout b-color">
          <a class="b-color" href="logout.php">logout</a>
      </div>
  </section>
</body>
</html>
