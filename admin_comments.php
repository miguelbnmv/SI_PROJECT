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
    <link rel="stylesheet" href="assets/CSS/sidebar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<div id="mySidenav" class="sidenav w-color">
    <p class="sidebar_title"><strong>Hi</strong> Admin</p>
    <label class="check_container">Catalog
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
    </label>
    <label class="check_container">Statistics
        <input type="radio" name="radio">
        <span class="checkmark"></span>
    </label>
    <label class="check_container">Edit Account Settings
        <input type="radio" name="radio">
        <span class="checkmark"></span>
    </label>
    <div class="logout w-color">
        <a class="w-color" href="logout.php">Logout</a>
    </div>
</div>
<section class="main">
    <div class="main_header">
        <h1>comments</h1>
    </div>
    <?php
    include 'header.php';
    ?>
    <div class="main-container">
        <div class="create_comment">
            <form method="POST" id="formCreateComment">
                <p>Admin</p>
                <textarea name="comment"></textarea>
                <div class="delete">
                    <input type="image" src="assets/images/comment%20button.png" name="submit_comment" alt="Submit Comment" />
                </div>
            </form>
        </div>
        <div class="main_comments">
            <div class="comment">
                <div class="info">
                    <h3>Francisco Freitas</h3>
                    <p class="comment_date">11:30</p>
                </div>
                <div class="content">
                    Lorem ipsum dolor sit amet, nec tibique argumentum cu, at mei nulla soleat omnesque, his et simul quando iisque.
                    Est fugit tempor prodesset in, ad sumo noluisse moderatius duo.
                </div>
                <div class="delete">
                    <form method="POST" id="formCreateComment" >
                        <input type="image" src="assets/images/waste-bin.png" alt="Submit Form" />
                    </form>
                </div>
            </div>
            <div class="comment">
                <div class="info">
                    <h3>Francisco Freitas</h3>
                    <p class="comment_date">11:30</p>
                </div>
                <div class="content">
                    Lorem ipsum dolor sit amet, nec tibique argumentum cu, at mei nulla soleat omnesque, his et simul quando iisque.
                    Est fugit tempor prodesset in, ad sumo noluisse moderatius duo.
                </div>
                <div class="delete">
                    <form method="POST" id="formCreateComment" >
                        <input type="image" src="assets/images/waste-bin.png" name="delete_comment" alt="Delete Comment" />
                    </form>
                </div>
            </div>
           <!-- --><?php
/*            include 'server-connection.php';
            $rowResource = pg_query($connection, "SELECT * FROM comments WHERE book_id ='$BOOKID'");
            $rowCount = pg_fetch_result($rowResource, 0, 0);

            for ($i = 0; $i < $rowCount; $i++) {
                $COMMENT = pg_query($connection, "SELECT comment FROM comments");
                $ALLCOMMENTS[$i]= pg_fetch_result($COMMENT,$i,0);
                $CLIENTNAME = pg_query($connection, "SELECT client_id FROM comments");
                $ALLCLIENTNAMES[$i]= pg_fetch_result($CLIENTNAME,$i,0);
                $DATE = pg_query($connection, "SELECT date_comment FROM comments");
                $ALLDATES[$i]= pg_fetch_result($DATE,$i,0);
            }
            for ($i = 0; $i < $rowCount; $i++) {
                echo (" <div class=\"book\">
                        <div>
                            <p class=\"book_title\">$ALLCLIENTNAMES[$i]</p>
                            <p class=\"book_price\"> $ALLDATES[$i]$</p>
                        </div>
                        <div>
                            <p class=\"book_id\"> $ALLCOMMENTS[$i]</p>
                        </div>
                    </div>");



            }
            */?>
        </div>
    </div>


</section>
</body>
</html>
