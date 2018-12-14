<html>
<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/flexboxgrid.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/admin_edit.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<section class="section section--white">
    <div class="container container-fluid">
        <div class="row between-lg ">
            <?php
            include '../geral/server-connection.php';
            $result = pg_query($connection, "select book_name from livro WHERE book_id = {$_GET['id']}");
            $result = pg_fetch_all($result);
            foreach ($result as $linha) {
                echo "
                <div class='book_title'>
                <a href='../admin/admin_catalog.php'>
                    <img src='../assets/images/goback.png' style='width: 31.49px; height: 21.49px; margin-right: 20px'>
                </a>
                  <h1>{$linha['book_name']} Edit </h1>
                  </div>
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
                <?php
$result = pg_query($connection, "select book_name, book_price, book_publisher, book_date, book_author, book_description, book_text, book_cover from livro WHERE book_id = {$_GET['id']}");
$result = pg_fetch_all($result);

foreach ($result as $linha)
{
    echo("
       <form method='POST'  >
                            <div class=\"row middle-xs m-top\">
                                <p>Book Title</p>
                                <div class=\"col-xs-9 book-info\">
                                   <input type='text' name='book_name' value='{$linha['book_name']}' />
                                </div>
                            </div>
                            <div class=\"row middle-xs m-top\">
                                <p>Author</p>
                                <div class=\"col-xs-9 book-info book_author\">
                                 <input type='text' name='book_author' value='{$linha['book_author']}' />
                                </div>
                            </div>
                            <div class=\"row middle-xs m-top\">
                                <p>Publishing<br>Company</p>
                                <div class=\"col-xs-9  book-info book_publisher\">
                                 <input type='text' name='book_publisher' value='{$linha['book_publisher']}' />
                                </div>
                            </div>
                            <div class=\"row middle-xs m-top\">
                                <p>Date</p>
                                <div class=\"col-xs-9  book-info book_date\">
                                 <input type='text' name='book_date' value='{$linha['book_date']}' />
                                </div>
                            </div>
                            <div class=\"row middle-xs m-top\">
                                <p>Price</p>
                                <div class=\"col-xs-9  book-info book_price\">
                                 <input type='text' name='book_price' value='{$linha['book_price']}' />
                                </div>
                            </div>
                            <div class=\"row middle-xs m-top\">
                                <p>Description</p>
                                <div class=\"col-xs-9  book-info\">
                                     <input type='text' name='book_description' value='{$linha['book_description']}' />
                                </div>
                            </div>
                        <div class=\"row m-top\">
                        <div class=\"col-xs-3 m-top\">
                            <div class=\"upload-btn-wrapper\">
                                 <img src='../assets/covers/{$linha['book_cover']}'/>
                                  <input type=\"file\" accept=\"image/png, image/jpeg\" name=\"myCover\" />
                            </div>
                        </div>
                        <div class=\"col-xs-3 m-top\">
                            <div class=\"upload-btn-wrapper\">
                    <iframe src='../assets/texts/{$linha['book_text']}'> </iframe>
                     <input type=\"file\" accept=\".pdf\" name=\"myText\" />
                            </div>
                        </div>
                    </div>
                    <div class='row end-lg'>
                    <input type='submit' name='new' value='Update book' /> 
                    </div>
                             </form>
                            ");
}


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name_cover = $_POST['myCover'];
        $target_cover = '../assets/covers/'.$name_cover;
        move_uploaded_file( $_POST['myCover']['tmp_name'], $target_cover);
        $name_text = $_POST['myText'];
        $target_text = '../assets/texts/'.$name_text;
        move_uploaded_file( $_POST['myText']['tmp_name'], $target_text);
        $BOOKNAMEUPDATE = $_POST["book_name"];
        $BOOKPRICEUPDATE = $_POST["book_price"];
        $BOOKDATEUPDATE = $_POST["book_date"];
        $BOOKAUTHORUPDATE = $_POST["book_author"];
        $BOOKPUBLISHERUPDATE = $_POST["book_publisher"];
        $BOOKDESCRIPTIONUPDATE = $_POST["book_description"];
        $searchbookId = pg_query($connection, "SELECT book_id FROM view_history WHERE book_id = {$_GET['id']}");
        $searchbookId2 = pg_numrows($searchbookId);
        if ($searchbookId2 > 0 ) {
            echo "already saw, you cant edit";
        }
    else {
        $query = "UPDATE livro 
        SET (book_name, book_price, book_date, book_author,book_publisher, book_description, book_cover, book_text) = 
        ('$BOOKNAMEUPDATE','$BOOKPRICEUPDATE','$BOOKDATEUPDATE', '$BOOKAUTHORUPDATE','$BOOKPUBLISHERUPDATE', '$BOOKDESCRIPTIONUPDATE','$name_cover','$name_text')
        WHERE book_id= '{$_GET['id']}' ";

    $result = pg_query($query);

    $query2 = "INSERT INTO price_history values({$_SESSION["admin_logged_id"]},{$_GET['id']},'{$_POST["book_price"]}',CURRENT_TIMESTAMP)";
    $result2 = pg_query($query2);

    if (!$result) {
        echo "Update failed!!";
    } else {
        echo "Update successfull;";
    }
}
}?>
    </div>
            </div>
        </div>
</section>
</body>
</html>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>