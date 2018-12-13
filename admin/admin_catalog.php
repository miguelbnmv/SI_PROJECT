<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../assets/CSS/flexboxgrid.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/catalog_admin.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<div id="mySidenav" class="sidenav w-color">
    <div class="flex-between">
    <div class="account" style="margin-top: 10px">
        <img class="account-image"  src="../assets/images/menu.png" alt="plus btn">
    <h1>Account</h1>
    </div>
    <p class="sidebar_title"><strong>Hi</strong> Admin</p>
    <label class="check_container">Catalog
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
    </label>
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
    <label class="check_container">Statistics
        <input type="radio" name="radio">
        <a href="../admin/statistics.php" class="checkmark"></a>
    </label>
    <label class="check_container">Edit Account Settings
        <input type="radio" name="radio">
        <a class="checkmark" href='../admin/admin_account-settings.php'></a>
    </label>

    <div class="logout w-color">
        <img  src="../assets/images/logout.png" alt="plus btn">
        <a class="w-color" href="../geral/logout.php">Logout</a>
    </div>
</div>
</div>
<section class="main">
    <div class="main_header">
        <h1>Catalog</h1>
        <a class="plus" href="addBook.php">
            <img class="plus-image"  src="../assets/images/plus.png" alt="plus btn">
        </a>
    </div>
    <?php
    include '../geral/header.php';
    ?>
    <div class="main-container">
        <div>
            <form name="search" method="post" style="margin-bottom: 30px">
                <input type="text" name="find" /> for
                <Select NAME="field">
                    <Option VALUE="book_name">name</option>
                    <Option VALUE="book_price">price</option>
                </Select>
                <input type="hidden" name="searching" value="yes" />
                <input type="submit" name="search" value="Search" />
            </form>
            <?php
            if(isset($_POST["search"])) {
                $searching = $_POST['searching'];
                $find = $_POST['find'];
                $field = $_POST['field'];
                if ($find == "") { //se a pessoa não colocar nada no input find, se nao pesquisar por nada
                    echo "<p>You forgot to enter a search term";
                    exit;
                }
                $query = "SELECT * from livro where $field = '$find' ";
                $result = pg_query($query);
                $resultall = pg_fetch_all($result);
                if (!$result) {
                    die("Error in SQL query: " . pg_last_error());
                }
                foreach ($resultall as $linha) {
                    echo "

                            <a class=\"book\" href='SeeBook.php?id={$linha['book_id']}'>
                          <div>
                              <p class=\"book_title\">{$linha['book_name']}</p>
                              <p class=\"book_price\">{$linha['book_price']}$</p>
                          </div>
                          <div>
                              <p class=\"book_id\">{$linha['book_id']}</p>
                          </div>
                       </a>
         
         ";
                }
                $rows = pg_num_rows($result);
                if ($rows == 0)
                {
                    echo "Sorry, but we can not find an entry to match your query<br><br>";
                }

            }
            ?>
        </div>
        <div class="main_books">
            <?php
            include '../geral/server-connection.php';
            if(isset($_POST["submit_order"])) {
                $result = pg_query($connection, "SELECT book_name, book_price, book_id FROM livro order by {$_POST["order"]}");
                $result = pg_fetch_all($result);
                foreach ($result as $linha) {
                                    echo "
                    <a class=\"book\" href='SeeBook.php?id={$linha['book_id']}'>
                          <div>
                              <p class=\"book_title\">{$linha['book_name']}</p>
                              <p class=\"book_price\">{$linha['book_price']}$</p>
                          </div>
                          <div>
                              <p class=\"book_id\">{$linha['book_id']}</p>
                          </div>
                       </a>
            ";
                                }
            } else {
                $result = pg_query($connection, "select book_name, book_price, book_id from livro ");
                $result = pg_fetch_all($result);
                foreach ($result as $linha) {
                    echo("<a class=\"book\" href='SeeBook.php?id={$linha['book_id']}'>
                          <div>
                              <p class=\"book_title\">{$linha['book_name']}</p>
                              <p class=\"book_price\">{$linha['book_price']}$</p>
                          </div>
                          <div>
                              <p class=\"book_id\">{$linha['book_id']}</p>
                          </div>
                       </a>");
                }
            }
            ?>
        </div>
    </div>
</section>
</body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>