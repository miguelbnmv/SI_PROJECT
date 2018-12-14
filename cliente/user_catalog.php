<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/catalog.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/header.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<div id="mySidenav" class="sidenav w-color">
    <div class="flex-between">
        <div class="account" style="margin-top: 4px">
            <a href="../cliente/menu.php">
            <img class="account-image"  src="../assets/images/menu.png" alt="plus btn">
            </a>
            <h2>Catalog</h2>
        </div>
        <p style="margin-bottom: 30px">To make your life <strong>a lot easier </strong>, <br>sort by</p>
        <form method="POST" id="formCreateComment">

            <label class="check_container1">Name
                <input type="radio" name="order" value="book_name">
                <span value="book_name" class="checkmark1"></span>
            </label>
            <label class="check_container1">Author
                <input type="radio" name="order" value="book_author">
                <span value="book_author" class="checkmark1"></span>
            </label>
            <label class="check_container1">Year
                <input type="radio" name="order" value="book_date">
                <span value="book_date" class="checkmark1"></span>
            </label>
            <label class="check_container1">Price
                <input type="radio" name="order" value="book_price">
                <span value="book_price" class="checkmark1"></span>
            </label>
            <label class="check_container1">Publishing Company
                <input type="radio" name="order" value="book_publisher">
                <span value="book_publisher" class="checkmark1"></span>
            </label>
            <input class="order" type='submit' value='submit_order' name='submit_order'>

        </form>

        <label class="check_container">Account
            <input type="radio" name="radio">
            <a href="../cliente/cliente_account-settings.php" class="checkmark"></a>
        </label>
        <div class="logout w-color">
            <img  src="../assets/images/logout.png" alt="plus btn">
            <a class="w-color" href="../geral/logout.php">Logout</a>
        </div>
    </div>
</div>
  <section class="main">
      <?php
      include '../geral/header.php';
      ?>
      <form name="search" method="post" style="margin-bottom: 30px">
          <input type="text" name="find" placeholder="Search for something..."/> for
          <div class="styled-select black rounded">
              <select name="field">
                  <Option VALUE="book_name">name</option>
                  <Option VALUE="book_price">price</option>
              </select>
          </div>
          <input type="hidden" name="searching" value="yes" />
          <input type="submit" name="search" value="Search" />
      </form>

      <?php
      include '../geral/server-connection.php';
      if(isset($_POST["search"])) {
          $searching = $_POST['searching'];
          $find = $_POST['find'];
          $field = $_POST['field'];
          if ($find == "") { //se a pessoa não colocar nada no input find, se nao pesquisar por nada
              echo "<p>You forgot to enter a search term";
          }
          $query = "SELECT * from livro where $field = '$find' ";
          $result = pg_query($query);
          $resultall = pg_fetch_all($result);
          if (!$result) {
              die("Error in SQL query: " . pg_last_error());
          }
          echo "<div class='main-container'>";
          foreach ($resultall as $linha) {
          echo "
                  <div class='book'>
                    <div class='book_img'>
                      <img src='../assets/covers/{$linha['book_cover']}'>
                      </div>
                      <div class='book_content'>
                      <p class='book_title'>{$linha['book_name']}</p>
                      <p class='book_price'>{$linha['book_price']}€</p>
                      </div>
                  </div>
         ";
          }
          $rows = pg_num_rows($result);
          if ($rows == 0)
          {
              echo "Sorry, but we can not find an entry to match your query<br><br>";
          }

      } else if(isset($_POST["submit_order"])) {
            $result = pg_query($connection, "SELECT book_id, book_name, book_author, book_price, book_publisher, book_date, book_cover FROM livro order by {$_POST["order"]}");
            $result = pg_fetch_all($result);
          echo "<div class='main-container'>";
            foreach ($result as $linha) {
                $Book_comprado = pg_query($connection, "SELECT book_id FROM compra where book_id='{$linha['book_id']}'");
                $Book_comprado_result = pg_numrows($Book_comprado);
                if ($Book_comprado_result>0) {
                    echo "
                    <div class='book'>
                             <div class='book_img'>
                           <a href='user_book_b.php?id={$linha['book_id']}'>
                                </div> 
                          <img src='../assets/covers/{$linha['book_cover']}'>
                             <div class='book_content'>
                          <p class='book_title'>{$linha['book_name']}</p>
                          <p class='book_price'>{$linha['book_price']}€</p>
                               </div>
                        </a>
                    </div> 
                    ";
                }
                else {
                    echo "
                    <div class='book'>
                            <div class='book_img'>
                        <a href='user_book_nb.php?id={$linha['book_id']}'>
                               </div>
                                              <div class='book_content'>
                          <img src='../assets/covers/{$linha['book_cover']}'>
                          <p class='book_title'>{$linha['book_name']}</p>
                          <p class='book_price'>{$linha['book_price']}€</p>
                                    </div>
                        </a>
                    </div> 
            ";

                }
            }
        } else {
          echo "<div class='main-container'>";
            $result = pg_query($connection, "SELECT book_id, book_name, book_author, book_price, book_publisher, book_date, book_cover FROM livro");
            $result = pg_fetch_all($result);
            foreach ($result as $linha){
                $Book_comprado = pg_query($connection, "SELECT book_id FROM compra  WHERE book_id = {$linha['book_id']}");
                $Book_comprado_result = pg_num_rows($Book_comprado);
                if ($Book_comprado_result >0) {
                    echo "
                    <div class='book'>
                             <div class='book_img'>
                           <a href='user_book_b.php?id={$linha['book_id']}'>
                                </div> 
                          <img src='../assets/covers/{$linha['book_cover']}'>
                             <div class='book_content'>
                          <p class='book_title'>{$linha['book_name']}</p>
                          <p class='book_price'>{$linha['book_price']}€</p>
                               </div>
                        </a>
                    </div> 
            ";
                }
                else{
                    echo "
                       <div class='book'>
                            <div class='book_img'>
                        <a href='user_book_nb.php?id={$linha['book_id']}'>
                               </div>
                                              <div class='book_content'>
                          <img src='../assets/covers/{$linha['book_cover']}'>
                          <p class='book_title'>{$linha['book_name']}</p>
                          <p class='book_price'>{$linha['book_price']}€</p>
                                    </div>
                        </a>
                    </div> 
            ";

                }
            }
        }
        ?>
      </div>
  </section>
</body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>