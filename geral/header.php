<?php
include '../geral/server-connection.php';
session_start();
if(isset($_SESSION['user_logged_id'])) {
    $USERINFO = pg_query($connection, "SELECT cliente_firstname, cliente_lastname FROM cliente WHERE cliente_email = '{$_SESSION['logged']}' ");
    $USERNAME=  pg_fetch_result($USERINFO, 0, 0);
    $USERLASTNAME=  pg_fetch_result($USERINFO, 0, 1);
    echo"
<div class='header'>
     <span class='name'><strong> Hi </strong>$USERNAME $USERLASTNAME</span>
     </div>
    ";
} else if(isset($_SESSION['admin_logged_id'])) {
    $ADMININFO = pg_query($connection, "SELECT admin_name FROM administrator WHERE admin_email = '{$_SESSION['logged']}' ");
    $ADMINNAME=  pg_fetch_result($ADMININFO, 0, 0);
    echo"
<div class='header'>
     <span class='name'><strong> Hi </strong>$ADMINNAME</span>
          </div>
    ";
}

?>
