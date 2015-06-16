<?php
ob_start();
// Connect to server and select databse.
session_start();

// Connect to server and select databse.
include("common/connection.php");
$state_name = $_GET['state_name'];
$city = $_GET['city'];

	// If the user is not logged in send him/her to the login form
	if (empty($_SESSION['username1'])) {
	  header("location:login.php?state_name=$state_name&city=$city");
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
        <title><?php echo $state_nameNew; ?></title>
        <meta name="keywords" content="<?php echo $SEO_keyword; ?>">
        <meta name="description" content="<?php $SEO_description ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--PHP Code -->
        <?php include("common/code.php"); ?>
        <?php include("scripts/cities_select_list.php"); ?>

        <!-- CSS Code -->
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <link href="css/color_text.css" rel="stylesheet" type="text/css">
        <link href="css/datepicker.css" rel="stylesheet" type="text/css">

        <!-- JavaScript -->
        <script type="text/javascript" src="js/slider.js"></script>
        <script type="text/javascript" src="js/toggle.js"></script>
        <script type="text/javascript" src="js/cities_ajax_select.js"></script>
        <script type="text/javascript" src="js/validateForm.js"></script>
        <script type="text/javascript" src="js/datepicker.js"></script>
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


                        <?php include("common/places_left.php"); ?>

                        <div class="9u skel-cell-important">

                            <!-- Main Content -->
                            <section>
                                <header>
                                    <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                    <h1 class="hh">
										<?php
										$state_name = $_GET['state_name'];
				                        echo $city = $_GET['city'];
                        ?></h1>
                                </header>
                                <?php
                                $query = "select * from managecities where states='" . $state_name . "' and city='" . $city . "'";
                                $result = mysql_query($query);

                                while ($row = mysql_fetch_array($result)) {
                                    $state_name = $row['state_name'];
                                    $city = $row['city'];
                                    $image = $row['image'];
                                    $description = $row['description'];
                                }
                                ?>
                                <p><img src="admin/news/<?php echo $image; ?>" width="400" height="300"></p>
                                <p><?php echo $description; ?></p>


                <?php
                // Connect to server and select databse
                include("common/connection.php");
                $state_name = $_GET['state_name'];           // 2xstate_name
                $city = $_GET['city'];
                $query2 = "SELECT * FROM managehotels where state_name='" . $state_name . "' and city='" . $city . "'"; // 1xstate_name
                $result2 = mysql_query($query2);
				$row2 = mysql_fetch_array($result2);

                ?>
                    <div><h3>
                            <a href="booking.php?state_name=<?php echo $state_name; ?>&city=<?php echo $city;?>">Book</a></h3></div>
                                </div>
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
<?php ob_flush(); ?>
