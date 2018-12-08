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
        <h1>Statistics</h1>
    </div>
    <?php
    include '../geral/header.php';
    ?>
    <div class="row">
        <div class="col-xs-10">
    <div class="main-container">
        <div class="main_books">
            <?php
            include '../geral/server-connection.php';
            $rowResourcebook = pg_query($connection, "SELECT * FROM livro");
            $rowCountbook =  pg_num_rows($rowResourcebook);
            $rowResourceuser = pg_query($connection, "SELECT * FROM cliente");
            $rowCountuser =  pg_num_rows($rowResourceuser);
            $rowResourceauthor = pg_query($connection, "SELECT DISTINCT book_author FROM livro");
            $rowCountauthor =  pg_num_rows($rowResourceauthor);
            echo "
            <div class='card'>
                <p>$rowCountbook books</p>
            </div>
            <div class='card'>
                <p>$rowCountuser users</p>
            </div>
            <div class='card'>
            <p>$rowCountauthor different authors</p>
            </div>
            <div class='card'>
            <p>$login_session_duration</p>
            </div>
            <div class='card'>

            </div>
            "?>

        </div>
    </div>
    </div>
    </div>
    </div>
</section>
</body>
</html
