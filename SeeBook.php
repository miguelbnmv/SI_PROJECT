<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="flexboxgrid.min.css" type="text/css">
    <link rel="stylesheet" href="utilities.css" type="text/css">
    <link rel="stylesheet" href="seeBook.css" type="text/css">
    <link rel="stylesheet" href="catalog.css" type="text/css">
    <link rel="stylesheet" href="sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<section class="section section--white">
    <div class="container container-fluid">
        <div class="row middle-xs ">
                 <h1>Black Panther </h1>
                <?php
                include 'header.php';
                ?>
        </div>
        <div class=" row center-xs middle-xs">
            <div class="add-card">
            <div class="col-xs-12">
                <div class="row end-xs">
                    <div class="col-xs-1 images">
                        <?php
                        echo "<a href='admin_edit.php?id=" . $_GET['id'] . "'>
                        <img src='assets/images/edit.png'>
                        </a>
                        " ?>
                    </div>
                    <div class="col-xs-1 images">
                        <a href="price_history.php">
                    <img src="assets/images/price.png">
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <?php echo "
                            <form action='admin_remove.php?id=" . $_GET['id'] . "' method='POST' id='formRemove'>
                            <input type='submit' name='Submit' value=''/>
                        </form>"
                        ?>
                    </div>
            </div>
                <?php
                include 'server-connection.php';
                $SelectedBookId =$_GET['id'];
                    $BOOKNAME = pg_query($connection, "SELECT book_name FROM livro WHERE book_id = $SelectedBookId");
                    $BOOKNAME1 = pg_fetch_result($BOOKNAME, 0, 0);
                    $BOOKPRICE = pg_query($connection, "SELECT book_price FROM livro WHERE book_id = $SelectedBookId");
                    $BOOKPRICE1 = pg_fetch_result($BOOKPRICE, 0, 0);
                    $BOOKPUBLISHER = pg_query($connection, "SELECT book_publisher FROM livro WHERE book_id = $SelectedBookId");
                    $BOOKPUBLISHER1 = pg_fetch_result($BOOKPUBLISHER, 0, 0);
                    $BOOKDATE = pg_query($connection, "SELECT book_date FROM livro WHERE book_id = $SelectedBookId");
                    $BOOKDATE1 = pg_fetch_result($BOOKDATE, 0, 0);
                    $BOOKAUTHOR = pg_query($connection, "SELECT book_author FROM livro WHERE book_id = $SelectedBookId");
                    $BOOKDAUTHOR1 = pg_fetch_result($BOOKDATE, 0, 0);
                    $BOOKDESCRIPTION = pg_query($connection, "SELECT book_description FROM livro WHERE book_id = $SelectedBookId ");
                    $BOOKDESCRIPTION1 = pg_fetch_result($BOOKDATE, 0, 0);
                    echo ("<div class=\"row middle-xs m-top\">
                    <p>Book Title</p>
                    <div class=\"col-xs-9 book-info\">
                        <p>$BOOKNAME1</p>
                    </div>
                </div>
                <div class=\"row middle-xs m-top\">
                    <p>Author</p>
                    <div class=\"col-xs-9 book-info\">
                        <p>$BOOKDAUTHOR1</p>
                    </div>
                </div>
                <div class=\"row middle-xs m-top\">
                    <p>Publishing <br> Company</p>
                    <div class=\"col-xs-9  book-info\">
                        <p>$BOOKPUBLISHER1</p>
                    </div>
                </div>
                                <div class=\"row middle-xs m-top\">
                    <p>Date</p>
                    <div class=\"col-xs-9  book-info\">
                        <p>$BOOKDATE1</p>
                    </div>
                </div>
                
                <div class=\"row middle-xs m-top\">
                    <p>Price</p>
                    <div class=\"col-xs-9  book-info\">
                        <p>$BOOKPRICE1 $</p>
                    </div>
                </div>
                               <div class=\"row middle-xs m-top\">
                    <p>Description</p>
                    <div class=\"col-xs-9  book-info\">
                        <p>$BOOKDESCRIPTION1</p>
                    </div>
                </div>
                ");

                ?>

                <div class="row middle-xs m-top">
                    <div class="col-xs-3">
                        <div class="upload-btn-wrapper">
                            <button class="btn">Upload a file</button>
                            <input type="file" name="myfile" />
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="upload-btn-wrapper">
                            <button class="btn">Upload a file</button>
                            <input type="file" name="myfile" />
                        </div>
                    </div>
                </div>
                    <div class="row middle-xs m-top">
                        <p>Rating</p>
                        <div class="col-xs-9 book-info">
                            <p>Boo Titlek</p>
                        </div>
                    </div>
                <div class="row middle-xs m-top">
                    <p>Favorites</p>
                    <div class="col-xs-9 book-info">
                       <p>Boo Titlek</p>
                    </div>
                </div>
                <div class="row middle-xs m-top">
                    <p>Comments</p>
                    <div class="col-xs-9 book-info">
                        <p>Boo Titlek</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>