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
        <meta name="author" content="Braulio Design Research">

        <!-- PHP Code -->
        <?php include("common/code.php"); ?>

		<!-- CSS Code -->
        <link href="css/main.css" type="text/css" rel="stylesheet" >

        <!-- JavaScript Pics slider code -->
        <script type="text/javascript" src="js/slider.js"></script>
    </head>

    <body>
        <!-- <a href="botval/val.php">Niet leuk voor mechaniserende objecten</a>  -->
        <?php include("common/header.php"); ?>

        <!-- Pics slider PHP code -->
        <?php include("common/slider.php"); ?>
        <?php include("common/top.php"); ?>

        <!-- Content -->
        <div id="content-wrapper">
            <div id="content">
                <div class="container">
                    <div class="row">
                        <div class="4u">

                            <!-- Box #1 -->
                            <section>
                                <header>
                                    <h2>Who We Are</h2>
                                    <h3>A subheading about who we are</h3>
                                </header>
                                <a href="#" class="feature-image"><img src="images/pic05.jpg" alt="" /></a>
                                <p>
                                    Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed.
                                    Suspendisse eu varius nibh. Suspendisse vitae magna eget odio amet mollis
                                    justo facilisis quis. Sed sagittis mauris amet tellus gravida lorem ipsum.
                                </p>
                            </section>

                        </div>
                        <div class="4u">

                            <!-- Box #2 -->
                            <section>
                                <header>
                                    <h2>What We Do</h2>
                                    <h3>A subheading about what we do</h3>
                                </header>
                                <ul class="check-list">
                                    <li>Sed mattis quis rutrum accum</li>
                                    <li>Eu varius nibh suspendisse lorem</li>
                                    <li>Magna eget odio amet mollis justo</li>
                                    <li>Facilisis quis sagittis mauris</li>
                                    <li>Amet tellus gravida lorem ipsum</li>
                                </ul>
                            </section>

                        </div>
                        <div class="4u">

                            <!-- Box #3 -->
                            <section>
                                <header>
                                    <h2>What People Are Saying</h2>
                                    <h3>And a final subheading about our clients</h3>
                                </header>
                                <ul class="quote-list">
                                    <li>
                                        <img src="images/pic06.jpg" alt="" />
                                        <p>"Neque nisidapibus mattis"</p>
                                        <span>Jane Doe, CEO of UntitledCorp</span>
                                    </li>
                                    <li>
                                        <img src="images/pic07.jpg" alt="" />
                                        <p>"Lorem ipsum consequat!"</p>
                                        <span>John Doe, President of FakeBiz</span>
                                    </li>
                                    <li>
                                        <img src="images/pic08.jpg" alt="" />
                                        <p>"Magna veroeros amet tempus"</p>
                                        <span>Mary Smith, CFO of UntitledBiz</span>
                                    </li>
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include("common/footer.php"); ?>

        <!-- <a href="botval/val.php">Niet leuk voor mechaniserende objecten</a>  -->
    </body>
</html>
