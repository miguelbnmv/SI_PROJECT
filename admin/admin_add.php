<?php
include '../geral/server-connection.php';

$query = "INSERT INTO livro  (book_name, book_author, book_price, book_description, book_publisher, book_date) VALUES ('{$_POST['title']}','{$_POST['author']}','{$_POST['price']}','{$_POST['description']}','{$_POST['publisher']}','{$_POST['date']}')";
$result = pg_query($query);

header("Location: http://localhost:63342/SI_PROJECT/admin/admin_catalog.php");
?>