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
                                <a href="place_listing.php">Listing places</a>
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
                                <td colspan="2"><label>Update Place:</label></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>State:</label></td>
                                <td><input name="states" type="text" value="<?php echo $states; ?>" /></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>City:</label</td>
                                <td><input name="city" type="text" value="<?php echo $city; ?>"  /></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Place:</label</td>
                                <td><input name="place" type="text" value="<?php echo $place; ?>"  /><br/></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>History:</label>
                                <!-- <td><input name="history" type="text" value="<?php echo $history; ?>"  /></td> -->
                                <td><?php
                                    include('fckeditor/fckeditor.php');
                                    $FCKeditor = new FCKeditor('history');
                                    $FCKeditor->BasePath = 'fckeditor/';
                                    $FCKeditor->Value = $history;
                                    $FCKeditor->Create();
                                    ?>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Distance:</label><?php echo $distance; ?> </td>
                                <!-- <td><input name="distance" type="text" value="<?php echo $distance; ?>"  /></td> -->
                                <td><?php
                                    include('fckeditor/fckeditor.php');
                                    $FCKeditor = new FCKeditor('distance');
                                    $FCKeditor->BasePath = 'fckeditor/';
                                    $FCKeditor->Value = $distance;
                                    $FCKeditor->Create();
                                    ?>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Near places:</label><?php echo $near_places; ?></td>
                                <!-- <td><input name="near_places" type="text" value="<?php echo $near_places; ?>"  /></td> -->
                                <td><?php
                                    include('fckeditor/fckeditor.php');
                                    $FCKeditor = new FCKeditor('near_places');
                                    $FCKeditor->BasePath = 'fckeditor/';
                                    $FCKeditor->Value = $near_places;
                                    $FCKeditor->Create();
                                    ?>
                                </td>
                            </tr>

                            <tr bgcolor="#249fe6">
                                <td><label>Image:</label></td>
                                <td>
                                    <img src="news/<?php echo $oldimage; ?>" width="100"height="100">
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

            <!-- Start footer area -->
            <?php include("common/footer.php"); ?>
            <!-- End footer area -->

        </div><!--/.fluid-container-->

        <!-- external javascript -->
        <?php include("common/javascript_code.php"); ?>

    </body>
</html>
<?php ob_flush(); ?>
