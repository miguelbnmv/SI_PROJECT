<?php
include 'server-connection.php';
$SelectedBookId =$_GET['id'];
$rowResource = pg_query($connection, "SELECT count(*) AS exact_count FROM livro");
$rowCount =  pg_num_rows($rowResource);
$query = "DELETE FROM livro WHERE book_id = $SelectedBookId";
$result = pg_query($query);
header("Location: http://localhost:63342/SI_PROJECT/catalogadmin.php"); // redirects
?>