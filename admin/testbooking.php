<?php
ob_start();
session_start();

// Connect to server and select databse.
include("common/connection.php");

// If the user is not logged in send him/her to the login form
if (empty($_SESSION['username'])) {

    header("location:index.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tours & Travels</title>
        <?php
        //include("common/connection.php");
        include("common/code.php");
        include("common/css_code.php");
        ?>
        <link href="css/datepicker.css" type="text/css" rel="stylesheet" >
        <link href="css/color_text.css" rel="stylesheet" type="text/css" />
        <script src="js/datepicker.js" type="text/javascript" ></script>
<style>
#New { border: 1px solid #7ac9b7; border-radius: 5px; margin-bottom: 20px; margin-top: 10px; padding: 15px; width: 100%;}
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
                                <a href="city_add.php">Add places</a>
                            </li>
                        </ul>
                    </div>

                    <div id="envelope">
                        <?php
                                    include("common/connection.php");
                                    $state_name = $_GET['state_name'];
                                    $city = $_GET['city'];

                                if (isset($_POST['submit']) == "submit") {

                                    $id = $_POST['id'];
                                    $state_name = $_POST['state_name'];
                                    $city = $_POST['city'];
                                    $hotel_name = $_POST['hotel_name'];
                                    $no_of_adults = $_POST['no_of_adults'];
                                    $no_of_childs = $_POST['no_of_childs'];
                                    $start_date = $_POST['start_date'];
                                    $end_date = $_POST['end_date'];
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $contact_number = $_POST['contact_number'];
                                    $address = $_POST['address'];

                                    $query1 = "select * from managebooking where id = '$id'";
                                    $result1 = mysql_query($query1);
                                    $numrows1 = mysql_num_rows($result1);

                                    if ($numrows1 > 0) {
                                        echo "<br/> Id already exists! ";
                                        exit();
                                    }

                                    echo $query2 = "insert into managebooking(state_name,city,hotel_name,no_of_adults,no_of_childs,start_date,end_date,name,email,contact_number,address) values('$state_name','$city','$hotel_name','$no_of_adults','$no_of_childs','$start_date','$end_date','$name','$email','$contact_number','$address')";
                                    echo $c2 = mysql_query($query2);

                                    if ($c2 == '1') {
                                        ?>
                                        //<img src="media/Green_Tick.png" width="40" height="40">
                                        <?php
                                        //echo "<h5 class='green'> Successfully added!!! </h5>";
                                        header('location:booking_listing.php');
                                    } else {
                                        ?>
                                        <img src="media/Red_Cross.png" width="40" height="40">
                                        <?php
                                        echo "<h5 class='red'> Not added!!! </h5>";
                                        header('location:booking_add.php');
                                    }
                                }
                                ?>

                                        <form name="addContent" onsubmit="validateForm()" method="post" enctype="multipart/form-data">
                                            <header>
                                                <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                                <h1 style="color:red;">Add Booking</h1>
                                            </header>

                                            <table width="60%" align="center" cellpadding="5">
                                                <tr>
                                                    <td><h4>State</h4></td>
                                                    <td><input name="state_name" id="state_name" type="text" value="<?php echo $state_name; ?>" readonly required></td>
                                                </tr>
                                                <tr>
                                                    <td><h4>City</h4></td>
                                                    <td><input name="city" id="city" type="text" value="<?php echo $city; ?>" readonly required></td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                        //$state_name = $_GET['state_name'];
                                                        $city = $_GET['city'];
                                                        $query1 ="SELECT DISTINCT hotel_name FROM managehotels where city='".$city."'";
                                                        //$query1 = "select * from managehotels";
                                                        $result1 = mysql_query($query1);
                                                    ?>

                                                    <td><h4>Hotels<h4></td>
                                                    <td><select name="hotel_name" required>
                                                        <option value="-1">Please select Hotel</option>

                                                        <?php
                                                            while ($row1 = mysql_fetch_array($result1)) {
                                                            $hotel_name = $row1['hotel_name'];
                                                        ?>
                                                            <option value="<?php echo $hotel_name; ?>"><?php echo $hotel_name; ?></option>
                                                        <?php } ?>
                                                    </select></td>
                                           </tr>
                                           <tr>
                                               <td><h4>No of adults<h4></td>
                                               <td><select name="no_of_adults" required>
                                                   <option value="-1">Please select Adults</option>
                                                   <option value="-">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                                </select>
                                               </td>
                                           </tr>
                                           <tr>
                                               <td><h4>No of childs<h4></td>
                                               <td><select name="no_of_childs" required>
                                                   <option value="-1">Please select childs</option>
                                                   <option value="0">0</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                </select>
                                               </td>
                                           </tr>
                                           <tr>
                                               <td><h4>Start Date<h4></td>
                                               <td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="start_date" id="sd" value="" maxlength="10" readonly required></td>
                                           </tr>
                                           <tr>
                                               <td><h4>End Date<h4></td>
                                               <td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="end_date" id="ed" value="" maxlength="10" readonly required></td>
                                           </tr>
                                           <tr>
                                               <td><h4>Name<h4></td>
                                               <td><input type="text" name="name" required></td>
                                           </tr>
                                            <tr>
                                               <td><h4 >Email<h4></td>
                                               <td><input id="New" type="email" name="email" title="Email (Format: something@something.com)" required></td>
                                            </tr>
                                            <tr>
                                               <td><h4>Address<h4></td>
                                               <td><textarea name="address" rows="5"></textarea></td>
                                            </tr>
                                            <tr>
                                               <td><h4>Phone<h4></td>
                                               <td><input id="New" name="contact_number" type="tel" pattern="\d{4}[\-]\d{2}[\-]\d{7}" title="Phone Number (Format: 0099-99-9999999)" required> </td>



                                            </tr>
                                            <tr>
                                               <td colspan="2"><input type="submit" name="submit" value="submit"></td>
                                            </tr>
                                        </table>


                    </div>

                    <!-- content ends -->
                </div><!--/#content.col-md-0-->
            </div><!--/fluid-row-->

            <div id="content-wrapper">
                <div id="content">
                    <div class="container">

                    </div>
                </div>
            </div>
            <!-- End form -->

            <!-- Start footer area -->
            <?php include("common/footer.php"); ?>
            <!-- End footer area -->

        </div><!--/.fluid-container-->

        <!-- external javascript -->
        <?php include("common/javascript_code.php"); ?>

    </body>
</html>
<?php ob_flush(); ?>
