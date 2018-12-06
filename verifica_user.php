<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ViewComics inc.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
  <link rel="stylesheet" href="flexboxgrid.min.css" type="text/css">
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="utilities.css" type="text/css">
  <link rel="stylesheet" href="form.css" type="text/css">
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

        <input name="email" type="text" id="email" placeholder="Email" />
        <input name="password" type="password" id="password" placeholder="Password"/>
    <input type="submit" name="Submit" value="LOGIN" />
    </form>
  <div class="sign-up">
  <p>Doesn't have an account?</p>
  <a  href="register.php">Sign up</a>
        <form action="form-action.php" method="post">
            <input type="checkbox" onclick="checkFluency()" id="fluency" />
            <span class="w-color">Administrator</span>
        </form>

        <script>
            function checkFluency(){
                var checkbox = document.getElementById('fluency');
                if (checkbox.checked = true){
                    window.location = "verifica_admin.php";
                }
                else {
                    window.location = "verifica_user.php";
                }
            }
        </script>
</div>

</div>
    </div>
  </div>
</section>
</body>
</html>
<?php
include 'server-connection.php';
if(isset($_POST["email"]) || isset($_POST["password"])) {
    $USEREMAIL = $_POST["email"];
    $USERPASS = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $result = pg_query($connection, "SELECT * FROM cliente where cliente_email = '$USEREMAIL' and cliente_password='$USERPASS'");
    if ($result != 0) {
        session_start();
        $_SESSION["logged"] = $USEREMAIL;
        echo("{$_SESSION["logged"]}");
        header("Location: http://localhost:63342/SI_PROJECT/cataloguser.php");
    } else {
        echo("erro");
    }

}
?>


