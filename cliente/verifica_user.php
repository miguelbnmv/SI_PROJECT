<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ViewComics inc.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/images/favicon.ico" />
  <link rel="stylesheet" href="../assets/CSS/flexboxgrid.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">
  <link rel="stylesheet" href="../assets/CSS/utilities.css" type="text/css">
  <link rel="stylesheet" href="../assets/CSS/form.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<section class="section section--white background-image">
    <div class="container container-fluid ">
    <div class="row middle-xs full-height">

        <div class="col-xs-6 w-color ">
        <p class="title">
            ViewComics inc.
        </p>
        <p class="intro">We are an online shop for comic books<br>
         where you can buy and read only in one place. </p>
        <p class="scroll">Login to know more</p>
        </div>
    <div class="col-xs-6 w-color form ">
    <form method="POST" id="formLogin">

        <input name="email" type="text" id="email" placeholder="Email" required/>
        <input name="password" type="password" id="password" placeholder="Password" required/>
    <input type="submit" name="Submit" value="LOGIN" />
    </form>
  <div class="sign-up">
  <p>Doesn't have an account?</p>
  <a href="register.php">Sign up</a>
        <form action="../geral/form-action.php" method="post">
            <input type="checkbox" onclick="checkFluency()" id="fluency" />
            <span class="w-color">Administrator</span>
        </form>
        <script>
            function checkFluency(){
                var checkbox = document.getElementById('fluency');
                if (checkbox.checked = true){
                    window.location = "../admin/verifica_admin.php";
                }
                else {
                    window.location = "../cliente/verifica_user.php";
                }
            }
        </script>
            </div>
        </div>
    </div>
  </div>
</section>
</body>
<?php
include '../geral/server-connection.php';
if(isset($_POST["email"]) || isset($_POST["password"])) {
    $USEREMAIL = $_POST["email"];
    $USERPASS = $_POST["password"];
    $result = pg_query($connection, "SELECT * FROM cliente where cliente_email = '$USEREMAIL' and cliente_password='$USERPASS'");
    $result = pg_numrows($result);
    $USERID = pg_query($connection, "SELECT cliente_id FROM cliente WHERE cliente_email = '$USEREMAIL' ");
    $USERID1=  pg_fetch_result($USERID, 0, 0);
    if ($result != 0) {
        session_start();
        $_SESSION["logged"] = $USEREMAIL;
        $_SESSION["user_logged_id"] = $USERID1;
        header('Location: http://localhost:63342/SI_PROJECT/cliente/user_catalog.php');
    } else {
        echo("erro");
    }
}
?>
</html>




