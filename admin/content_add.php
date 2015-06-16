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

        <link href="css/color_text.css" rel="stylesheet" type="text/css" />
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
                                <a href="content_listing.php">Listing content</a>
                            </li>
                        </ul>
                    </div>

                    <?php
                    include("common/connection.php");
                    $id = $_GET['id'];
                    $query = "select * from managecontents where id = " . $id;
                    $result = mysql_query($query);

                    while ($row = mysql_fetch_array($result)) {
                        $id = $row['id'];
                        $Pagename = $row['Pagename'];
                        $SEO_title = $row['SEO_title'];
                        $SEO_keyword = $row['SEO_keyword'];
                        $SEO_description = $row['SEO_description'];
                        $Details = $row['Details'];
                    }

                    if (isset($_POST['submit']) == "Update") {
                        $Pagename = $_POST['Pagename'];
                        $SEO_title = $_POST['SEO_title'];
                        $SEO_keyword = $_POST['SEO_keyword'];
                        $SEO_description = $_POST['SEO_description'];
                        $Details = $_POST['Details'];

                        $query = "update managecontents set Pagename = '$Pagename', SEO_title = '$SEO_title',
					SEO_keyword = '$SEO_keyword', SEO_description = '$SEO_description', Details = '$Details' where id = " . $id;
                        $result = mysql_query($query);

                        if ($result == '1') {
                            ?>
                            <img src="img/Green_Tick.png" width="40" height="40">
                            <?php
                            echo "<h5 class='green'>Successfully added!!!</h5>";
                            //header('location:content_listing.php');
                        } else {
                            ?>
                            <img src="img/Red_Cross.png" width="40" height="40">
                            <?php
                            echo "<h5 class='red'> Not added!!! </h5>";
                            //header('location:content_edit.php');
                        }
                    }
                    ?>


                    <!-- Begin form -->
                    <form action="" method="post" name="formOne">
                        <table border="0" width="100%">
                            <tr bgcolor="#f78938">
                                <td colspan="2"><label>View content CMS:</label></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Pagename:</label></td>
                                <td><input name="Pagename" type="text" value="<?php echo $Pagename; ?>"  placeholder="Enter Pagename!" size="100%"  /></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>SEO_title:</label</td>
                                <td><input name="SEO_title" type="text" value="<?php echo $SEO_title; ?>"  placeholder="Enter SEO_title!" size="100%"  /></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>SEO_keyword:</label</td>
                                <td><input name="SEO_keyword" type="text" value="<?php echo $SEO_keyword; ?>"  placeholder="Enter SEO_keyword!" size="100%"  /></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>SEO_description:</label</td>
                                <td><input name="SEO_description" type="text" value="<?php echo $SEO_description; ?>"  placeholder="Enter SEO_description!" size="100%"  /></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Details:</label</td>
                                <td>
                                    <?php
                                    include('fckeditor/fckeditor.php');
                                    $FCKeditor = new FCKeditor('Details');
                                    $FCKeditor->BasePath = 'fckeditor/';
                                    $FCKeditor->Value = $Details;
                                    $FCKeditor->Create();
                                    ?>

                                </td>
                            </tr>
                            <tr bgcolor="#f78938">
                                <td><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></td>
                                <td ><input name="submit" type="submit" value="Update" /></td>
                            </tr>
                        </table>
                    </form>
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
