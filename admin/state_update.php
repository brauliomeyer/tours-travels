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
                                <a href="state_listing.php">Listing states</a>
                            </li>
                        </ul>
                    </div>

                    <?php
                    include("common/connection.php");
                    $id = $_GET['id'];
                    $query = "select * from managestates where id = " . $id;
                    $result = mysql_query($query);

                    while ($row = mysql_fetch_array($result)) {
                        $id = $row['id'];
                        $state_name = $row['state_name'];
                        $detail = $row['detail'];
                        $oldimage = $row['image'];
                    }

                    if (isset($_POST['submit']) == "Update") {
                        $state_name = $_POST['state_name'];
                        $detail = $_POST['detail'];
                        $newimage = $_FILES['image']['name'];

                        if ($newimage == '') {

                            $query = "update managestates set state_name = '$state_name', detail = '$detail', image = '$oldimage' where id = " . $id;
                        } else {

                            move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                            $query = "update managestates set state_name = '$state_name', detail = '$detail', image = '$newimage' where id = " . $id;
                        }

                        $result = mysql_query($query);

                        if ($result == '1') {
                            header('location:state_listing.php');
                        } else {
                            echo "Error data not changed";
                        }
                    }
                    ?>

                    <!-- Begin form -->
                    <form action="" method="post" name="formOne" enctype="multipart/form-data">
                        <table width="100%" >
                            <tr bgcolor="#f78938">
                                <td colspan="2"><label>Update state:</label></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>State name:</label></td>
                                <td><input name="state_name" type="text" value="<?php echo $state_name; ?>" /></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Detail:</label</td>
                                <td>
                                    <input name="detail" type="text" size="100"  value="<?php echo $detail; ?>" />
                                    <?php
                                    include('fckeditor/fckeditor.php');
                                    $FCKeditor = new FCKeditor('detail');
                                    $FCKeditor->BasePath = 'fckeditor/';
                                    $FCKeditor->Value = $detail;
                                    $FCKeditor->Create();
                                    ?>
                                </td>
                            </tr>
                            <tr bgcolor="#249fe6"><br/>
                            <td><label>Image:</label><br/><img src="news/<?php echo $oldimage; ?>" width="100" height="100"></td>
                            <td><br/>
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
