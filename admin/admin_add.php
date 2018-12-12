<?php
include '../geral/server-connection.php';

$name_cover = $_FILES['myCover']['name'];
$target_cover = '../assets/covers/'.$name_cover;
move_uploaded_file( $_FILES['myCover']['tmp_name'], $target_cover);

$name_text = $_FILES['myText']['name'];
$target_text = '../assets/texts/'.$name_text;
move_uploaded_file( $_FILES['myText']['tmp_name'], $target_text);

$query = "INSERT INTO livro  (book_name, book_author, book_price, book_description, book_publisher, book_date, book_cover, book_text) VALUES ('{$_POST['title']}','{$_POST['author']}','{$_POST['price']}','{$_POST['description']}','{$_POST['publisher']}','{$_POST['date']}','$name_cover','$name_text')";
$result = pg_query($query);
header('Location: http://localhost:63342/SI_PROJECT/admin/admin_catalog.php');
?>