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
        <a href='../admin/admin_account-settings.php?id'>hey2</a>
    </label>
    <div class="logout w-color">
        <a class="w-color" href="../geral/logout.php">Logout</a>
    </div>
</div>
<section class="main">
    <div class="main_header">
        <h1>Price History</h1>
    </div>
    <?php
    include '../geral/header.php';
    ?>
    <div class="main-container">
        <div class="main_books">
            <?php
            include '../geral/server-connection.php';
            $result = pg_query($connection, "select admin_id, book_id, price_update, price_date from price_history where book_id={$_GET['id']}");
            $result_count = pg_numrows($result);
            $result = pg_fetch_all($result);
            if($result_count==0) {
                echo "<p>O preço nunca foi modificado</p>";
            } else if ($result_count>0) {
                echo"
                <table>
                  <tr>
                    <th>Admin</th>
                    <th>Price</th>
                    <th>Date</th>
                  </tr>
                  ";
                foreach ($result as $linha) {
                    echo "               
                      <tr>
                        <td>{$linha['admin_id']}</td>
                        <td>{$linha['price_update']}</td>
                        <td>{$linha['price_date']}</td>
                      </tr>
                    ";
                }
            }
            echo "</table>";
            ?>
        </div>
    </div>
</section>
</body>
</html>