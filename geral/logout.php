    <?php
    Session_start();
    Session_destroy();
    header("Location: http://localhost:63342/SI_PROJECT/cliente/verifica_user.php"); // redirects
    ?>