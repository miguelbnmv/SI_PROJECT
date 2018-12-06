<?php
include 'server-connection.php';

$BOOKNAME = $_POST["title"];
$BOOKAUTHOR = $_POST["author"];
$BOOKPRICE = $_POST["price"];
$BOOKDESCRIPTION = $_POST["description"];
$BOOKPUBLISHER = $_POST["publisher"];
$BOOKDATE = $_POST["date"];


$rowResource = pg_query($connection, "SELECT count(*) AS exact_count FROM livro");
$rowCount =  pg_num_rows($rowResource);

$query = "INSERT INTO livro (book_name, book_author, book_price, book_description,book_publisher,book_date) VALUES ('$BOOKNAME','$BOOKAUTHOR','$BOOKPRICE','$BOOKDESCRIPTION','$BOOKPUBLISHER','$BOOKDATE')";
$result = pg_query($query);

header("Location: http://localhost:63342/SI_PROJECT/catalogadmin.php");
?>