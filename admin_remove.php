<?php
include 'server-connection.php';
$BOOKID = $_POST["id"];
$rowResource = pg_query($connection, "SELECT count(*) AS exact_count FROM livro");
$rowCount = pg_fetch_result($rowResource, 0, 0);
$query = "DELETE FROM livro WHERE book_id = $BOOKID";
$result = pg_query($query);
header("Location: http://localhost:63342/SI_PROJECT/catalog.php"); // redirects
?>
