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
                            <a href="#">View content</a>
                        </li>
                    </ul>
                </div>

                <?php
                error_reporting(1);
                include("common/connection.php");

                $id = $_GET['id'];
                $query = "select * from managecontents where id=" . $id;
                $result = mysql_query($query);

                while ($row = mysql_fetch_array($result)) {
                    $id = $row['id'];
                    $Pagename = $row['Pagename'];
                    $SEO_title = $row['SEO_title'];
                    $SEO_keyword = $row['SEO_keyword'];
                    $SEO_description = $row['SEO_description'];
                    $Details = $row['Details'];
                }
                ?>


                <!-- Begin form -->
                <form action="" method="post" name="formOne">
                    <table width="100%">
                        <tr bgcolor="#f78938">
                            <td><label>View Content</label></td>
                        </tr>
                        <tr bgcolor="#32a6e8">
                            <td>
                                <label>Pagename</label><p><?php echo $Pagename; ?></p>
                            </td>
                        </tr>
                        <tr bgcolor="#32a6e8">
                            <td>
                                <label>SEO_title</labe><p><?php echo $SEO_title; ?></p>
                            </td>
                        </tr>
                        <tr bgcolor="#32a6e8">
                            <td>
                                <label>SEO_keyword</label><p><?php echo $SEO_keyword; ?></p>
                            </td>
                        </tr>
                        <tr bgcolor="#32a6e8">
                            <td>
                                <label>SEO_description</label><p><?php echo $SEO_description; ?></p>
                            </td>
                        </tr>
                        <tr bgcolor="#32a6e8">
                            <td>
                                <label>Details</label><p><?php echo $Details; ?></p>
                            </td>
                        </tr>
                        <tr bgcolor="#f78938">
                            <td><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></td>
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
