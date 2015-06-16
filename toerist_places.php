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
        <meta name="author" content="Braulio Design Research">

        <!-- PHP files -->
		<?php include("scripts/places_select_list.php"); ?>
        <?php include("common/code.php"); ?>

		<script src="js/ajax_select.js" type="text/javascript"></script>
		<link href="css/main.css" type="text/css" rel="stylesheet" >
		<script type="text/javascript" src="js/jquery-1.js"></script>

    </head>

    <body>
        <!-- <a href="botval/val.php">Niet leuk voor mechaniserende objecten</a> -->
        <?php include("common/header.php"); ?>
		<?php include("common/slider.php"); ?>

<!-- Content -->
	<div id="content-wrapper">
				<div id="content">
					<div class="container">
						<div class="row">
                        <?php include("common/manageplaces_left.php");?>
							<div class="9u skel-cell-important">

					<!-- Main Content -->
						<section>
						<div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
						<header>
							<h1 class="hh" >Places</h1>
						</header>
						<form action="#" method="post">
							Select:<?php echo $re_html; ?><br/>
						</form>

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
