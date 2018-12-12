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
            <h1>Black Panther </h1>
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
                                <div class=\"col-xs-3\">
                                    <form action='../admin/admin_remove.php?id=" . $_GET['id'] . "' method='POST' id='formRemove'>
                                        <input type='submit' name='Submit' value=''/>
                                    </form>"
                                    ?>
                        </div>
            </div>
                <div class="row middle-xs m-top">
                    <div class="col-xs-3">
                        <div class="upload-btn-wrapper">
                            <button class="btn">Upload a file</button>
                            <input type="file" name="myfile" />
                        </div>
                    </div>
                    <?php
                    include '../geral/server-connection.php';
                    $result = pg_query($connection, "select book_name, book_price, book_publisher, book_date, book_author, book_description from livro WHERE book_id = {$_GET['id']}");
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
                            ");
                    }
                    ?>
                    <div class="row middle-xs m-top">
                        <div class="col-xs-3">
                            <div class="upload-btn-wrapper">
                                <button class="btn">Upload a file</button>
                                <input type="file" name="myfile"/>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="upload-btn-wrapper">
                                <button class="btn">Upload a file</button>
                                <input type="file" name="myfile"/>
                            </div>
                        </div>
                    </div>
                    <div class="row middle-xs m-top">
                        <p>Rating</p>
                        <div class="col-xs-9 book-info">
                            <p>Boo Title</p>
                        </div>
                    </div>
                    <div class="row middle-xs m-top">
                        <p>Favorites</p>
                        <div class="col-xs-9 book-info">
                            <p>Boo Title</p>

                        </div>
                    </div>
                    <div class="row middle-xs m-top">
                        <p>Comments</p>
                        <div class="col-xs-9 book-info">
                            <p>Boo Title</p>
                            <?php
                                echo("<a class=\"b-color\" href='../admin/admin_comments.php?id=" . $_GET['id'] . "'>See More</a>")
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
