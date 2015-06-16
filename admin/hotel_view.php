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
                                <a href="place_view.php">View Place</a>
                            </li>
                        </ul>
                    </div>

                    <?php
                    include("common/connection.php");
                    $id = $_GET['id'];
                    $query = "select * from managehotels where id = " . $id;
                    $result = mysql_query($query);

                    while ($row = mysql_fetch_array($result)) {
                        $id = $row['id'];
                        $state_name = $row['state_name'];
                        $city = $row['city'];
                        $hotel_name = $row['hotel_name'];
                        $hotel_type = $row['hotel_type'];
                        $hotel_range = $row['hotel_range'];
                        $facilities = $row['facilities'];
                        $food = $row['food'];
                        $oldimage = $row['image'];
                    }

                    if (isset($_POST['submit']) == "Update") {
                        $state_name = $_POST['state_name'];
                        $city = $_POST['city'];
                        $hotel_name = $_POST['hotel_name'];
                        $hotel_type = $_POST['hotel_type'];
                        $hotel_range = $_POST['hotel_range'];
                        $facilities = $_POST['facilities'];
                        $food = $_POST['food'];
                        $newimage = $_FILES['image']['name'];

                        if ($newimage == '') {

                            $query = "update managehotels set state_name='$state_name', city='$city', hotel_name='$hotel_name', hotel_type='$hotel_type', hotel_range='$hotel_range', facilities='$facilities', food='$food' where id=" . $id;
                        } else {

                            move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                            $query = "update managehotels set state_name='$state_name', city='$city', hotel_name='$hotel_name', hotel_type='$hotel_type', hotel_range='$hotel_range', facilities='$facilities', food='$food' where id=" . $id;
                        }

                        $result = mysql_query($query);

                        if ($result == '1') {
                            header('location:hotel_listing.php');
                        } else {
                            echo "Error data not changed";
                        }
                    }
                    ?>

                    <!-- Begin form -->
                    <form action="" method="post" name="formOne" enctype="multipart/form-data">
                        <table width="100%">
                            <tr bgcolor="#f78938">
                                <td><label>State</label></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>State</label><p><?php echo $state_name; ?></p>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>City</label><p><?php echo $city; ?></p>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>Name</label><p><?php echo $hotel_name; ?></p>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>Type</label><p><?php echo $hotel_type; ?></p>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>Hotel_range</label><p><?php echo $hotel_range; ?></p>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>Facilities</label><p><?php echo $facilities; ?></p>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>Food</label><p><?php echo $food; ?></p>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Image</label><br/>
                                    <img src="news/<?php echo $oldimage; ?>" width="50%" height="50%">
                                    <input name="image" type="file">
                                </td>
                            </tr>
                            <tr bgcolor="#f78938">
                                <td>
                                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>
                                    <input name="submit" type="submit" value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <!-- End form -->


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
