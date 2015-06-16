   <?php include 'scripts/cities_select_list.php'; ?>

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

        <!--Connnection file php -->
        <?php include("common/connection.php"); ?>

        <!--CSS & JavaScript Code -->
        <?php include("common/code.php"); ?>

   		<script src="js/cities_ajax_select.js" type="text/javascript"></script>
   		<link rel="stylesheet" href="css/main.css" type="text/css">
	<script type="text/javascript" src="js/jquery-1.js"></script>

	<!-- JavaScriptCode for slider -->
	<script type="text/javascript" src="slider.js"></script>
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
                        <?php include("common/places_left.php");?>
							<div class="9u skel-cell-important">

								<!-- Main Content -->
								<section>
						<header>
							<h1><?php  $states = $_GET['state_name'];
							 $place=$_GET['place'];
							$city=$_GET['city'];?></h1>
						</header>
						<?php
						 $query="select * from manageplaces where states='".$states."' and city='".$city."' and place='".$place."'";
						$result=mysql_query($query);
						while($row=mysql_fetch_array($result)){
							$states = $row['states'];
							$city = $row['city'];
							$image = $row['image'];
							$place = $row['place'];
							$history = $row['history'];
							$distance = $row['distance'];
							$near_places = $row['near_places'];
						}
						?>
						<h1 class="hh"><?php echo $place; ?></h1>
						<h3>States : <?php echo $states; ?></h3>
						<h3>City : <?php echo $city; ?></h3>
						<h3> <img src="admin/news/<?php echo $image; ?>" width="50%" height="50%"></h3>
						<h3>History : <?php echo $history; ?></h3>
						<h3>Distance : <?php echo $distance; ?></h3>
						<h3>Nearest Places : <?php echo $near_places; ?></h3>
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
