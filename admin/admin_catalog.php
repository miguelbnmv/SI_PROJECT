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
    <p class="sidebar_title"><strong>Hi</strong> Admin</p>
    <label class="check_container">Catalog
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
    </label>
    <label class="check_container">Statistics
        <input type="radio" name="radio">
        <span class="checkmark"></span>
        <a href="../admin/statistics.php">hey</a>
    </label>
    <label class="check_container">Edit Account Settings
        <input type="radio" name="radio">
        <span class="checkmark"></span>
        <?php echo "
        <a href='../admin/admin_account-settings.php'>hey2</a>"
        ?>
    </label>
    <div class="logout w-color">
        <a class="w-color" href="../geral/logout.php">Logout</a>
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
            <input type="search" placeholder="Search something...">
        </div>
        <div class="main_books">
            <?php
            include '../geral/server-connection.php';
            $result = pg_query($connection, "select book_name, book_price, book_id from livro ");
            $result = pg_fetch_all($result);
            foreach ($result as $linha)
            {
                echo ("<a class=\"book\" href='SeeBook.php?id={$linha['book_id']}'>
                          <div>
                              <p class=\"book_title\">{$linha['book_name']}</p>
                              <p class=\"book_price\">{$linha['book_price']}$</p>
                          </div>
                          <div>
                              <p class=\"book_id\">{$linha['book_id']}</p>
                          </div>
                       </a>");
            }
            ?>
        </div>
    </div>
</section>
</body>
</html>