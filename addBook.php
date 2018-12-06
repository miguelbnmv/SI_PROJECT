<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="flexboxgrid.min.css" type="text/css">
    <link rel="stylesheet" href="utilities.css" type="text/css">
    <link rel="stylesheet" href="addBook.css" type="text/css">
    <link rel="stylesheet" href="catalog.css" type="text/css">
    <link rel="stylesheet" href="sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<section class="section section--white">
    <div class="container container-fluid">
        <div class="row middle-xs ">
                 <h1>Add Book </h1>
                <?php
                include 'header.php';
                ?>
        </div>
        <div class=" row center-xs middle-xs">
            <div class="add-card">
            <div class="col-xs-12">
            <form action="admin_add.php" method="POST" id="formAdd">
                <div class="row middle-xs  ">
                    <div class="col-xs-12">
                        <input name="title" type="text" placeholder="Book Title"/>
                    </div>
                </div>
                <div class="row middle-xs ">
                    <div class="col-xs-12">
                        <input name="author" type="text" placeholder="Author"/>
                    </div>
                </div>
                <div class="row middle-xs ">
                    <div class="col-xs-12">
                        <input name="publisher" type="text" placeholder="Publishing Company"/>
                    </div>
                </div>
                <div class="row middle-xs ">
                    <div class="col-xs-12">
                        <input name="date" type="date" placeholder="Date"/>
                    </div>
                </div>
                <div class="row middle-xs ">
                    <div class="col-xs-12">
                        <input name="price" type="number" placeholder="Price"/>
                    </div>
                </div>
                <div class="row middle-xs ">
                    <div class="col-xs-12">
                        <textarea name="description" type="text" placeholder="Write book details..."></textarea>
                    </div>
                </div>
                <div class="row middle-xs ">
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
                    <div class="col-xs-3">
                        <input type="submit" name="Submit" value="Add Book" placeholder="Add Book"/>
                    </div>
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>