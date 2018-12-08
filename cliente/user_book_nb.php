<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/admin_comments.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<?php
include '../geral/server-connection.php';
$result = pg_query($connection, "select book_name, book_price, book_publisher, book_date, book_author, book_description from livro WHERE book_id = {$_GET['id']}");
$result = pg_fetch_all($result);

foreach ($result as $linha) {
    echo("
    <div id=\"mySidenav\" class=\"sidenav w-color\">
        <p class=\"sidebar_title\">This is the <strong>{$linha['book_name']}</strong></p>
        <p class=\"\">The author is <strong>{$linha['book_author']}</strong></p>
        <p class=\"\">Publishing house is <strong>{$linha['book_publisher']}</strong></p>
        <p class=\"\">Published in <strong>{$linha['book_date']}</strong></p>
        <p class=\"\">The book ID is <strong>{$_GET['id']}</strong></p>
        <p class=\"\"><strong></strong> out of 10 stars</p>
        <p class=\"\"><strong></strong> favorites</p>
    </div>
        ");
}
    ?>
<section class="main">
    <?php
    include '../geral/header.php';
    ?>
    <div class="main-container">
        <div class="create_comment">
            <form method="POST" id="formCreateComment">
                <p>Admin</p>
                <textarea name="comment"></textarea>
                <div class="delete">
                    <input type="submit" value="Submit" name="submit" alt="Submit Comment" />
                </div>
            </form>
        </div>
        <div class="main_comments">
            <?php
            include '../geral/server-connection.php';
            $result = pg_query($connection, "select cliente_firstname, comment_content, comment_date from cliente, comentarios where cliente.cliente_id= comentarios.cliente_id and livro_id={$_GET['id']}");
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
                            <input type=\"submit\" value=\"Delete\" name=\"delete\" alt=\"Delete_Comment\" />
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
if (isset($_POST['submit'])) {
    $query = "INSERT INTO comentarios values((select cliente_id from cliente where cliente_email='{$_SESSION['logged']}'),{$_GET['id']},'{$_POST['comment']}', current_timestamp)";
    $result = pg_query($query);
}
if(isset($_POST['delete'])) {
    echo"w";
}

?>