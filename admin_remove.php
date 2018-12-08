<?php
include 'server-connection.php';
$SelectedBookId =$_GET['id'];
$query = "DELETE FROM livro WHERE book_id = $SelectedBookId";
$result = pg_query($query);
header("Location: http://localhost:63342/SI_PROJECT/catalogadmin.php");
?>