<?php
include '../geral/server-connection.php';
$query = "DELETE FROM livro WHERE book_id = {$_GET['id']}";
$result = pg_query($query);
header("Location: http://localhost:63342/SI_PROJECT/admin/admin_catalog.php");
?>