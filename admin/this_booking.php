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

        <style>
            table {
                border-collapse: collapse;
            }

            .oddRow {
                background-color: #FFFFFF;
                font-size:16px;
                color:#101010;
            }
            .evenRow {
                background-color: #39a8e8;
                font-size:16px;
                color:#101010;
            }
            .evenRow:hover, .oddRow:hover {
                background-color: #ffef46;
                color: red;
            }
            .underline	{
                font-size:16px;
                color:#101010;
            }
        </style>

        <SCRIPT type="text/javascript">
            window.history.forward();
            function noBack()
            {
                window.history.forward();
            }
        </SCRIPT>
    </head>

    <body>
        <!-- topbar starts -->
        <?php include("common/header.php"); ?>
        <!-- topbar ends -->

        <div class="ch-container">

            <div class="row">
                <!-- left menu starts -->
                <?php include("common/left.php"); ?>
                <!--/span-->
                <!-- left menu ends -->

                <div id="content" class="col-lg-10 col-sm-10">
                    <!-- content starts -->
                    <div>
                        <ul class="breadcrumb">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="place_listing.php">Listing places</a>
                            </li>
                        </ul>
                    </div>

                    <div> <!-- style="height:1200px"> -->

                        <div id="content-wrapper">
                            <div id="content">
                                <div class="">

                                    <!--	<h1 style="color:red">add content</h1>	-->
                                    <div id="envelope">
                                        <?php
                                        if (isset($_POST['submit']) == "SEND") {
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
                                        <div id="envelope">


                                            <form action="" method="post">
                                                <header>
                                                    <h1 style="color:red">BOOKING INFO</h1>


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

                                                <input type="submit" value="SEND" name="submit">
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- content part ends here -->






                                <!-- content ends -->
                            </div><!--/#content.col-md-0-->
                        </div><!--/fluid-row-->

                        <!-- Start footer area -->
                        <?php include("common/footer.php"); ?>
                        <!-- End footer area -->

                    </div><!--/.fluid-container-->

                    <!-- external javascript -->
                    <?php include("common/javascript_code.php"); ?>

                    </body>
                    </html>
                    <?php ob_flush(); ?>
