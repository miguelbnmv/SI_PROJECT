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
    <link rel="stylesheet" href="../assets/CSS/statistics.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<div id="mySidenav" class="sidenav w-color">
    <p class="sidebar_title"><strong>Hi</strong> Admin</p>
    <label class="check_container">Catalog
        <input type="radio"  name="radio">
        <span class="checkmark"></span>
    </label>
    <label class="check_container">Statistics
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
    </label>
    <label class="check_container">Edit Account Settings
        <input type="radio" name="radio">
        <span class="checkmark"></span>
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
        <div class="col-xs-10">
            <div class="main-container">
                <p> <b> Lorem ipsum dolor sit amet, nec tibique argumentum cu, at mei nulla soleat omnesque, his et simul quando iisque.</b>
                    Est fugit tempor prodesset in, ad sumo noluisse moderatius duo.</p>
                <div class="main_books">
                    <?php
                    include '../geral/server-connection.php';
                    $SelectedAdminId =  $_GET['id'];
                    $rowResource = pg_query($connection, "SELECT * FROM administrator WHERE admin_id = $SelectedAdminId");
                    $ADMINNAME = pg_query($connection, "SELECT admin_name FROM administrator WHERE admin_id = $SelectedAdminId");
                    $ADMINNAME1 = pg_fetch_result($ADMINNAME, 0, 0);
                    $ADMINEMAIL = pg_query($connection, "SELECT admin_email FROM administrator WHERE admin_id = $SelectedAdminId");
                    $ADMINEMAIL1 = pg_fetch_result($ADMINEMAIL, 0, 0);
                    $ADMINPASS = pg_query($connection, "SELECT admin_password FROM administrator WHERE admin_id = $SelectedAdminId");
                    $ADMINPASS1 = pg_fetch_result($ADMINPASS, 0, 0);
                    echo"
    <form method='POST'>
    <li>Admin Name:</li>
    <li><input type='text' name='admin_name' value='$ADMINNAME1' /></li>
    <li>Admin Email:</li><li><input type='text' name='admin_email' value='$ADMINEMAIL1' /></li>
    <li>Password:</li>
    <li><input type='text' name='admin_password' value='$ADMINPASS1' /></li>
    <li> <input type='submit' name='new' /></li>
    </form>";
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $var=$_GET['user'];
                        $ADMINNAMEUPDATE = $_POST["admin_name"];
                        $ADMINEMAILUPDATE = $_POST["admin_email"];
                        $ADMINPASSUPDATE = $_POST["admin_password"];
                        $query ="UPDATE administrator 
        SET (admin_name, admin_email, admin_password) = 
        ('$ADMINNAMEUPDATE','$ADMINEMAILUPDATE','$ADMINPASSUPDATE')
        WHERE admin_id= '$SelectedAdminId' ";
                        $result = pg_query($query);

                        if (!$result) {
                            echo "Update failed!!";
                        } else {
                            header('Location: http://localhost:63342/SI_PROJECT/admin/admin_account-settings.php?id=' . $_GET['id']);
                            echo "Update successfull;";
                        }

                    }?>

                </div>
            </div>
        </div>
</section>
</body>

