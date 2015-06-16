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

        <style>
            table {
                border-collapse: collapse;
            }

            .oddRow {
                background-color: #FFFFFF;
                font-size:16px;
                color:#101010;
            }
            .evenRow {
                background-color: #39a8e8;
                font-size:16px;
                color:#101010;
            }
            .evenRow:hover, .oddRow:hover {
                background-color: #ffef46;
                color: red;
            }
            .underline	{
                font-size:16px;
                color:#101010;
            }
        </style>

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

                    <!-- Begin table -->
                    <?php
// Connect to server and select databse.
                    include("common/connection.php");

//mysql_select_db("tourstravels", $conn) or die("Cannot select DB");
                    $query = "SELECT * FROM managenews";
                    $result = mysql_query($query);

// Check if delete button active, start this
                    if (isset($_POST['delete']) == "Delete") {
                        $rr = $_POST['checkbox'];
                        foreach ($rr as $id) {

                            $query = "DELETE FROM managenews WHERE id='$id'";
                            $result = mysql_query($query);
                        }

                        // if successful redirect to content_check.php
                        if ($result == 1) {
                            // echo "<meta http-equiv=\"refresh\" content=\"0;URL=content_listing.php\">";
                            header('location:news_listing.php');
                        } else {
                            echo "error";
                        }
                    }
                    ?>
                    <table width="100%" border="1" cellspacing="5" cellpadding="5">

                        <tr>
                            <td>
                                <form name ="addContent" action="" method="post" enctype="multipart/form-data">
                                    <table width="100%" border="0" cellpadding="3" cellspacing="1">
                                        <tr style="background-color: green;">
                                            <td align="center" colspan="8"><strong>News content</strong> </td>
                                        </tr>

                                        <tr class="<?php if (isset($classname)) echo $classname; ?>">
                                            <td align="center">#</td>
                                                                                    <!-- <td align="center"></td>  -->
                                            <td align="center"><strong>Category</strong></td>
                                            <td align="center"><strong>News heading</strong></td>
                                            <td align="center"><strong>Publishing date</strong></td>
                                            <td align="center"><strong>News detail</strong></td>
                                            <td align="center"><strong>Image</strong></td>
                                            <td align="center">Action</td>
                                        </tr>

                                        <?php
                                        while ($rows = mysql_fetch_array($result)) {
                                            if ($i % 2 == 0) {
                                                $classname = "evenRow";
                                            } else {
                                                $classname = "oddRow";
                                            }
                                            ?>

                                            <tr colspan="1" class="<?php if (isset($classname)) echo $classname; ?>">
                                                <td align="center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $rows['id']; ?>"></td>
                                                <!-- <td align="center"><?php $id = $rows['id']; ?></td> -->
                                                <td align="center"><?php echo $category = $rows['category']; ?></td>
                                                <td align="center"><?php echo $title = $rows['title']; ?></td>
                                                <td align="center"><?php echo $date = $rows['date']; ?></td>
                                                <td align="center"><?php echo $detail = substr($rows['detail'], 0, 100); ?>...<a href="news_view.php?id=<?php echo $id; ?>"><?php echo"<br/>"; ?>read more</a></td>
                                                <td align="center"><img src="news/<?php echo $image = $rows['image']; ?>" width="100"height="100"></td>
                                                <td align="center"><a class="underline" href="news_add.php?id=<?php echo $id; ?>">Add</a> / <a class="underline" href="news_view.php?id=<?php echo $id; ?>">View</a> / <a class="underline" href="news_update.php?id=<?php echo $id; ?>">Update</a></td>
                                            </tr>

                                            <?php
                                            $i++;
                                        }
                                        ?>

                                        <tr class="hoover" style="background-color: green;">
                                            <td colspan="15" align="center"	>
                                                <input name="delete" type="submit" id="delete" value="Delete">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
                    </table>
                    <!-- End table -->


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
