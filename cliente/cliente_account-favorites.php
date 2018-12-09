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
        <a class="w-color" href="../geral/logout.php">Logout</a>
    </div>
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

            <section class="main">

                <div class="main-container">
                    <?php
                    $result = pg_query($connection, "SELECT livro.book_id,favorite.book_id, book_name, book_price FROM livro,favorite WHERE favorite.book_id = livro.book_id and favorite=true and cliente_id=((select cliente_id from cliente where cliente_email='{$_SESSION['logged']}'))");
                    $result = pg_fetch_all($result);
                    foreach ($result as $linha)
                    {
                        echo "
                 <div class=\"book\">
                      <a href='user_book_nb.php?id={$linha['book_id']}'>
                         <p class=\"book_title\">{$linha['book_name']}</p>
                         <p class=\"book_title\">{$linha['book_price']}</p>
                       </a>
                 </div>
          
               
               ";

                    }
                    ?>
                </div>
                <div class="logout b-color">
                    <a class="b-color" href="../geral/logout.php">logout</a>
                </div>
            </section>
        </div>
    </div>
</section>
</body>

