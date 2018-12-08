<html>
<head>

    <head>
        <meta charset="UTF-8">
        <title>ViewComics inc.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/favicon.ico" />
        <link rel="stylesheet" href="assets/CSS/style.css" type="text/css">
        <link rel="stylesheet" href="assets/CSS/flexboxgrid.min.css" type="text/css">
        <link rel="stylesheet" href="assets/CSS/utilities.css" type="text/css">
        <link rel="stylesheet" href="assets/CSS/catalog.css" type="text/css">
        <link rel="stylesheet" href="assets/CSS/sidebar.css" type="text/css">
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
$BOOKNAME = pg_query($connection, "SELECT book_name FROM livro WHERE book_id = $SelectedBookId");
$BOOKNAME1 = pg_fetch_result($BOOKNAME, 0, 0);
$BOOKPRICE = pg_query($connection, "SELECT book_price FROM livro WHERE book_id = $SelectedBookId");
$BOOKPRICE1 = pg_fetch_result($BOOKPRICE, 0, 0);
$BOOKPUBLISHER = pg_query($connection, "SELECT book_publisher FROM livro WHERE book_id = $SelectedBookId");
$BOOKPUBLISHER1 = pg_fetch_result($BOOKPUBLISHER, 0, 0);
$BOOKDATE = pg_query($connection, "SELECT book_date FROM livro WHERE book_id = $SelectedBookId");
$BOOKDATE1 = pg_fetch_result($BOOKDATE, 0, 0);
$BOOKAUTHOR = pg_query($connection, "SELECT book_author FROM livro WHERE book_id = $SelectedBookId");
$BOOKDAUTHOR1 = pg_fetch_result($BOOKDATE, 0, 0);
$BOOKDESCRIPTION = pg_query($connection, "SELECT book_description FROM livro WHERE book_id = $SelectedBookId");
$BOOKDESCRIPTION1 = pg_fetch_result($BOOKDATE, 0, 0);

    echo"
     <form method='POST' >
    <li>Book Name:</li>
    <li><input type='text' name='book_name' value='$BOOKNAME1' /></li>
    <li>Price (USD):</li><li><input type='text' name='book_price' value='$BOOKPRICE1' /></li>
    <li>Date of publication:</li>
    <li><input type='text' name='book_date' value='$BOOKDATE1' /></li>
    <li> <input type='submit' name='new' /></li>
    </form>";



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $var=$_GET['user'];
        $BOOKNAMEUPDATE = $_POST["book_name"];
        $BOOKPRICEUPDATE = $_POST["book_price"];
        $BOOKDATEUPDATE = $_POST["book_date"];
        $query ="UPDATE livro 
        SET (book_name, book_price, book_date) = 
        ('$BOOKNAMEUPDATE','$BOOKPRICEUPDATE','$BOOKDATEUPDATE')
        WHERE book_id= '$SelectedBookId' ";
        $result = pg_query($query);

        if (!$result) {
            echo "Update failed!!";
        } else {
            echo "Update successfull;";
            header('Location: http://localhost:63342/SI_PROJECT/SeeBook.php?id=' . $_GET['id']);
        }

}?>

    </div>
</section>
</body>
</html>