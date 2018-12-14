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
    <link rel="stylesheet" href="../assets/CSS/cliente_account.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/form.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/header.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<div id="mySidenav" class="sidenav w-color">
    <div class="flex-between">
        <div class="account" style="margin-top: 4px">
            <a href="../cliente/menu.php">
                <img class="account-image"  src="../assets/images/menu.png" alt="plus btn">
            </a>
            <h2>Account</h2>
        </div>
        <p style="margin-bottom: 30px">All about your account details</p>

            <label class="check_container1">Edit Account Settings
                <input type="radio" name="order" value="book_name"  checked="checked">
                <a href="../cliente/cliente_account-settings.php" class="checkmark1"></a>
            </label>
            <label class="check_container1">Favorite Books
                <input type="radio" name="order" value="book_author">
                <a href="../cliente/cliente_account-favorites.php" class="checkmark1"></a>
            </label>
            <label class="check_container1">Books Viewed
                <input type="radio" name="order" value="book_date">
                <a href="../cliente/cliente_account-viewed.php" class="checkmark1"></a>
            </label>
            <label class="check_container1">Collection
                <input type="radio" name="order" value="book_price">
                <a href="../cliente/cliente_account-collection.php" class="checkmark1"></a>
            </label>
            <label class="check_container1">Notifications
                <input type="radio" name="order" value="book_publisher">
                <a href="../cliente/cliente_account-settings.php" class="checkmark1"></a>
            </label>


        <label class="check_container" style="margin-top: 40px">Catalog
            <input type="radio" name="radio">
            <a href="../cliente/cliente_account-settings.php" class="checkmark"></a>
        </label>
        <div class="logout w-color">
            <img  src="../assets/images/logout.png" alt="plus btn">
            <a class="w-color" href="../geral/logout.php">Logout</a>
        </div>
    </div>
</div>
<section class="main">
    <div class="row between-lg">
        <h1>Edit account Settings</h1>
        <?php
        include '../geral/header.php';
        ?>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="">
                <div class="main_books add-card">
                    <?php
                    include '../geral/server-connection.php';
                    $result = pg_query($connection, "select cliente_firstname, cliente_lastname, cliente_email, cliente_password, cliente_balance, cliente_notifications from cliente WHERE cliente_id = {$_SESSION["user_logged_id"]}");
                    $result = pg_fetch_all($result);
                    foreach ($result as $linha) {
                        echo "
                        <form method='POST'>
                        <div class='row'>
                        <div class='col-xs-6'>
                            <p>First Name:</p>
                            <input type='text' name='cliente_firstname' value='{$linha['cliente_firstname']}'/>
                            </div>
                                   <div class='col-xs-6'>
                            <p>Second Name:</p>
                            <input type='text' name='cliente_lastname' value='{$linha['cliente_lastname']}'/>
                                   </div>
                            </div>
                            <p>User Email:</p>
                            <input type='text' name='cliente_email' value='{$linha['cliente_email']}'/>
                            <p>Password:</p>
                            <input type='text' name='cliente_email' value='{$linha['cliente_password']}'/>
                            <p>Notifications:</p>
                            <input type='text' name='cliente_email' value='{$linha['cliente_notifications']}'/>
                            <input type='submit' name='new' value='Update profile'/></li>
                        </form>
                            <h3 style='margin-top: 20px'><strong>Total balance  </strong>{$linha['cliente_balance']}</h3>
                        ";
                    }

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $USERNAMEUPDATE = $_POST["cliente_firstname"];
                        $USERLASTNAMEUPDATE = $_POST["cliente_lastname"];
                        $USEREMAILUPDATE = $_POST["cliente_email"];
                        $query ="UPDATE cliente 
                                 SET (cliente_firstname, cliente_lastname, cliente_password) = 
                                ('$USERNAMEUPDATE','$USERLASTNAMEUPDATE','$USEREMAILUPDATE')
                                WHERE cliente_id= '{$_SESSION["user_logged_id"]}' ";
                        $result = pg_query($query);

                        if (!$result) {
                            echo "Update failed!!";
                        } else {
                            header('Location: http://localhost:63342/SI_PROJECT/cliente/cliente_account-settings.php');
                            echo "Update successfull;";
                        }

                    }?>

                </div>
            </div>
        </div>
</section>
</body>

