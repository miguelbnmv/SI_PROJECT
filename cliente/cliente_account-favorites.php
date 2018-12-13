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
    <link rel="stylesheet" href="../assets/CSS/statistics.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<div id="mySidenav" class="sidenav w-color">
    <p class="sidebar_title"><strong>Hi</strong> Admin</p>
    <label class="check_container">Catalog
        <input type="radio"  name="radio">
        <span class="checkmark"></span>
    </label>
    <label class="check_container">Statistics
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
    </label>
    <label class="check_container">Edit Account Settings
        <input type="radio" name="radio">
        <span class="checkmark"></span>
    </label>
    <div class="logout w-color">
        <a class="w-color" href="../geral/logout.php"><p>Logout</p></a>
    </div>
    <a class="w-color" href="../cliente/cliente_account-collection.php"><p>Coleção</p></a>
</div>
<section class="main">
    <div class="main_header">
        <h1>Favorite Books</h1>
    </div>
    <?php
    include '../geral/header.php';
    include '../geral/server-connection.php';
    ?>
    <div class="row">
        <div class="col-xs-10">
            <section class="main-container">
                <div class="main_books">
                    <?php
                    $result = pg_query($connection, "SELECT livro.book_id, favorite.book_id, book_name, book_price FROM livro,favorite WHERE favorite.book_id = livro.book_id and favorite=true and cliente_id={$_SESSION["user_logged_id"]}");
                    $result_count = pg_numrows($result);
                    $result = pg_fetch_all($result);
                    if($result_count==0) {
                        echo "Não há livros favoritos";
                    }
                    else if ($result_count>0) {
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
            </section>
        </div>
    </div>
</section>
</body>

