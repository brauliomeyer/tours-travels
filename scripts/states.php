
<?php
// Start up your PHP Session
session_start();

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES") {
    //header("Location:login.php");
}

// Connect to server and select databse.
include("common/connection.php");
$state_name = $_GET['state_name'];
$query = "SELECT * FROM managecities where states='" . $state_name . "'";

$result1 = mysql_query($query);
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

        <!--CSS & JavaScript Code -->
        <?php include("common/code.php"); ?>
        <script>
            function showUser(str) {
                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "js/getuser.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>

    </head>

    <body>
        <!-- <a href="botval/val.php">Niet leuk voor mechaniserende objecten</a>  -->
        <?php include("common/header.php"); ?>


        <div id="banner">
            <div class="container">
                <div class="row">
                    <div class="6u">

                        <!-- Banner Copy -->
                        <p>We do something really useful, important, and unique. Learn all about it here ...</p>
                        <a href="#" class="button-big">Go on, click me!</a>

                    </div>
                    <div class="6u">

                        <!-- Banner Image -->
                        <a href="#" class="bordered-feature-image"><img src="images/banner.jpg" alt="" /></a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div id="content-wrapper">
        <div id="content">
            <div class="container">
                <div class="row">
                    <?php include("common/states_left.php"); ?>
                    <div class="9u skel-cell-important">
                        <?php
                        while ($row1 = mysql_fetch_array($result1)) {
                            $city = $row1['city'];
                            $image = $row1['image'];
                            ?>
                            <!-- Main Content -->
                            <section id="sectionNew">
                                <div>
                                    <header>
                                        <h1><a href="toerist_places.php?city=<?php echo $city; ?>"><?php echo $city ?></a></h1>
                                    </header>
                                    <p>
                                        <a href="#" mouseover="showUser(this.value)"><img src="admin/news/<?php echo $image; ?>" width="100"height="100"></a>
                                    <div id="txtHint"></div>
                                    </p>
                                </div>

                            </section>
                        <?php } ?>
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
