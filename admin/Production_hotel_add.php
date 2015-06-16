<?php
ob_start();
session_start();

// Connect to server and select databse.
include("common/connection.php");
//$state_name = $_GET['state_name'];
//$city = $_GET['city'];
// If the user is not logged in send him/her to the login form
if (empty($_SESSION['username'])) {
    //header("location:login.php?state_name=$state_name&city=$city");
    header("location:index.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tours & Travels</title>
        <?php include("common/code.php"); ?>
        <?php include("common/css_code.php"); ?>

        <link href="css/color_text.css" rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/datepicker.js"></script>

        <!-- The fav icon -->
        <link rel="shortcut icon" href="img/favicon.ico">

    </head>

    <body>
        <!-- topbar starts -->
        <?php
        include("common/header.php");
        ?>
        <!-- topbar ends -->
        <div class="ch-container">
            <div class="row">

                <!-- left menu starts -->
                <?php
                include("common/left.php");
                ?>
                <!--/span-->
                <!-- left menu ends -->

                <noscript>
                <div class="alert alert-block col-md-12">
                    <h4 class="alert-heading">Warning!</h4>

                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>enabled to use this site.</p>
                </div>
                </noscript>

                <div id="content" class="col-lg-10 col-sm-10">
                    <!-- content starts -->
                    <div>
                        <ul class="breadcrumb">
                            <li>
                                <a href="welcome.php">Home</a>
                            </li>
                            <li>
                                <a href="booking_add.php">Add booking</a>
                            </li>
                        </ul>

                    </div>
                    <div> 
                        <div id="content-wrapper">
                            <div id="content">
                                <div class="">

                                    <!--	<h1 style="color:red">add content</h1>	-->
                                    <div id="envelope">
                                        <?php
                                        if (isset($_POST['submit']) == "Send") {
                                            include('common/connection.php');
                                            $name = $_POST['name'];
                                            $email = $_POST['email'];
                                            $avaliability = $_POST['avaliability'];
                                            $hotels = $_POST['hotelname'];
                                            $price = $_POST['price'];
                                            $message = 'Name ' . $name . ' Email  ' . $email . 'Avaliability  ' . $avaliability . 'Hotel Name ' . $hotels . 'Price ' . $price;
                                            mail($email, $subject, $message);
                                        }
                                        ?>

                                        <form name ="addContent" onsubmit="return validateForm();" method="get" enctype="multipart/form-data">
                                            <header>
                                                <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                                <h1 style="color:red;">Add Booking</h1>
                                            </header>

                                            <label>NAME</label>
                                            <input type="text" name="name" width="100px;" value="<?php echo $_GET['name']; ?>" readonly>

                                            <label>Email </label>
                                            <input type="text" name="email" width="100px;"  value="<?php echo $_GET['email']; ?>" readonly>

                                            <label> Hotel  Name </label>
                                            <input type="text" name="hotelname" width="100px;"  value="<?php echo $_GET['hotelname']; ?>" readonly>

                                            <label> Avaliability</label>
                                            <select name="avaliability">
                                                <option value="Avaliable">Avaliable</option>
                                                <option value="Not Avaliable">Not Avaliable</option>
                                            </select>

                                            <label> Price: </label>
                                            <input type="text" name="price" width="100px;"  >

                                            <input type="submit" name="submit" value="Send">

                                            <br/><br/><br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- content part starts here  -->

                        <!-- content part ends here -->
                    </div>
                    <?php
                    include("common/footer.php")
                    ?>

                </div><!--/.fluid-container-->

                <!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>
</body>
</html>
<?php ob_flush(); ?>
