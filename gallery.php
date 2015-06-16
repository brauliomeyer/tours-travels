<?php
// Connect to server and select databse.
include("scripts/getpagename.php");

// Start up your PHP Session
session_start();

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

        <!--CSS & JavaScript Code -->
        <?php include("common/code.php"); ?>

        <!--AJAX - JavaScript Code -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery_002.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>

        <!--CSS Code -->
        <link rel="stylesheet" type="text/css" media="all" href="css/stylesgallery.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/jquery.css">
    </head>

    <body>
        <!-- <a href="botval/val.php">Niet leuk voor mechaniserende objecten</a>  -->
        <?php include("common/header.php"); ?>

        <!-- Content -->
        <div id="content-wrapper">
            <div id="content">
                <div class="container">
                    <div class="row">
                        <?php include("common/gallery_left.php"); ?>
                        <div class="9u skel-cell-important">
                            <!-- Main Content -->
                            <section>
                                <header>
                                    <div style="text-align:right;"><a href="#">Back</a></div>
                                    <h1 class="hh">Gallery</h1>
                                </header>

                                <div id="content">
                                    <div id="thumbnails">
                                        <ul class="clearfix">
                                            <li><a href="images/portfolio1.jpg" title="Turntable by Jens Kappelmann"><img src="images/thumb1.jpg" alt="turntable"></a></li>
                                            <li><a href="images/portfolio2.jpg" title="Turntable by Jens Kappelmann"><img src="images/thumb2.jpg" alt="turntable"></a></li>
                                            <li><a href="images/portfolio3.jpg" title="Turntable by Jens Kappelmann"><img src="images/thumb3.jpg" alt="turntable"></a></li>
                                            <li><a href="images/portfolio4.jpg" title="Turntable by Jens Kappelmann"><img src="images/thumb4.jpg" alt="turntable"></a></li>
                                            <li><a href="images/portfolio5.jpg" title="Turntable by Jens Kappelmann"><img src="images/thumb5.jpg" alt="turntable"></a></li>
                                            <li><a href="images/portfolio6.jpg" title="Turntable by Jens Kappelmann"><img src="images/thumb6.jpg" alt="turntable"></a></li>
                                            <li><a href="images/portfolio7.jpg" title="Turntable by Jens Kappelmann"><img src="images/thumb7.jpg" alt="turntable"></a></li>
                                            <li><a href="images/portfolio8.jpg" title="Turntable by Jens Kappelmann"><img src="images/thumb8.jpg" alt="turntable"></a></li>
                                            <li><a href="images/portfolio9.jpg" title="Turntable by Jens Kappelmann"><img src="images/thumb9.jpg" alt="turntable"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#thumbnails a').lightBox();
                                    });
                                </script>
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
