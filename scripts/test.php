<?php
// Start up your PHP Session
session_start();

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES") {
    //header("Location:login.php");
}

// Connect to server and select databse.
include("common/connection.php");
$pagename = $_GET['pagename'];
$query = "SELECT * FROM managecontents where Pagename='" . $pagename . "'";

$result = mysql_query($query);
while ($row = mysql_fetch_array($result)) {
    $Pagename = $row['Pagename'];
    $SEO_title = $row['SEO_title'];
    $SEO_keyword = $row['SEO_keyword'];
    $SEO_description = $row['SEO_description'];
    $Details = $row['Details'];
    $Content = $row['Content'];
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
        <title><?php echo $SEO_title; ?></title>
        <meta name="keywords" content="<?php echo $SEO_keyword; ?>">
        <meta name="description" content="<?php $SEO_description ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--PHP Code -->
        <?php include("common/code.php"); ?>

		<!-- CSS Code -->
        <link href="css/main.css" type="text/css" rel="stylesheet" >

		<!-- JS Code -->
        <script src="js/jquery-1.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
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

                            <!-- Main Content -->
                            <section>
                                <header>
                                    <h1><?php echo $Pagename; ?></h1>
                                </header>
                                <p>
                                    <?php echo $Details; ?>
                                    <?php echo $Content; ?>
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
