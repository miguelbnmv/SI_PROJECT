<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/header.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/admin_comments.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/rating.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/header.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/user_book.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<div id="mySidenav" class="sidenav w-color">
    <?php
    //Show
    include '../geral/server-connection.php';
    $favoritecount = pg_query($connection,"select * from favorite where book_id={$_GET['id']} and favorite = true");
    $favoritecount2 = pg_numrows($favoritecount);
    $result = pg_query($connection, "select book_name, book_publisher, book_date, book_author from livro where book_id = {$_GET['id']}");
    $result = pg_fetch_all($result);
    foreach ($result as $linha) {
        echo "

            <h1 class=\"sidebar_title\" ><strong>This is</strong> {$linha['book_name']}</h1>
            <p class=\"\">The author is <strong>{$linha['book_author']}</strong></p>
            <p class=\"\">Publishing house is <strong>{$linha['book_publisher']}</strong></p>
            <p class=\"\">Published in <strong>{$linha['book_date']}</strong></p>
            <p class=\"\">The book ID is <strong>{$_GET['id']}</strong></p>
            <p> <strong>$favoritecount2 </strong> favorites</p>
 
        ";
    }
    //Rating Average
    $rating_push = pg_query($connection, "select rating from rating where book_id='{$_GET['id']}'");
    $rating_count = pg_numrows($rating_push);
    $ratings = pg_fetch_all($rating_push);
    $total=0;
    if($rating_count==0) {
    echo "<p><strong>No</strong> rating</p>";
    } else if ($rating_count>0) {
    foreach ($ratings as $linha) {
    $total = $total + $linha['rating'];
    }
    $avg = $total / count($ratings);
    echo "<p><strong>$avg</strong> out of 10 stars</p>";
    }
    ?>
</div>
<section class="main">
    <a href='../cliente/user_catalog.php'>
        <img src='../assets/images/goback.png' style='width: 31.49px; height: 21.49px; margin-right: 20px'>
    </a>
    <?php
    include '../geral/header.php';
    ?>
    <div class="main-container">
        <?php
        $result = pg_query($connection, "select book_price, book_description, book_cover from livro where book_id = {$_GET['id']}");
        $result = pg_fetch_all($result);
        echo"
            <div class='info'>
                <div class='left'>
                    <div class=\"book\">
                        <form method=\"POST\">
                            <input id='fav' type=\"submit\" class=\"button\" name=\"insert\" value=\"\" src=\"../assets/images/like.png\" onclick=\"change_background\" >♡ </input>
                        </form>
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
                      </label>
                      
                      <input aria-flowto=\"rating0\" class=\"rating__input\" type=\"radio\" name=\"rating\" value=\"5\" id=\"rating5\">
                      <label class=\"rating__label\" for=\"rating5\">☆
                        <span class=\"rating__star\">5 Stars</span> 
                      </label>
                      
                      <input class='raking_submit' type='submit' value='submit_rating' name='submit_rating'>
                     </form>
            ";
            foreach ($result as $linha) {
                echo "
                      <img src = \"../assets/covers/{$linha['book_cover']}\">
                        </div>
                        <div class=''>
                            <h1 class=\"\">Description</h1>
                            <p>{$linha['book_description']}</p>
                   <div class=\"card\">
        <p class=\"w-color\" style='margin-bottom: 10px'>You can <strong>read</strong> this book</p>
        <div class='small-card'>
        <a href='../cliente/cliente_seebook.php?id' class=\"b-color\"> Read book </a>
        </div>
    </div>

                        </div>                               
                    </div>";
                 }
        ?>
        <div class="create_comment">
            <form method="POST" id="formCreateComment">
                <p>User</p>
                <textarea name="comment" style="resize: none;"></textarea>
                <div class="delete">
                    <input type="submit" value="Submit" name="submit" alt="Submit Comment" />
                </div>
            </form>
        </div>
        <?php
        include '../geral/server-connection.php';
        echo"
           
        <div class=\"main_comments\">
        ";
        //Insert or Update rating
        if(isset($_POST["submit_rating"])) {
            $all_ratings = pg_query($connection,"select * from rating where cliente_id={$_SESSION['user_logged_id']}");
            $all_ratings2 = pg_numrows($all_ratings);
            if($all_ratings2==0) {
                $query = "INSERT INTO rating values({$_SESSION['user_logged_id']},{$_GET['id']},{$_POST["rating"]})";
                $result = pg_query($query);
            } else {
                $query = "UPDATE rating SET rating = {$_POST["rating"]} where cliente_id={$_SESSION['user_logged_id']}";
                $result = pg_query($query);
            }
        }

        //Show comments -- MUDA O LIVRO_ID PARA BOOK_ID
        $result = pg_query($connection, "select cliente_firstname, comment_content, comment_date from cliente, comentarios where cliente.cliente_id= comentarios.cliente_id and book_id={$_GET['id']}");
        $result_count = pg_numrows($result);
        $result = pg_fetch_all($result);
        if($result_count==0) {
            echo "</br>Não há comentários";
        } else if ($result_count>0) {
            foreach ($result as $linha) {
                echo"<div class=\"comment\">
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
                    </div>";
            }
        }
        ?>
    </div>
</section>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $query = "INSERT INTO comentarios values({$_SESSION["user_logged_id"]},{$_GET['id']},'{$_POST['comment']}', current_timestamp)";
    $result = pg_query($query);
}

if(isset($_POST["insert"])) {
    $all_fav = pg_query($connection,"select * from favorite where cliente_id={$_SESSION["user_logged_id"]} and book_id={$_GET['id']}");
    $all_fav2 = pg_numrows($all_fav);
    if($all_fav2==0) {
        $query = "INSERT INTO favorite  values ({$_SESSION["user_logged_id"]},{$_GET['id']}, false )";
        $result = pg_query($query);
    } if($all_fav2!=0) {
        $query2 ="UPDATE favorite 
                  SET favorite = NOT favorite
                  WHERE book_id= '{$_GET['id']}' and cliente_id= {$_SESSION["user_logged_id"]}";
        $result2 = pg_query($query2);
        if (!$result2) {
            echo "Update failed!!";
        } else {
            echo "Update successfull;";
        }
    }
}
?>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
