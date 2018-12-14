<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ViewComics inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/flexboxgrid.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/utilities.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/addBook.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/header.css" type="text/css">
    <link rel="stylesheet" href="../assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<section class="section section--white">
    <div class="container container-fluid">
        <div class="row between-lg">
            <div class="add_title">
            <a href='../admin/admin_catalog.php'>
                <img src='../assets/images/goback.png' style='width: 31.49px; height: 21.49px; margin-right: 20px'>
            </a>
                 <h1>Add Book </h1>
            </div>
                <?php
                include '../geral/header.php';
                ?>
        </div>
        <div class=" row center-xs middle-xs">
            <div class="add-card">
            <div class="col-xs-12">
            <form action="admin_add.php" method="POST" id="formAdd" enctype='multipart/form-data'>
                <div class="row middle-xs">
                    <div class="col-xs-12">
                        <input name="title" type="text" placeholder="Book Title" required/>
                    </div>
                </div>
                <div class="row middle-xs ">
                    <div class="col-xs-12">
                        <input name="author" type="text" placeholder="Author" required/>
                    </div>
                </div>
                <div class="row middle-xs">
                    <div class="col-xs-12">
                        <input name="publisher" type="text" placeholder="Publishing Company" required/>
                    </div>
                </div>
                <div class="row middle-xs ">
                    <div class="col-xs-12">
                        <input name="date" type="date" placeholder="Date" required/>
                    </div>
                </div>
                <div class="row middle-xs">
                    <div class="col-xs-12">
                        <input name="price" type="number" placeholder="Price" required/>
                    </div>
                </div>
                <div class="row middle-xs">
                    <div class="col-xs-12">
                        <textarea required name="description" placeholder="Write book details..."></textarea>
                    </div>
                </div>
                <div class="row middle-xs">
                    <div class="col-xs-3">
<!--                    <div class="upload-btn-wrapper">-->
<!--                        <button class="btn">Upload the cover</button>-->
                            <input type="file" accept="image/png, image/jpeg" name="myCover" required/>
                        <!--</div>-->
                         </div>
                         <div class="col-xs-3">
                             <!--<div class="upload-btn-wrapper">-->
                                 <!--<button class="btn">Upload the text file</button>-->
                                 <input type="file" accept=".pdf" name="myText" required/>
                             <!--</div>-->
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