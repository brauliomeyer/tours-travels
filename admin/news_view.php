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
                            <a href="content_edit.php">Edit News</a>
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

                        $query = "update managenews set category = '$category', title = '$title', date = '$date', detail = '$detail', image = '$oldimage' where id = " . $id;
                    } else {

                        move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                        $query = "update managenews set category = '$category', title = '$title',  date = '$date', detail = '$detail', image = '$newimage' where id = " . $id;
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
                            <td><label>View News</label></td>
                        </tr>
                        <tr bgcolor="#32a6e8">
                            <td>
                                <label>Category</label> <p><?php echo $category; ?></p>
                            </td>
                        </tr>
                        <tr bgcolor="#32a6e8">
                            <td>
                                <label>Title</label> <p><?php echo $title; ?></p>
                            </td>
                        </tr>
                        <tr bgcolor="#32a6e8">
                            <td>
                                <label>Date</label><p><?php echo $date; ?></p>
                            </td>
                        </tr>
                        <tr bgcolor="#32a6e8">
                            <td>
                                <label>Detail</label><p><?php echo $detail; ?></p>
                            </td>
                        </tr>
                        <tr bgcolor="#32a6e8">
                            <td>
                                <label>Image</label><br/><img src="news/<?php echo $oldimage; ?>" width="50%" height="50%">
                                <input name="image" type="file">
                            </td>
                        </tr>
                        <tr bgcolor="#f78938">
                            <td>
                                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a><input name="submit" type="submit" value="Update" />
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
