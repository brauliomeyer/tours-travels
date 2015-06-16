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
                                <a href="city_listing.php">Listing Cities</a>
                            </li>
                        </ul>
                    </div>

                    <?php
                    include("common/connection.php");
                    $id_cities = $_GET['id_cities'];
                    $query = "select * from managecities where id_cities = " . $id_cities;
                    $result = mysql_query($query);

                    while ($row = mysql_fetch_array($result)) {

                        $states = $row['states'];
                        $city = $row['city'];
                        $description = $row['description'];
                        $oldimage = $row['image'];
                    }

                    if (isset($_POST['submit']) == "Update") {
                        $states = $_POST['states'];
                        $city = $_POST['city'];
                        $description = $_POST['description'];
                        $newimage = $_FILES['image']['name'];

                        if ($newimage == '') {

                            $query = "update managecities set states = '$states', city = '$city', description = '$description', image = '$oldimage' where id_cities = " . $id_cities;
                        } else {

                            move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                            $query = "update managecities set states = '$states', city = '$city', description = '$description', image = '$newimage' where id_cities = " . $id_cities;
                        }

                        $result = mysql_query($query);

                        if ($result == '1') {
                            header('location:city_listing.php');
                        } else {
                            echo "Error data not changed";
                        }
                    }
                    ?>

                    <!-- Begin form -->
                    <form action="" method="post" name="formOne" enctype="multipart/form-data">
                        <table width="100%">
                            <tr bgcolor="#f78938">
                                <td colspan="2"><label>Update content city:</label></td>
                            </tr>
                            <tr bgcolor="#32a6e8">
                                <td><label>State:</label></td>
                                <td>
                                    <select name="states">
                                        <option value="<?php echo $states; ?> <?php
                                        if ($statename = $states) {
                                            echo 'Selected';
                                        }
                                        ?>">
                                                    <?php echo $statename; ?>
                                        </option>
                                </td>
                            </tr>
                            <tr bgcolor="#32a6e8">
                                <td><label>City:</label</td>
                                <td><input name="city" type="text" value="<?php echo $city; ?>" /></td>
                            </tr>
                            <tr bgcolor="#32a6e8">
                                <td><label>Description:</label</td>
                              <!--  <input name="description" type="text" value="<?php echo $description; ?>" /> -->
                                <td><?php
                                    include('fckeditor/fckeditor.php');
                                    $FCKeditor = new FCKeditor('description');
                                    $FCKeditor->BasePath = 'fckeditor/';
                                    $FCKeditor->Value = $description;
                                    $FCKeditor->Create();
                                    ?>
                                </td>
                            </tr>
                            <tr bgcolor="#32a6e8">
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

            <!-- Start footer area -->
            <?php include("common/footer.php"); ?>
            <!-- End footer area -->

        </div><!--/.fluid-container-->

        <!-- external javascript -->
        <?php include("common/javascript_code.php"); ?>

    </body>
</html>
<?php ob_flush(); ?>
