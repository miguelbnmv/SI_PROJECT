<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/catalog_admin.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<div id="mySidenav" class="sidenav w-color">
    <p class="sidebar_title"><strong>Hi</strong> Admin</p>
    <label class="check_container">Catalog
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
    </label>
    <label class="check_container">Statistics
        <input type="radio" name="radio">
        <span class="checkmark"></span>
    </label>
    <label class="check_container">Edit Account Settings
        <input type="radio" name="radio">
        <span class="checkmark"></span>
    </label>
    <div class="logout w-color">
        <a class="w-color" href="logout.php">Logout</a>
    </div>
</div>
<section class="main">
    <div class="main_header">
        <h1>Catalog</h1>
        <a href="admin_add.php">+</a>
    </div>
    <?php
    include 'header.php';
    ?>
    <div class="main-container">
        <div>
            <input type="search" placeholder="Search something...">
        </div>
        <div class="main_books">
        <?php
        include 'server-connection.php';
        $rowResource = pg_query($connection, "SELECT count(*) AS exact_count FROM livro");
        $rowCount = pg_fetch_result($rowResource, 0, 0);

        for ($i = 0; $i < $rowCount; $i++) {
            $BOOKNAME = pg_query($connection, "SELECT book_name FROM livro");
            $ALLBOOKS[$i]= pg_fetch_result($BOOKNAME,$i,0);
            $BOOKPRICE = pg_query($connection, "SELECT book_price FROM livro");
            $ALLPRICES[$i]= pg_fetch_result($BOOKPRICE,$i,0);
            $BOOKID = pg_query($connection, "SELECT book_id FROM livro");
            $ALLIDS[$i]= pg_fetch_result($BOOKID,$i,0);
            $BOOKID = pg_query($connection, "SELECT book_id FROM livro");
            $ALLIDS[$i]= pg_fetch_result($BOOKID,$i,0);
        }
        for ($i = 0; $i < $rowCount; $i++) {
            echo (" <div class=\"book\">
                        <div>
                            <p class=\"book_title\">$ALLBOOKS[$i]</p>
                            <p class=\"book_price\"> $ALLPRICES[$i]$</p>
                        </div>
                        <div>
                            <p class=\"book_id\"> $ALLIDS[$i]</p>
                        </div>
                    </div>");



        }
        ?>
    </div>
    </div>


</section>
</body>
</html>
