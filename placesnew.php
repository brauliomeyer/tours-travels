<?php

// Connect to server and select databse.
session_start();

// Connect to server and select databse.
include("common/connection.php");
$state_name = $_GET['state_name'];
$city = $_GET['city'];

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
        <title><?php echo $state_name; ?></title>
        <meta name="keywords" content="<?php echo $SEO_keyword; ?>">
        <meta name="description" content="<?php $SEO_description ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- PHP Code -->
        <?php include 'scripts/cities_select_list.php'; ?>
		<?php include("common/code.php"); ?>

        <!-- CSS Code -->
        <link rel="stylesheet" href="css/main.css" type="text/css">

        <!-- JavaScript Code for slider -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/slider.php"></script>
		<script type="text/javascript" src="js/cities_ajax_select.js"></script>

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
                        <?php include("common/city_left.php"); ?>
                        <div class="9u skel-cell-important">

                            <!-- Main Content -->
                            <section>
                                <header>
                                    <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                    <h1 class="hh"><?php echo $state_name = $_GET['state_name']; ?></h1>
                                </header>
                                <?php
                                $query = "select * from managestates where state_name='" . $state_name . "'";
                                $result = mysql_query($query);
                                while ($row = mysql_fetch_array($result)) {
                                    $state_name = $row['state_name'];
                                    $image = $row['image'];
                                    $description = $row['detail'];
                                }
                                ?>
                                <p><img src="admin/news/<?php echo $image; ?>" width="400" height="300"></p>
                                <p><?php echo $description; ?></p>
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
