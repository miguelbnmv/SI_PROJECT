<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/favicon.ico"/>
    <link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/flexboxgrid.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/seeBook.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/catalog.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<section class="section section--white">
    <div class="container container-fluid">
        <div class="row middle-xs ">
            <?php
            include '../geral/server-connection.php';
            $result = pg_query($connection, "select book_name from livro WHERE book_id = {$_GET['id']}");
            $result = pg_fetch_all($result);
            foreach ($result as $linha) {
                echo "
<a href='../admin/admin_catalog.php'>
 <img src='../assets/images/goback.png' style='width: 31.49px; height: 21.49px; margin-right: 20px'>
 </a>
                  <h1>{$linha['book_name']}</h1>
                ";
            }
            ?>
            <?php
            include '../geral/header.php';
            ?>
        </div>
        <div class=" row center-xs middle-xs">
            <div class="add-card">
                <div class="col-xs-12">
                    <div class="row end-xs">
                        <div class="col-xs-1 images">
                            <?php
                            echo "<a href='../admin/admin_edit.php?id=" . $_GET['id'] . "'>
                                    <img src='../assets/images/edit.png'>
                                  </a>
                        
                                </div>
                                <div class=\"col-xs-1 images\">
                                    <a href='../admin/price_history.php?id=" . $_GET['id'] . "'>
                                        <img src=\"../assets/images/price.png\">
                                    </a>
                                </div>
                                <div class=\"col-xs-1 images\">
                                 <a href='../admin/admin_remove.php?id=" . $_GET['id'] . "'>
                                    <img src=\"../assets/images/lixo.png\">
                                  </a>
                                   </div>
                                  ";

                                    ?>
                        </div>
            </div>

                    <?php
                    include '../geral/server-connection.php';
                    $result = pg_query($connection, "select book_name, book_price, book_publisher, book_date, book_author, book_description, book_text, book_cover from livro WHERE book_id = {$_GET['id']}");
                    $result = pg_fetch_all($result);

                    foreach ($result as $linha)
                    {
                        echo("
                            <div class=\"row middle-xs m-top\">
                                <p>Book Title</p>
                                <div class=\"col-xs-9 book-info\">
                                    <p>{$linha['book_name']}</p>
                                </div>
                            </div>
                            <div class=\"row middle-xs m-top\">
                                <p>Author</p>
                                <div class=\"col-xs-9 book-info\">
                                    <p>{$linha['book_author']}</p>
                                </div>
                            </div>
                            <div class=\"row middle-xs m-top\">
                                <p>Publishing <br> Company</p>
                                <div class=\"col-xs-9  book-info\">
                                    <p>{$linha['book_publisher']}</p>
                                </div>
                            </div>
                            <div class=\"row middle-xs m-top\">
                                <p>Date</p>
                                <div class=\"col-xs-9  book-info\">
                                    <p>{$linha['book_date']}</p>
                                </div>
                            </div>
                            <div class=\"row middle-xs m-top\">
                                <p>Price</p>
                                <div class=\"col-xs-9  book-info\">
                                    <p>{$linha['book_price']} $</p>
                                </div>
                            </div>
                            <div class=\"row middle-xs m-top\">
                                <p>Description</p>
                                <div class=\"col-xs-9  book-info\">
                                    <p>{$linha['book_description']}</p>
                                </div>
                            </div>
                        <div class=\"row middle-xs m-top\">
                        <div class=\"col-xs-3\">
                            <div class=\"upload-btn-wrapper\">
    <img src='../assets/covers/{$linha['book_cover']}'/>
                            </div>
                        </div>
                        <div class=\"col-xs-3\">
                            <div class=\"upload-btn-wrapper\">
                    <iframe src='../assets/texts/{$linha['book_text']}'> </iframe>
                            </div>
                        </div>
                    </div>
                            ");
                    }
                    ?>
                    <?php
                    $result = pg_query($connection, "select rating from rating where book_id='{$_GET['id']}'");
                    $result_count = pg_numrows($result);
                    $ratings = pg_fetch_all($result);
                    $total=0;
                    if($result_count==0)
                    {echo "
                        <div class='row middle-xs m-top'>
                        <p>Rating</p>
                        <div class='col-xs-9 book-info'>
                            <p>No raking</p>
                        </div>
                    </div>
                    ";
                    }
                    else if ($result_count>0) {
                        foreach ($ratings as $linha) {
                            $total = $total + $linha['rating'];
                        }
                        $avg = $total / count($ratings);echo "
                        <div class='row middle-xs m-top'>
                        <p>Rating</p>
                        <div class='col-xs-9 book-info'>
                            <p>$avg</p>
                        </div>
                    </div>
                    ";
                    }
                    $favorites = pg_query($connection,"select * from favorite where book_id={$_GET['id']} and favorite=true");
                    $favoritestotal = pg_numrows($favorites);
                     echo "
    
                    <div class='row middle-xs m-top'>
                        <p>Favorites</p>
                        <div class='col-xs-9 book-info'>
                            <p>$favoritestotal</p>

                        </div>
                    </div>";
                     $comments = pg_query($connection, "select * from comentarios where book_id={$_GET['id']}");
                    $commentstotal = pg_numrows($comments);
                    echo "
                    <div class='row middle-xs m-top'>
                        <p>Comments</p>
                        <div class='col-xs-9 book-info'>
                            <p>$commentstotal </p>
       
                   <a class=\"b-color\" href='../admin/admin_comments.php?id=" . $_GET['id'] . "'> See More</a>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
