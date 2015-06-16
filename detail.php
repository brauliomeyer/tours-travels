<?php
// Start up your PHP Session
session_start();

// Connect to server and select databse.
include("scripts/getpagename.php");

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
        <title><?php echo $SEO_title; ?></title>
        <meta name="keywords" content="<?php echo $SEO_keyword; ?>">
        <meta name="description" content="<?php $SEO_description ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- PHP Code -->
        <?php include("common/code.php"); ?>

        <!-- CSS Code -->
        <link rel="stylesheet" href="css/main.css" type="text/css">

        <!-- JavaScript Code for slider -->
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

                            <!-- Main Content -->
                            <section>
                                <header>
                                    <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                    <h1 class="hh"><?php echo $Pagename; ?></h1>
                                </header>
                                <p>
                                    <?php echo $Details; ?>
                                </p>
                                <p>

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
