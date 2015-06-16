<!DOCTYPE HTML>
<!--
        Halcyonic 3.1 by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title><?php echo $SEO_title; ?></title>
		<meta charset="utf-8">

        <!--CSS & JavaScript Code -->
        <?php include("common/code.php"); ?>

        <script type="text/javascript" src="js/cities_ajax_select.js" ></script>
        <script type="text/javascript" src="js/datepicker.js"></script>

        <link href="css/main.css" rel="stylesheet" type="text/css" >
        <link href="css/color_text.css" rel="stylesheet" type="text/css">
        <link href="css/datepicker.css" rel="stylesheet" type="text/css">

        <!-- JavaScript Code for slider -->
        <script type="text/javascript" src="js/slider.js"></script>

        <script type="text/javascript">
            function validateForm()
            {
                var x = document.forms["index"]["date"].value;
                if (x == null || x == "")
                {
                    alert("you must enter your check in Date(click the calendar icon)");
                    return false;
                }
                var y = document.forms["index"]["end"].value;
                if (y == null || y == "")
                {
                    alert("you must enter your check out Date(click the calendar icon)");
                    return false;
                }
            }
        </script>
        <script type="text/javascript">
            window.history.forward();
            function noBack()
            {
                window.history.forward();
            }

            function validateForm() {
                if (document.addContent.category.value == "")
                {
                    alert("Please enter category!");
                    document.addContent.category.focus();
                    return false;
                }
                if (document.addContent.title.value == "")
                {
                    alert("Please enter title!");
                    document.addContent.title.focus();
                    return false;
                }
                if (document.addContent.date.value == "")
                {
                    alert("Please enter date!");
                    document.addContent.date.focus();
                    return false;
                }
                if (document.addContent.detail.value == "")
                {
                    alert("Please enter detail!");
                    document.addContent.detail.focus();
                    return false;
                }
                return(true);
            }
        </script>


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
                                <?php
                                // Connect to server and select databse.
                                include("common/connection.php");
                                $city = $_GET['city'];
                                $query = "SELECT * FROM managecities where city='" . $city . "'";

                                $result11 = mysql_query($query) or die(mysql_error());


                                if (isset($_POST['submit']) == "Book") {

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
                                        <img src="img/Green_Tick.png" width="40" height="40">
                                        <?php
                                        echo "<h5 class='green'> Successfully added!!! </h5>";
										header('location:login.php');
                                    } else {
                                        ?>
                                        <img src="img/Red_Cross.png" width="40" height="40">
                                        <?php
                                        echo "<h5 class='red'> Not added!!! </h5>";
										header('location:toerist_places.php?pagename=Place');
                                    }
                                }



                         while ($row11 = mysql_fetch_array($result11)) {
                                    $city = $row11['city'];
                                    $states = $row11['states'];
                                    ?>

                                    <!-- put data here -->
                                    <form name="addContent" onsubmit="validateForm();" action="#" method="post" enctype="multipart/form-data">
                                        <table  cellspacing="5" cellpadding="5" border="1" align="center">
                                            <tr>
                                            <table border="1" align="center" cellpadding="5">
                                                <h3 class="hh" style="color:white;"> BOOK NOW !!!!</h3>
                                                <tr>
                                                    <td> States</td>
                                                    <td><input type="text" name="state_name" value="<?php echo $_GET['state_name']; ?>" readonly ></td>
                                                </tr>
                                                <tr>
                                                    <td>city:</td>
                                                    <td><input type="text" name="city" value="<?php echo $_GET['city']; ?>" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td> Hotel:</td>
                                                    <td><input type="text" name="hotel_name" value="<?php echo $_GET['hotel_name']; ?>" ></td>
                                                </tr>
                                                <tr>
                                                    <td>No of adults</td>
                                                    <td><select name="no_of_adults" >
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
                                                    <td> No of childs </td>
                                                    <td><select name="no_of_childs">
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
                                                    <td> Start Date </td>
                                                    <td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="start_date" id="sd" maxlength="10" readonly="readonly"></td>
                                                </tr>

                                                <tr>
                                                    <td> End Date</td>
                                                    <td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="end_date" id="ed" maxlength="10" readonly="readonly"></td>
                                                </tr>

                                                <tr>
                                                    <td> </td>
                                                    <td><input type="submit" name="submit" value="Book"></td>
                                                </tr>
                                            </table>
                                            </tr>
                                        </table>
                                    </form>

                                    <!-- data ends here     -->
                                </section>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php include("common/footer.php"); ?>
    </body>
</html>
