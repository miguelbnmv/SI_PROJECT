<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../assets/CSS/flexboxgrid.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/register.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/form.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<section class="section section--white background-image">
    <div class="container container-fluid ">
        <div class="row middle-xs full-height">
            <div class="col-xs-6 w-color">
                <p class="title">
                    ViewComics inc
                </p>
                <p class="intro">We are an online shop for comic books<br>
                    where you can buy and read only in one place. </p>
                <p class="scroll">Sign up to know more</p>
            </div>
            <div class="col-xs-6 w-color form">
                <h1 >Sign Up</h1>
                <form action="register.php" method="POST" id="formRegister">
                    <input name="firstname" type="text" id="firstname" placeholder="First Name" required>
                    <input name="lastname" type="text" id="lastname" placeholder="Last Name" required>
                    <input name="email" type="email" id="email" placeholder="Email" />
                    <input name="password" type="password" id="password" placeholder="Password"required>
                    <input name="confirm_password" type="password" id="confirm_password" placeholder="Confirm Password" required>
                    <input type="submit" name="Submit" value="SIGNUP" />
                </form>
                <div class="sign-up">
                    <p>Already have an account?</p>
                    <a  href="verifica_user.php">Login</a>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<?php
include '../geral/server-connection.php';
if(isset($_POST["firstname"]) || isset($_POST["lastname"]) || isset($_POST["email"]) || isset($_POST["password"]) || isset($_POST["confirm_password"])) {
    $USERFISRTNAME = clean($_POST["firstname"]);
    $USERLASTNAME = clean($_POST["lastname"]);
    $USEREMAIL = clean($_POST["email"]);
    $USERPASS = clean($_POST["password"]);
    $USERCPASS = clean($_POST["confirm_password"]);
    $findResult = pg_query( "SELECT * FROM cliente WHERE cliente_email ='$USEREMAIL'");
    $findResult2 = pg_fetch_result($findResult, 0, 0);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($USERPASS == $USERCPASS) {
            $USERCRIPTPASS = password_hash($USERPASS, PASSWORD_DEFAULT);
            echo ($findResult2);
            if ($findResult2 != 0) {
                echo "<script type='text/javascript'>alert('Email Already Exists');</script>";
            } else {
                $query = "INSERT INTO cliente (cliente_firstname, cliente_lastname, cliente_email, cliente_password, cliente_balance,cliente_notifications) VALUES ('$USERFISRTNAME', '$USERLASTNAME', '$USEREMAIL', '$USERCRIPTPASS', 200, 'TRUE')";
                $result = pg_query($query);
                header('Location: http://localhost:63342/SI_PROJECT/cliente/verifica_user.php');
            }
        } else {
            echo "<script type='text/javascript'>alert('The passwords do not match');</script>";
        }
    }
}

function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>