<?php
/**
 * Created by PhpStorm.
 * User: beatrizgeirinhas
 * Date: 22/11/18
 * Time: 00:40
 */if(isset($_POST['meucheckbox']))
{
    echo "checkbox marcado! <br/>";
    echo "valor: " . $_POST['meucheckbox'];
    header("Location: http://localhost:63342/SI_PROJECT/catalog.php");
}
else
{
    echo "checkbox não marcado! <br/>";
}
?>