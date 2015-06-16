<?php
// Connect to server and select databse.
include("common/connection.php");
$place1 = $_GET['place'];

// Start up your PHP Session
session_start();

	// If the user is not logged in send him/her to the login form
	if (empty($_SESSION['username1'])) {
	  //header("location:login.php?state_name=$state_name&city=$city");
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
        <title><?php echo $place1; ?></title>
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
                                    <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                    <h1 class="hh">Gallery</h1>
                                </header>

                                <div id="content">
                                    <div id="thumbnails">
                                        <ul class="clearfix">

                                            <?php
                                            $query = "SELECT * FROM managegallery where place='" . $place1 . "'";

                                            $result1 = mysql_query($query);

                                            while ($row22 = mysql_fetch_array($result1)) {

                                                $id = $row22['id'];
                                                $image = $row22['image'];
                                                ?>
                                                <!-- source: http://dribbble.com/shots/1115721-Turntable -->
                                                <li><a href="admin/news/<?php echo $image; ?>" title="<?php echo $place1; ?>"><img src="admin/news/<?php echo $image; ?>" height="150" width="150" alt="turntable"></a></li>
                                            <?php
                                            }
                                            ?>
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
