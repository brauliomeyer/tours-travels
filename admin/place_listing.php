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
                                <a href="place_listing.php">Listing places</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Begin table -->

                    <?php
// Connect to server and select databse.
                    include("common/connection.php");

//mysql_select_db("tourstravels", $conn) or die("Cannot select DB");
                    $query = "SELECT * FROM manageplaces";
                    $result = mysql_query($query);

// Check if delete button active, start this
                    if (isset($_POST['delete']) == "Delete") {
                        $rr = $_POST['checkbox'];
                        foreach ($rr as $id_places) {

                            $query = "DELETE FROM manageplaces WHERE id_places='$id_places'";
                            $result = mysql_query($query);
                        }

                        // if successful redirect to back
                        if ($result == 1) {
                            // echo "<meta http-equiv=\"refresh\" content=\"0;URL=place_listing.php\">";
                            header('location:place_listing.php');
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
                                            <td align="center" colspan="9"><strong>Places content </strong> </td>
                                        </tr>


                                        <tr class="<?php if (isset($classname)) echo $classname; ?>">
                                            <td align="center">#</td>
                                                                                    <!-- <td align="center"></td>  -->
                                            <td align="center"><strong>State</strong></td>
                                            <td align="center"><strong>City</strong></td>
                                            <td align="center"><strong>Place</strong></td>
                                            <td align="center"><strong>History</strong></td>
                                            <td align="center"><strong>Distance</strong></td>
                                            <td align="center"><strong>Near places</strong></td>
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
                                                <td align="center"><input name="checkbox[]" type="checkbox" value="<? echo $rows['id_places']; ?>"></td>
                                                <!-- <td align="center"><?php $id_places = $rows['id_places']; ?></td> -->
                                                <td align="center"><?php echo $states = $rows['states']; ?></td>
                                                <td align="center"><?php echo $city = $rows['city']; ?></td>
                                                <td align="center"><?php echo $place = substr($rows['place'], 0, 100); ?></a></td>
                                                <td align="center"><?php echo $history = substr($rows['history'], 0, 100); ?>...<a href="place_view.php?id_places=<?php echo $id_places; ?>"><?php echo "<br/>"; ?>read more</a></td>
                                                <td align="center"><?php echo $distance = substr($rows['distance'], 0, 100); ?></td>
                                                <td align="center"><?php echo $near_places = substr($rows['near_places'], 0, 100); ?></td>
                                                <td align="center"><img src="news/<?php echo $image = $rows['image']; ?>" width="100"height="100"></td>
                                                <td align="center"><a class="underline" href="place_add.php?id_places=<?php echo $id_places; ?>">Add</a> / <a class="underline" href="place_view.php?id_places=<?php echo $id_places; ?>">View</a> / <a class="underline" href="place_update.php?id_places=<?php echo $id_places; ?>">Update</a></td>
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

            <!-- Start footer area -->
            <?php include("common/footer.php"); ?>
            <!-- End footer area -->

        </div><!--/.fluid-container-->

        <!-- external javascript -->
        <?php include("common/javascript_code.php"); ?>

    </body>
</html>
<?php ob_flush(); ?>
