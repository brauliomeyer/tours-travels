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
        <title><?php echo $state_name; ?></title>
        <meta name="keywords" content="<?php echo $SEO_keyword; ?>">
        <meta name="description" content="<?php $SEO_description ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--PHP Code -->
        <?php include("common/code.php"); ?>
        <?php include("scripts/cities_select_list.php"); ?>
        <?php include("scripts/php_form_validation.php"); ?>

        <!-- CSS Code -->
        <link href="css/main.css" type="text/css" rel="stylesheet" >
        <link href="css/color_text.css" type="text/css" rel="stylesheet" >
        <link href="css/datepicker.css" type="text/css" rel="stylesheet" >

        <!-- JavaScript -->
        <script src="js/slider.js" type="text/javascript" ></script>
        <script src="js/toggle.js" type="text/javascript" ></script>
        <script src="js/cities_ajax_select.js" type="text/javascript" ></script>
        <script src="js/validateForm.js" type="text/javascript" ></script>
        <script src="js/datepicker.js" type="text/javascript" ></script>
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
                                    <h1>
                                        <?php
                                        include("common/connection.php");
                                        $state_name = $_GET['state_name'];
                                        $hotel_name = $_GET['hotel_name'];
                                        $city = $_GET['city'];
                                        ?>
                                    </h1>
                                </header>
                                <?php
                                $query2 = "select * from managehotels where state_name='" . $state_name . "' and city='" . $city . "' and hotel_name='" . $hotel_name . "'";
                                $result2 = mysql_query($query2) or mysql_error();


                                if (isset($_POST['submit']) == "Submit") {

                                    $id = $_POST['id'];
                                    $state_name = $_POST['state_name'];
                                    $city = $_POST['city'];
                                    $hotel_name = $_POST['hotel_name'];
                                    $no_of_adults = $_POST['no_of_adults'];
                                    $no_of_childs = $_POST['no_of_childs'];
                                    $start_date = $_POST['start_date'];
                                    $end_date = $_POST['end_date'];
                                    $query = "select * from managebooking where id = '$id'";
                                    $result = mysql_query($query);
                                    $numrows = mysql_num_rows($result);

                                    if ($numrows > 0) {
                                        echo "<br/> Id already exists! ";
                                        exit();
                                    }

                                    $query = "insert into managebooking(state_name,city,hotel_name,no_of_adults,no_of_childs,start_date,end_date) values('$state_name','$city','$hotel_name','$no_of_adults','$no_of_childs','$start_date','$end_date')";
                                    $c = mysql_query($query);

                                    if ($c == '1') {
                                        ?>
                                        <img src="media/Green_Tick.png" width="40" height="40">
                                        <?php
                                        echo "<h5 class='green'> Successfully added!!! </h5>";
                                        header('location:login.php');
                                    } else {
                                        ?>
                                        <img src="media/Red_Cross.png" width="40" height="40">
                                        <?php
                                        echo "<h5 class='red'> Not added!!! </h5>";
                                        header('location:toerist_places.php?pagename=Place');
                                    }
                                }

                                while ($row2 = mysql_fetch_array($result2)) {
                                    $state_name = $row2['state_name'];
                                    $city = $row2['city'];
                                    $image1 = $row2['image'];
                                    $hotel_name = $row2['hotel_name'];
                                    $hotel_range = $row2['hotel_range'];
                                    $hotel_type = $row2['hotel_type'];
                                    $facilities = $row2['facilities'];
                                    $food = $row2['food'];
                                }
                                ?>
                                <h1 class="hh"><?php echo $hotel_name; ?></h1>
                                <h3>State: <?php echo $state_name; ?></h3>
                                <h3>City: <?php echo $city; ?></h3>
                                <h3> <img src="admin/news/<?php echo $image1; ?>" width="50%" height="50%"></h3>
                                <h3>Hotel range: <?php echo $hotel_range; ?></h3>
                                <h3>Facilities: <?php echo $facilities; ?></h3>
                                <h3>Type hotel: <?php echo $hotel_type; ?></h3>
                                <h3>Food: <?php echo $food; ?></h3>

                                <div id="formOne">
                                    <form style="display: none" name="addContent" onsubmit="validateForm()" method="post" enctype="multipart/form-data">
                                        <table  cellspacing="5" cellpadding="5" border="1" align="center">
                                            <tr>
                                            <table border="1" align="center" cellpadding="5">
                                                <h3 class="hh" style="color:white;"> BOOK NOW !!!!</h3>
                                                <tr>
                                                    <td>State:</td>
                                                    <td><input type="text" name="state_name" value="<?php echo $_GET['state_name']; ?>" readonly="readonly" required></td>
                                                </tr>
                                                <tr>
                                                    <td>City:</td>
                                                    <td><input type="text" name="city" value="<?php echo $_GET['city']; ?>" readonly="readonly" required></td>
                                                </tr>
                                                <tr>
                                                    <td>Hotel:</td>
                                                    <td><input type="text" name="hotel_name" value="<?php echo $_GET['hotel_name']; ?>" readonly="readonly" required></td>
                                                </tr>
                                                <tr>
                                                    <td>Guests - adults:</td>
                                                    <td><select name="no_of_adults" required autofocus>
                                                            <option value="-1">Please select Adults</option>
                                                            <option value="1">1</option>
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
                                                    <td>Guests - childs:</td>
                                                    <td><select name="no_of_childs" required autofocus>
                                                            <option value="-1">Please select childeren</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Check-In:</td>
                                                    <td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="start_date" id="sd" maxlength="10" readonly="readonly" autofocus required placeholder="Enter a valid date"></td>
                                                </tr>
                                                <tr>
                                                    <td>Check-Out:</td>
                                                    <td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="end_date" id="ed" maxlength="10" readonly="readonly" autofocus required placeholder="Enter a valid date"></td>
                                                </tr>
                                                <tr>
                                                    <td>Name:</td>
                                                    <td><input type="text" name="name" maxlength="30" required placeholder="Enter a valid name"></td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td><input type="email" name="email" maxlength="30" required placeholder="Enter a valid email"></td>
                                                </tr>
                                                <tr>
                                                    <td>Contact number:</td>
                                                    <td><input type="text" name="contact_number" maxlength="15" required placeholder="Enter a valid number"></td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td><input type="text" name="address" maxlength="50" required placeholder="Enter a valid address"></td>
                                                </tr>
                                                <tr>
                                                    <td>Booking</td>
                                                    <td><input type="text" name="booking" maxlength="25" required placeholder="Enter a valid booking"></td>
                                                </tr>
                                                <tr>
                                                    <td> </td>
                                                    <td><input type="submit" name="submit" value="Book"></td>
                                                </tr>
                                            </table>
                                            </tr>
                                        </table>
                                    </form>
                                    <button>Book form</button>
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
