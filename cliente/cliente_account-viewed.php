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
        <div class="account" style="margin-top: 4px">
            <a href="../cliente/menu.php">
                <img class="account-image"  src="../assets/images/menu.png" alt="plus btn">
            </a>
            <h2>Account</h2>
        </div>
        <p style="margin-bottom: 30px">All about your account details</p>

        <label class="check_container1">Edit Account Settings
            <input type="radio" name="order" value="book_name"  >
            <a href="../cliente/cliente_account-settings.php" class="checkmark1"></a>
        </label>
        <label class="check_container1">Favorite Books
            <input type="radio" name="order" value="book_author">
            <a href="../cliente/cliente_account-favorites.php" class="checkmark1"></a>
        </label>
        <label class="check_container1">Books Viewed
            <input type="radio" name="order" value="book_date" checked="checked">
            <a href="../cliente/cliente_account-viewed.php" class="checkmark1"></a>
        </label>
        <label class="check_container1">Collection
            <input type="radio" name="order" value="book_price">
            <a href="../cliente/cliente_account-collection.php" class="checkmark1"></a>
        </label>
        <label class="check_container1">Notifications
            <input type="radio" name="order" value="book_publisher">
            <a href="../cliente/cliente_account-settings.php" class="checkmark1"></a>
        </label>


        <label class="check_container" style="margin-top: 40px">Catalog
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
    <div class="row between-lg">
        <h1>Books Viewed</h1>
        <?php
        include '../geral/header.php';
        ?>
    </div>
    <?php
    include '../geral/server-connection.php';
    ?>
    <div class="row">
        <div class="col-xs-10">
                    <div class="main_books" style="margin-top: 30px">
                    <?php
                    include '../geral/server-connection.php';
                    $result = pg_query($connection, "SELECT livro.book_id, view_history.book_id, book_name, book_price, view_date FROM livro, view_history WHERE view_history.book_id = livro.book_id and cliente_id={$_SESSION["user_logged_id"]}");
                    $result_count = pg_numrows($result);
                    $result = pg_fetch_all($result);
                    if($result_count==0) {
                        echo "<p>Nenhum livro visualizado</p>";
                    } else if ($result_count>0) {
                        foreach ($result as $linha) {
                            echo "               
                                     <a class='book' href='user_book_nb.php?id={$linha['book_id']}'>
                                      <div>
                                          <p class='book_title'>{$linha['book_name']}</p>
                                          <p class='book_price'>{$linha['book_price']}$</p>
                                      </div>
                                      <div>
                                          <p class='book_id'>{$linha['book_id']}</p>
                                      </div>
                                 </a>
                            ";
                        }
                    }
                    ?>
                </div>
        </div>
    </div>
</section>
</body>

