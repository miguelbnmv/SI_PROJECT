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
    <a class="w-color" href="../cliente/cliente_account-collection.php">Coleção</a>
</div>
<section class="main">
    <div class="main_header">
        <h1>Viewed Books</h1>
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
                    include '../geral/server-connection.php';
                    $result = pg_query($connection, "SELECT livro.book_id, view_history.book_id, book_name, book_price, view_date FROM livro, view_history WHERE view_history.book_id = livro.book_id and cliente_id={$_SESSION["user_logged_id"]}");
                    $result_count = pg_numrows($result);
                    $result = pg_fetch_all($result);
                    if($result_count==0) {
                        echo "<p>Nenhum livro visualizado</p>";
                    } else if ($result_count>0) {
                        echo"
                            <table>
                              <tr>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>Book Price</th>
                                <th>View Date</th>
                              </tr>
                              ";
                        foreach ($result as $linha) {
                            echo "               
                              <tr>
                                <td>{$linha['book_id']}</td>
                                <td>{$linha['book_name']}</td>
                                <td>{$linha['book_price']}</td>
                                <td>{$linha['view_date']}</td>
                              </tr>
                            ";
                        }
                    }
                    echo "</table>";
                    ?>
                </div>
            </section>
        </div>
    </div>
</section>
</body>

