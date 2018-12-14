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
    <link rel="stylesheet" href="../assets/CSS/price_history.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/header.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>

<section class="section section--white">
    <div class="container container-fluid">
        <div class="row between-lg ">
            <div class='book_title'>
            <a href='../admin/admin_catalog.php'>
                <img src='../assets/images/goback.png' style='width: 31.49px; height: 21.49px; margin-right: 20px'>
            </a>
        <h1>Price History</h1>
            </div>
            <?php
            include '../geral/header.php';
            ?>
        </div>

        <div class=" row center-xs middle-xs">
            <div class="add-card">
                <div class="col-xs-12">
            <?php
            include '../geral/server-connection.php';
            $result = pg_query($connection, "select admin_id, book_id, price_update, price_date from price_history where book_id={$_GET['id']}");
            $result_count = pg_numrows($result);
            $result = pg_fetch_all($result);
            if($result_count==0) {
                echo "<p>Price never changed</p>";
            } else if ($result_count>0) {
                echo"
                <table>
                  <tr>
                    <th style='padding-right:20px'>Admin</th>
                    <th style='padding-right:10px'>Price</th>
                    <th>Date</th>
                  </tr>
                  ";
                foreach ($result as $linha) {
                    echo "               
                      <tr>
                        <td style='padding-right:20px'>{$linha['admin_id']}</td>
                        <td style='padding-right:10px'>{$linha['price_update']}</td>
                        <td>{$linha['price_date']}</td>
                      </tr>
                    ";
                }
            }
            echo "</table>";
            ?>
        </div>
    </div>
        </div>
</section>
</body>
</html>