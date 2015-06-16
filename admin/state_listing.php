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

                    <!-- Begin table -->
                    <?php
// Connect to server and select databse.
                    include("common/connection.php");

//mysql_select_db("tourstravels", $conn) or die("Cannot select DB");
                    $query = "SELECT * FROM managestates";
                    $result = mysql_query($query);

// Check if delete button active, start this
                    if (isset($_POST['delete']) == "Delete") {
                        $rr = $_POST['checkbox'];
                        foreach ($rr as $id) {

                            $query = "DELETE FROM managestates WHERE id='$id'";
                            $result = mysql_query($query);
                        }

                        // if successful redirect to content_check.php
                        if ($result == 1) {
                            // echo "<meta http-equiv=\"refresh\" content=\"0;URL=content_listing.php\">";
                            header('location:state_listing.php');
                        } else {
                            echo "error";
                        }
                    }
                    ?>
                    <table width="100%" border="0" cellspacing="5" cellpadding="5">

                        <tr>
                            <td>
                                <form name ="addContent" action="" method="post" enctype="multipart/form-data">
                                    <table width="100%" border="0" cellpadding="3" cellspacing="1">
                                        <tr style="background-color: green;">
                                            <td align="center" colspan="8"><strong>States content</strong> </td>
                                        </tr>

                                        <tr class="<?php if (isset($classname)) echo $classname; ?>">
                                            <td align="center">#</td>
                                                                                    <!-- <td align="center"></td>  -->
                                            <td align="center"><strong>State name</strong></td>
                                            <td align="center"><strong>Description</strong></td>
                                            <td align="center"><strong>Image</strong></td>
                                            <td align="center"><strong>Action</strong></td>
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
                                                <td align="center"><?php echo $state_name = $rows['state_name']; ?></td>
                                                <td align="center"><?php echo $detail = substr($rows['detail'], 0, 50); ?>...<a href="">...<a href="state_view.php?id=<?php echo $id; ?>"><?php echo"<br/>"; ?>read more</a></td>
                                                <td align="center"><img src="news/<?php echo $image = $rows['image']; ?>" width="100"height="100"></td>
                                                <td align="center"><a class="underline" href="state_add.php?id=<?php echo $id; ?>">Add</a> / <a class="underline" href="state_view.php?id=<?php echo $id; ?>">View</a> / <a class="underline" href="state_update.php?id=<?php echo $id; ?>">Update</a></td>
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

            <!-- footer starts -->
            <?php include("common/footer.php"); ?>
            <!-- footer ends -->

        </div><!--/.fluid-container-->

        <!-- Start footer area -->
        <?php include("common/footer.php"); ?>
        <!-- End footer area -->

    </div><!--/.fluid-container-->

    <!-- external javascript -->
    <?php include("common/javascript_code.php"); ?>

</body>
</html>
<?php ob_flush(); ?>
