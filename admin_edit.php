<html>
<head>

    <head>
        <meta charset="UTF-8">
        <title>ViewComics inc.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/favicon.ico" />
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="flexboxgrid.min.css" type="text/css">
        <link rel="stylesheet" href="utilities.css" type="text/css">
        <link rel="stylesheet" href="catalog.css" type="text/css">
        <link rel="stylesheet" href="sidebar.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    </head>
</head>
<body>
<section class="section section--white">
    <div class="container container-fluid">

<?php
include 'server-connection.php';
$SelectedBookId =$_GET['id'];
$rowResource = pg_query($connection, "SELECT * FROM livro WHERE book_id = $SelectedBookId");
$BOOKNAME = pg_query($connection, "SELECT book_name FROM livro");
$BOOKNAME1 = pg_fetch_result($BOOKNAME, 0, 0);
$BOOKPRICE = pg_query($connection, "SELECT book_price FROM livro ");
$BOOKPRICE1 = pg_fetch_result($BOOKPRICE, 0, 0);
$BOOKPUBLISHER = pg_query($connection, "SELECT book_publisher FROM livro");
$BOOKPUBLISHER1 = pg_fetch_result($BOOKPUBLISHER, 0, 0);
$BOOKDATE = pg_query($connection, "SELECT book_date FROM livro ");
$BOOKDATE1 = pg_fetch_result($BOOKDATE, 0, 0);
$BOOKAUTHOR = pg_query($connection, "SELECT book_author FROM livro");
$BOOKDAUTHOR1 = pg_fetch_result($BOOKDATE, 0, 0);
$BOOKDESCRIPTION = pg_query($connection, "SELECT book_description FROM livro ");
$BOOKDESCRIPTION1 = pg_fetch_result($BOOKDATE, 0, 0);

    echo"
     <form method='POST' action='admin_edit.php' >
    <li>Book Name:</li>
    <li><input type='text' name='book_name' value='$BOOKNAME1' /></li>
    <li>Price (USD):</li><li><input type='text' name='book_price' value='$BOOKPRICE1' /></li>
    <li>Date of publication:</li>
    <li><input type='text' name='book_date' value='$BOOKDATE1' /></li>
    <li> <input type='submit' name='new' /></li>
    </form>";



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $BOOKNAMEUPDATE = $_POST["book_name"];
        $BOOKPRICEUPDATE = $_POST["book_price"];
        $BOOKDATEUPDATE = $_POST["book_date"];
        $query = "UPDATE livro SET '$BOOKNAME1' = '$BOOKNAMEUPDATE' ";
        $result = pg_query($query);

        if (!$result) {
            echo "Update failed!!";
            header("Location: http://localhost:63342/SI_PROJECT/SeeBook.php . '$BOOKID2' ." );
        } else {
            echo "Update successfull;";
            header("Location: http://localhost:63342/SI_PROJECT/SeeBook.php . '$BOOKID2' ." );
        }

}?>

    </div>
</section>
</body>
</html>