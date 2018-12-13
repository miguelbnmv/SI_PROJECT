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
    <link rel="stylesheet" href="../assets/CSS/form.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<section class="section section--white">
    <?php
    include '../geral/header.php';
    include '../geral/server-connection.php';
    $result = pg_query($connection, "SELECT book_id, book_name, book_author, book_price, book_publisher, book_date, book_cover, book_text FROM livro");
    $result = pg_fetch_all($result);
    foreach ($result as $linha)
        $Book_comprado = pg_query($connection, "SELECT book_id FROM compra  WHERE book_id = {$linha['book_id']}");
        $Book_comprado_result = pg_num_rows($Book_comprado);
    {
            echo "
                    <div class=\"book\">
                    <iframe name=\"myiframe\" id=\"myiframe\" src=\"../assets/texts/{$linha['book_text']}\">
                    </div> 
            ";

    }
    ?>

</section>
</body>

</html>



