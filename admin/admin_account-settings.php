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
    <link rel="stylesheet" href="../assets/CSS/admin_account.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<div id="mySidenav" class="sidenav w-color">
    <p class="sidebar_title"><strong>Hi</strong> Admin</p>
    <label class="check_container">Catalog
        <input type="radio"  name="radio">
        <a href="../admin/admin_catalog.php" class="checkmark"></a>
    </label>
    <label class="check_container">Statistics
        <input type="radio" name="radio">
        <a href="../admin/statistics.php" class="checkmark"></a>
    </label>
    <label class="check_container">Edit Account Settings
        <input type="radio" checked="checked" name="radio">
        <a class="checkmark" href='../admin/admin_account-settings.php'></a>
    </label>
    <div class="logout w-color">
        <a class="w-color" href="../geral/logout.php">Logout</a>
    </div>
</div>
<section class="main">
    <div class="main_header">
        <h1>Edit account Settings</h1>
    </div>
    <?php
    include '../geral/header.php';
    ?>
    <div class="row">
        <div class="col-xs-8">
            <div class="main-container">
                <p> <b> Lorem ipsum dolor sit amet, nec tibique argumentum cu, at mei nulla soleat omnesque, his et simul quando iisque.</b>
                    Est fugit tempor prodesset in, ad sumo noluisse moderatius duo.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-8">
            <div class="main-container">
                <div class="add_card">
                    <?php
                    include '../geral/server-connection.php';
                    $result = pg_query($connection, "select admin_name, admin_email, admin_password from administrator WHERE admin_id = {$_SESSION["admin_logged_id"]}");
                    $result = pg_fetch_all($result);
                    foreach ($result as $linha) {
                        echo "
                        <form method='POST'>
                            <p>Admin Name:</p>
                            <p><input type='text' name='admin_name' value='{$linha['admin_name']}' /></p>
                            <p>Admin Email:</p>
                            <p><input type='text' name='admin_email' value='{$linha['admin_email']}' /></p>
                            <p>Password:</p>
                            <p><input type='text' name='admin_password' value='{$linha['admin_password']}' /></p>
                            <p> <input type='submit' name='new' /></p>
                        </form>";
                    }

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $ADMINNAMEUPDATE = $_POST["admin_name"];
                        $ADMINEMAILUPDATE = $_POST["admin_email"];
                        $ADMINPASSUPDATE = $_POST["admin_password"];
                        $query ="UPDATE administrator 
                                SET (admin_name, admin_email, admin_password) = 
                                ('$ADMINNAMEUPDATE','$ADMINEMAILUPDATE','$ADMINPASSUPDATE')
                                WHERE admin_id= {$_SESSION["admin_logged_id"]} ";

                        $result = pg_query($query);

                        if (!$result) {
                            echo "Update failed!!";
                        } else {
                            header('Location: http://localhost:63342/SI_PROJECT/admin/admin_account-settings.php');
                            echo "Update successfull;";
                        }
                    }?>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
</section>
</body>

