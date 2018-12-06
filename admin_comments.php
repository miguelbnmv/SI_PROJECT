<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/admin_comments.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<div id="mySidenav" class="sidenav w-color">
    <p class="sidebar_title"><strong>Hi</strong> Admin</p>
    <label class="check_container">Catalog
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
    </label>
    <label class="check_container">Statistics
        <input type="radio" name="radio">
        <span class="checkmark"></span>
    </label>
    <label class="check_container">Edit Account Settings
        <input type="radio" name="radio">
        <span class="checkmark"></span>
    </label>
    <div class="logout w-color">
        <a class="w-color" href="logout.php">Logout</a>
    </div>
</div>
<section class="main">
    <div class="main_header">
        <h1>comments</h1>
    </div>
    <?php
    include 'header.php';
    ?>
    <div class="main-container">
        <div class="create_comment">
            <form method="POST" id="formCreateComment">
                <p>Admin</p>
                <textarea name="comment"></textarea>
                <div class="delete">
                    <input type="image" src="assets/images/comment%20button.png" name="submit_comment" alt="Submit Comment" />
                </div>
            </form>
        </div>
        <div class="main_comments">
           <?php
           include 'server-connection.php';
           $result = pg_query($connection, "select cliente_firstname, comment_content, comment_date from cliente, comentarios where cliente.cliente_id= comentarios.cliente_id");
           $result = pg_fetch_all($result);
           foreach ($result as $linha)
           {
               echo ("<div class=\"comment\">
                <div class=\"info\">
                    <h3>{$linha['cliente_firstname']}</h3>
                    <p class=\"comment_date\">{$linha['comment_date']}</p>
                </div>
                <div class=\"content\">
                    {$linha['comment_content']}
                </div>
                <div class=\"delete\">
                    <form method=\"POST\" id=\"formCreateComment\" >
                        <input type=\"image\" src=\"assets/images/waste-bin.png\" name=\"delete_comment\" alt=\"Delete_Comment\" />
                    </form>
                </div>
            </div>");
           }
            ?>
        </div>
    </div>
</section>
</body>
</html>
<?php
if(isset($_POST['submit_comment']))
{
    $COMMENT = $_POST["comment"];

    $rowResource = pg_query($connection, "SELECT count(*) AS exact_count FROM livro");
    $rowCount = pg_fetch_result($rowResource, 0, 0);

    $query = "INSERT INTO livro VALUES ($rowCount+1,'2','$BOOKAUTHOR','$BOOKPRICE','$BOOKDESCRIPTION','$BOOKPUBLISHER','$BOOKDATE')";
    $result = pg_query($query);

    header("Location: http://localhost:63342/SI_PROJECT/catalog.php");
    echo("1");
} else if(isset($_POST['delete_comment']))
{
    echo("2");
}
?>