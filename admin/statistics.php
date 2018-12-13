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
        <a href="../admin/admin_catalog.php" class="checkmark"></a>
    </label>
    <label class="check_container">Statistics
        <input type="radio" checked="checked" name="radio">
        <a href="../admin/statistics.php" class="checkmark"></a>
    </label>
    <label class="check_container">Edit Account Settings
        <input type="radio"  name="radio">
        <a class="checkmark" href='../admin/admin_account-settings.php'></a>
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
            <img  src=\"../assets/images/Group-3.png\" alt=\"plus btn\" style='width: 157px; height:157px ;'>
            <div class='row center-xs middle-xs'>
            <div class='col-xs-6'>
            <p class='text'><b>Total of books on the website</b></p>
    </div>
            <div class='col-xs-6'>
                <p class='w-color books'>$rowCountbook books </p>
                </div>

            </div>
            </div>
            <div class='card'>
            <img  src=\"../assets/images/Group-2.png\" alt=\"plus btn\" style='width: 147px; height:147px ;'>
             <div class='row center-xs middle-xs'>
            <div class='col-xs-6'>
            <p class='text'><b>Total of users registered in the website</b></p>
    </div>
            <div class='col-xs-6'>
                <p class='w-color books'>$rowCountuser <b>users</b></p>
                </div>
  
            </div>
              </div>
            <div class='card'>
             <img  src=\"../assets/images/Group-3.png\" alt=\"plus btn\" style='width: 157px; height:157px ;'>
                          <div class='row center-xs middle-xs'>
            <div class='col-xs-6'>
            <p class='text'><b>Total of differents authors</b></p>
    </div>
            <div class='col-xs-6'>
                <p class='w-color books'>$rowCountauthor <b>authors</b></p>
                </div>
  
            </div>
             
            </div> ";
            $ClientId = pg_query($connection, "SELECT * FROM cliente");
            $rowCountClient =  pg_num_rows($ClientId);
            $TotalComprado = pg_query($connection, "SELECT transaction_price FROM compra");
            $TotalComprado2 = pg_fetch_all($TotalComprado);
            $total=0;
            foreach ($TotalComprado2 as $linha)
            {
                $total = $total + $linha['transaction_price'];
                }
            $avg = $total / $rowCountClient;
            $SalesPerTime = pg_query($connection, "select count(*) from compra where transaction_date > '2018-12-8' and transaction_date < '2018-12-14'");
            $SalesPerTime2 = pg_fetch_result($SalesPerTime,0,0);
            echo "
            <div class='card'>
              <img  src=\"../assets/images/Group-1.png\" alt=\"plus btn\" style='width: 157px; height:157px ;'>
              <div class='row center-xs middle-xs'>
            <div class='col-xs-7'>
            <p class='text'><b>Value that each user spends, on average, on the website</b></p>
    </div>
            <div class='col-xs-5'>
                <p class='w-color books'>$avg €</p>
                </div>
  
            </div>
          
                   
            </div>
            <div class='card'>
            <img  src=\"../assets/images/Group.png\" alt=\"plus btn\" style='width: 157px; height:157px ;'>
                          <div class='row center-xs middle-xs'>
            <div class='col-xs-6'>
            <p class='text'><b>Value of sales per unit of time</b></p>
    </div>
            <div class='col-xs-6'>
                <p class='w-color books'> $SalesPerTime2</p>
                </div>
  
            </div>
                
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
