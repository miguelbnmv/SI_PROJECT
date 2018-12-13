<?php
include '../geral/server-connection.php';
$searchbookId = pg_query($connection, "SELECT book_id FROM view_history WHERE book_id = {$_GET['id']}");
$searchbookId2 = pg_numrows($searchbookId);
if ($searchbookId2 > 0 ) {
    echo "already saw, you can't delete";
}
else {
    $query = "DELETE FROM livro WHERE book_id = {$_GET['id']}";
    $result = pg_query($query);
    header("Location: http://localhost:63342/SI_PROJECT/admin/admin_catalog.php");
}
?>