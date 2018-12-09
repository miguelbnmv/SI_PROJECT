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
    <link rel="stylesheet" href="assets/CSS/rating.css" type="text/css">
    <link rel="stylesheet" href="assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<?php
include 'server-connection.php';

//Show
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
    include 'header.php';
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
    <?php
            include 'server-connection.php';
            echo"
                <div>
                    <p class=\"\">Description <stron g>{$linha['book_description']}</strong></p>
                    <p class=\"\">Price <strong>{$linha['book_price']}</strong></p>
                </div>
                <form method=\"POST\" id=\"formCreateComment\">
                  
                  <input aria-flowto=\"rating2\" class=\"rating__input\" type=\"radio\" name=\"rating\" value=\"1\" id=\"rating1\" aria-flowto=\"rating2\">
                  <label class=\"rating__label\" for=\"rating1\">☆
                    <span class=\"rating__star\">1 Stars</span> 
                  </label>
                  
                  <input aria-flowto=\"rating3\" class=\"rating__input\" type=\"radio\" name=\"rating\" value=\"2\" id=\"rating2\">
                  <label class=\"rating__label\" for=\"rating2\">☆
                    <span class=\"rating__star\">2 Stars</span> 
                  </label>
                  
                  <input aria-flowto=\"rating4\" class=\"rating__input\" type=\"radio\" name=\"rating\" value=\"3\" id=\"rating3\">
                  <label class=\"rating__label\" for=\"rating3\">☆
                    <span class=\"rating__star\">3 Stars</span> 
                  </label>
                  
                  <input aria-flowto=\"rating5\"  class=\"rating__input\" type=\"radio\" name=\"rating\" value=\"4\" id=\"rating4\">
                  <label class=\"rating__label\" for=\"rating4\">☆
                    <span class=\"rating__star\">4 Stars</span> 
                  </label>gi
                  
                  <input aria-flowto=\"rating0\" class=\"rating__input\" type=\"radio\" name=\"rating\" value=\"5\" id=\"rating5\">
                  <label class=\"rating__label\" for=\"rating5\">☆
                    <span class=\"rating__star\">5 Stars</span> 
                  </label>
                  <input type='submit' value='submit_rating' name='submit_rating'>
                 </form>
           
        <div class=\"main_comments\">";
            //Insert or Update rating
            if(isset($_POST["submit_rating"])) {
                $all_ratings = pg_query($connection,"select * from rating where cliente_id=(select cliente_id from cliente where cliente_email='{$_SESSION['logged']}')");
                $all_ratings2 = pg_numrows($all_ratings);
                if($all_ratings2==0) {
                    $query = "INSERT INTO rating values((select cliente_id from cliente where cliente_email='{$_SESSION['logged']}'),{$_GET['id']},{$_POST["rating"]})";
                    $result = pg_query($query);
                } else {
                    $query = "UPDATE rating SET rating = {$_POST["rating"]} where cliente_id=(select cliente_id from cliente where cliente_email='{$_SESSION['logged']}')";
                    $result = pg_query($query);
                }
            }

            //Rating Average
            $result = pg_query($connection, "select rating from rating where book_id='{$_GET['id']}'");
            $ratings = pg_fetch_all($result);
            $total=0;
            foreach ($ratings as $linha) {
                $total=$total+$linha['rating'];
            }
            $avg = $total/count($ratings);
            echo "<p>A média é </p>".$avg;

            //Show comments
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