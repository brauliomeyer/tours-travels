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

        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/datepicker.js"></script>

        <script type="text/javascript">
//<![CDATA[

            /*
             A "Reservation Date" example using two datePickers
             --------------------------------------------------

             * Functionality

             1. When the page loads:
             - We clear the value of the two inputs (to clear any values cached by the browser)
             - We set an "onchange" event handler on the startDate input to call the setReservationDates function
             2. When a start date is selected
             - We set the low range of the endDate datePicker to be the start date the user has just selected
             - If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

             * Caveats (aren't there always)

             - This demo has been written for dates that have NOT been split across three inputs

             */

            function makeTwoChars(inp) {
                return String(inp).length < 2 ? "0" + inp : inp;
            }

            function initialiseInputs() {
// Clear any old values from the inputs (that might be cached by the browser after a page reload)
                document.getElementById("sd").value = "";
                document.getElementById("ed").value = "";

// Add the onchange event handler to the start date input
                datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
            }

            var initAttempts = 0;

            function setReservationDates(e) {
// Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
// until they become available (a maximum of ten times in case something has gone horribly wrong)

                try {
                    var sd = datePickerController.getDatePicker("sd");
                    var ed = datePickerController.getDatePicker("ed");
                } catch (err) {
                    if (initAttempts++ < 10)
                        setTimeout("setReservationDates()", 50);
                    return;
                }

// Check the value of the input is a date of the correct format
                var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

// If the input's value cannot be parsed as a valid date then return
                if (dt == 0)
                    return;

// At this stage we have a valid YYYYMMDD date

// Grab the value set within the endDate input and parse it using the dateFormat method
// N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
                var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

// Set the low range of the second datePicker to be the date parsed from the first
                ed.setRangeLow(dt);

// If theres a value already present within the end date input and it's smaller than the start date
// then clear the end date value
                if (edv < dt) {
                    document.getElementById("ed").value = "";
                }
            }

            function removeInputEvents() {
// Remove the onchange event handler set within the function initialiseInputs
                datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
            }

            datePickerController.addEvent(window, 'load', initialiseInputs);
            datePickerController.addEvent(window, 'unload', removeInputEvents);

//]]>
        </script>
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
        </script>

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
                                <a href="news_listing.php">Listing news</a>
                            </li>
                        </ul>
                    </div>

                    <?php
                    include("common/connection.php");
                    $id = $_GET['id'];
                    $query = "select * from managenews where id = " . $id;
                    $result = mysql_query($query);

                    while ($row = mysql_fetch_array($result)) {
                        $id = $row['id'];
                        $category = $row['category'];
                        $title = $row['title'];
                        $date = $row['date'];
                        $detail = $row['detail'];
                        $oldimage = $row['image'];
                    }

                    if (isset($_POST['submit']) == "Update") {
                        $category = $_POST['category'];
                        $title = $_POST['title'];
                        $date = $_POST['date'];
                        $detail = $_POST['detail'];
                        $newimage = $_FILES['image']['name'];

                        if ($newimage == '') {

                            //$query = "update managenews set category = '$category', title = '$title',
                            //date = '$date', detail = '$detail', image = '$oldimage' where id = " . $id;
                            $query = "update managenews set category = '$category', title = '$title', date = '$date', detail = '$detail',  image ='$image' where id=" . $id;
                        } else {

                            move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                            //$query = "update managenews set category = '$category', title = '$title',
                            //date = '$date', detail = '$detail', image = '$newimage' where id = " . $id;
                            $query = "update managenews set category = '$category', title = '$title', date = '$date', detail = '$detail',  image ='$image' where id=" . $id;
                        }

                        $result = mysql_query($query);

                        if ($result == '1') {
                            header('location:news_listing.php');
                        } else {
                            echo "Error data not changed";
                        }
                    }
                    ?>

                    <!-- Begin form -->
                    <form action="" method="post" name="formOne" enctype="multipart/form-data">
                        <table width="100%">
                            <tr bgcolor="#f78938">
                                <td colspan="2"><label>Update content news:</label></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Category:</label></td>
                                <td><input name="category" type="text" value="<?php echo $category; ?>" placeholder="Enter Category!" /></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Title:</label</td>
                                <td><input name="title" type="text" value="<?php echo $title; ?>"  placeholder="Enter news heading!" /></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Publishing date:</label</td>
                                <td>
                                        <!-- <input name="date" type="text" value="<?php echo $date; ?>"  placeholder="Enter publishing date!" /> -->
                                    <input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="date" id="sd" value="" maxlength="10" readonly="readonly" />
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Detail:</label</td>
                                                         <!-- <input name="detail" type="text" value="<?php echo $detail; ?>"  placeholder="Enter news detail!" /> -->
                                <td><?php
                                    include('fckeditor/fckeditor.php');
                                    $FCKeditor = new FCKeditor('detail');
                                    $FCKeditor->BasePath = 'fckeditor/';
                                    $FCKeditor->Value = $detail;
                                    $FCKeditor->Create();
                                    ?>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Image:</label><img src="news/<?php echo $oldimage; ?>" width="100"height="100"></td>
                                <td>

                                    <input name="image" type="file">
                                </td>
                            </tr>
                            <tr bgcolor="#f78938">
                                <td><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></td>
                                <td ><input name="submit" type="submit" value="Update" /></td>
                            </tr>
                        </table>
                    </form>
                    <!-- End form -->


                    <!-- content ends -->
                </div><!--/#content.col-md-0-->
            </div><!--/fluid-row-->

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
