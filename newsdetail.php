<?php
// Start up your PHP Session
session_start();

// If the user is not logged in send him/her to the login form
if (empty($_SESSION['username1'])) {
    //header("Location:login.php");
}
?>
<!DOCTYPE HTML>
<!--
    Halcyonic 3.1 by HTML5 UP
    html5up.net | @n33co
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Latest News</title>
        <meta name="keywords" content="<?php echo $SEO_keyword; ?>">
        <meta name="description" content="<?php $SEO_description ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--PHP Code -->
        <?php include("common/code.php"); ?>

        <!-- CSS Code -->
        <link rel="stylesheet" href="css/main.css" type="text/css">

        <!-- JavaScriptCode for slider -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/slider.js"></script>
    </head>

    <body>
        <!-- <a href="botval/val.php">Niet leuk voor mechaniserende objecten</a>  -->
        <?php include("common/header.php"); ?>
        <?php include("common/slider.php"); ?>

        <!-- Content -->
        <div id="content-wrapper">
            <div id="content">
                <div class="container">
                    <div class="row">
                        <?php include("common/left.php"); ?>
                        <div class="9u skel-cell-important">

                            <?php
// Connect to server and select databse.
                            include("common/connection.php");
                            $id = $_GET['id'];
                            $query = "SELECT * FROM managenews where id=" . $id;

                            $result = mysql_query($query);
                            while ($row = mysql_fetch_array($result)) {
                                $id = $rows['id'];
                                $titleNew = $row['title'];
                                $dateNew = $row['date'];
                                $detailNew = $row['detail'];
                                $imageNew = $row['image'];
                            }
                            ?>
                            <!-- Main Content -->
                            <section>
                                <header>
                                    <div><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                    <h1><?php echo $titleNew; ?></h1>
                                </header>
                                <p>
                                    <img height="250" width="650" src="admin/news/<?php echo $imageNew; ?>" style="border:12px solid #ccd1d5;  ">
                                    <br/>
                                    <?php echo $dateNew; ?>
                                    <br/>
                                    <?php echo $detailNew; ?>
                                </p>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <?php include("common/footer.php"); ?>

        <!-- <a href="botval/val.php">Niet leuk voor mechaniserende objecten</a>  -->
    </body>
</html>
