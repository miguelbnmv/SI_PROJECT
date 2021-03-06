<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="assets/CSS/flexboxgrid.min.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/verifica_admin.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/form.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<section class="section section--white background-image">
    <div class="container container-fluid ">
        <div class="row middle-xs full-height">

            <div class="col-xs-6 ">
                <p class="title">
                    ViewComics inc.
                </p>
                <p class="intro">We are an online shop for comic books<br>
                    where you can buy and read only in one place. </p>
                <p class="scroll">Login to know more</p>
            </div>
            <div class="col-xs-6 form admin ">
                <form method="POST" id="formLogin" >
                    <input name="email" type="text" id="email" placeholder="Email" />
                    <input name="password" type="password" id="password" placeholder="Password"/>
                    <input type="submit" name="Submit" value="LOGIN" />
                </form>
                <div class="sign-up">
                <p>Doesn't have an account?</p>
                <a  href="register.php">Sign up</a>
                <form action="form-action.php" method="post" >
                    <input type="checkbox" onclick="checkFluency()" id="fluency" checked />
                    <span class="">Administrator</span>
                </form>

                <script>
                    function checkFluency(){
                        var checkbox = document.getElementById('fluency');
                        if (checkbox.checked != true){
                            window.location = "verifica_user.php";
                        }
                        else {

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
    $result = pg_query($connection, "SELECT * FROM administrator where admin_email = {$_POST['email']} and admin_password='{$_POST['password']}'");
    if ($result != 0) {
        session_start();
        $_SESSION["logged"] = $_POST['email'];
        echo("{$_SESSION["logged"]}");
        header("Location: http://localhost:63342/SI_PROJECT/catalogadmin.php");
    } else {
        echo("erro");
    }
}
?>


