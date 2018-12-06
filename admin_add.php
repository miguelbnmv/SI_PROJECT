<?php
include 'server-connection.php';

$rowResource = pg_query($connection, "SELECT count(*) AS exact_count FROM livro");
$rowCount =  pg_num_rows($rowResource);

$query = "INSERT INTO livro (book_name, book_author, book_price, book_description,book_publisher,book_date) VALUES ('{$_POST['title']}','{$_POST['author']}','{$_POST['price']}','{$_POST['description']}','{$_POST['publisher']}','{$_POST['date']}')";
$result = pg_query($query);

header("Location: http://localhost:63342/SI_PROJECT/admin_catalog.php");
?>