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
                    $id_places = $_GET['id_places'];
                    $query = "select * from manageplaces where id_places = " . $id_places;
                    $result = mysql_query($query);

                    while ($row = mysql_fetch_array($result)) {
                        $id_places = $row['id_places'];
                        $states = $row['states'];
                        $city = $row['city'];
                        $place = $row['place'];
                        $history = $row['history'];
                        $distance = $row['distance'];
                        $near_places = $row['near_places'];
                        $oldimage = $row['image'];
                    }

                    if (isset($_POST['submit']) == "Update") {
                        $states = $_POST['states'];
                        $city = $_POST['city'];
                        $place = $_POST['place'];
                        $history = $_POST['history'];
                        $distance = $_POST['distance'];
                        $near_places = $_POST['near_places'];
                        $newimage = $_FILES['image']['name'];

                        if ($newimage == '') {

                            $query = "update manageplaces set states='$states', city='$city', place='$place', history='$history', distance='$distance', distance='$distance', near_places='$near_places' where id_places=" . $id_places;
                        } else {

                            move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                            $query = "update manageplaces set states='$states', city='$city', place='$place', history='$history', distance='$distance', distance='$distance', near_places='$near_places' where id_places=" . $id_places;
                        }

                        $result = mysql_query($query);

                        if ($result == '1') {
                            header('location:place_listing.php');
                        } else {
                            echo "Error data not changed";
                        }
                    }
                    ?>

                    <!-- Begin form -->
                    <form action="" method="post" name="formOne" enctype="multipart/form-data">
                        <table width="100%">
                            <tr bgcolor="#f78938">
                                <td><label>View Place</label></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>State</label><p><?php echo $states; ?></p>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>City</label><p><?php echo $city; ?></p>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>Place</label><p><?php echo $place; ?></p>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>History</label><p><?php echo $history; ?></p>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>Distance</label><p><?php echo $distance; ?></p>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td>
                                    <label>Near places</label><p><?php echo $near_places; ?></p>
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
