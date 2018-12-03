<?php
include 'server-connection.php';

$BOOKNAME = $_POST["title"];
$BOOKAUTHOR = $_POST["author"];
$BOOKPRICE = $_POST["price"];
$BOOKDESCRIPTION = $_POST["description"];
$BOOKPUBLISHER = $_POST["publisher"];
$BOOKDATE = $_POST["date"];

$rowResource = pg_query($connection, "SELECT count(*) AS exact_count FROM livro");
$rowCount = pg_fetch_result($rowResource, 0, 0);

$query = "INSERT INTO livro VALUES ($rowCount+1,'$BOOKNAME','$BOOKAUTHOR','$BOOKPRICE','$BOOKDESCRIPTION','$BOOKPUBLISHER','$BOOKDATE')";
$result = pg_query($query);

header("Location: http://localhost:63342/SI_PROJECT/catalog.php");
?>