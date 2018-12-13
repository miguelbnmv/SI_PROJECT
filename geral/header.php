<?php
include '../geral/server-connection.php';
session_start();
$USERINFO = pg_query($connection, "SELECT cliente_firstname, cliente_lastname FROM cliente WHERE cliente_email = '{$_SESSION['logged']}' ");
$USERNAME=  pg_fetch_result($USERINFO, 0, 0);
$USERLASTNAME=  pg_fetch_result($USERINFO, 0, 1);
echo"
     <span class='name'><strong> Hi </strong>$USERNAME $USERLASTNAME</span>
    ";
?>
