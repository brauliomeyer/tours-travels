<?php
ob_start();
session_start();

// Connect to server and select databse.
include("common/connection.php");

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

                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                        enabled to use this site.</p>
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
                    <div> <!-- style="height:1200px"> -->

                        <div id="content-wrapper">
                            <div id="content">
                                <div class="">

                                    <!--	<h1 style="color:red">add content</h1>	-->
                                    <div id="envelope">

										<?php
										if(isset($_POST['submit'])=="Send") {
										$to = $_POST['email'];

										$name=$_POST['name'];
										$email =$_POST['email'];
										$hotel_name=$_POST['hotel_name'];
										$avaliability=$_POST['avaliability'];
										$contact_number=$_POST['contact_number'];
										$subject = "Regarding Contact us";

										 $mesg = 'Name'.$name. 'Email'.$email. 'Hotel Name'.$hotel_name. 'Avaliability'.$avaliability. 'Contact number'.$contact_number;


										 $headers = 'MIME-Version: 1.0' . "\r\n";
										 $headers .= 'Content-type: text/htmml; charset=iso-8859-1' . "\r\n";

										 $headers .='From: MyCompany<welcome@my.com>' . "\r\n";
										 $headers .='CC: abc<abc@abc.com>';

										 $message ="<table>
											 <tr>
												 <td>Dear $nameClient</td>
											 </tr>
											 <tr>
												 <td>$mesg</td>
											 </tr>
											 <tr>
												 <td>Warm regards</td>
											 </tr>
											 <tr>
												 <td>$name</td>
											 </tr>
										 </table>";

										 $mail = mail($to,$subject,$message,$headers);

										 if ($mail == '1') {
											 ?>
											 <img src="img/Green_Thick.png" width="40" height="40">
											 <?php
											 echo "<h5 class='green'> Successfully Send!!! </h5>";
											 header('location:state_listing.php');
										 } else {
											 ?>
											 <img src="img/Red_Cross.png" width="40" height="40">
											 <?php
											 header('location:state_add.php');
											 echo "Send";
										 }


										}
										?>
                                        <form name ="addContent" onsubmit="return validateForm();" method="post" enctype="multipart/form-data">
                                            <header>
                                                <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                                <h1 style="color:red;">Send confirmation booking</h1>
                                            </header>

                                                <label><h4>Name</h4></label>
                                                <input type="text" name="name" width="100px;" value="<?php echo $_GET['name']; ?>" readonly>

                                                <label><h4>Email</h4></label>
                                                <input type="text" name="email" width="100px;"  value="<?php echo $_GET['email']; ?>" readonly>

                                                <label><h4>Hotel</h4></label>
                                                <input type="text" name="hotel_name" width="100px;"  value="<?php echo $_GET['hotel_name']; ?>" readonly>

                                                <label><h4>Avaliability</h4></label>
                                                <select name="avaliability">
                                                    <option value="Avaliable">Avaliable</option>
                                                    <option value="Not Avaliable">Not Avaliable</option>
                                                </select>

                                                <label><h4>Phone</h4></label>
                                                <input type="text" name="contact_number" value="<?php echo $_GET['contact_number']; ?>" readonly>
												  <?php
                                                        $hotel_name = $_GET['hotel_name'];
                                                        $query1 ="SELECT DISTINCT hotel_range FROM managehotels where hotel_name='".$hotel_name."'";
                                                        $result1 = mysql_query($query1);
                                                    ?>

                                                    <label><h4>Price</h4></label>
                                                    <select name="hotel_range" required readonly>
                                                    <option value="-1">Please select range</option>

                                                        <?php
                                                            while ($row1 = mysql_fetch_array($result1)) {
                                                            $hotel_range = $row1['hotel_range'];
                                                        ?>
                                                            <option value="<?php echo $hotel_range; ?>"><?php echo $hotel_range; ?></option>
                                                        <?php } ?>
                                                    </select></td>

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
