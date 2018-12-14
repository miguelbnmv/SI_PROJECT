<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/flexboxgrid.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/admin_comments.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/header.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<section class="section section--white">
    <div class="container container-fluid">
            <div class="row between-lg m-top">
            <?php
                        include '../geral/server-connection.php';
            $result = pg_query($connection, "select book_name from livro WHERE book_id = {$_GET['id']}");
            $result = pg_fetch_all($result);
            foreach ($result as $linha) {
                echo "
            <div class='book_title'>
                <a href='../admin/admin_SeeBook.php?id=" . $_GET['id'] . "'>
                    <img src='../assets/images/goback.png' style='width: 31.49px; height: 21.49px; margin-right: 20px'>
                </a>
                <h1>{$linha['book_name']} Comments </h1>

            </div> ";
            }
            ?>
            <?php
            include '../geral/header.php';
            ?>
            </div>


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
               $result = pg_query($connection, "select cliente_firstname, comment_content, comment_date from cliente, comentarios where cliente.cliente_id= comentarios.cliente_id and book_id={$_GET['id']}");
               $result_count = pg_numrows($result);
               $result = pg_fetch_all($result);
               if($result_count==0)
               {
                   echo " <p style='margin-left: 20px'>Não há comentários</p>";
               }
               else if ($result_count>0)
               {
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
               }
               ?>
            </div>
        </div>
    </div>
</section>

</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $query = "INSERT INTO comentarios values({$_SESSION["user_logged_id"]},{$_GET['id']},'{$_POST['comment']}', current_timestamp)";
    $result = pg_query($query);
}
if(isset($_POST['delete'])) {
    echo"doesnt work";
}
?>