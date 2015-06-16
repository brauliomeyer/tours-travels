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
        <?php
        include("common/code.php");
        include("common/connection.php");
        include("common/css_code.php");
        ?>
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
                                <a href="gallery_add.php">Add places</a>
                            </li>
                        </ul>
                    </div>

                    <div id="envelope">
                        <?php
                        include("common/connection.php");
                        $states = $_GET['statename'];
                        $city = $_GET['city'];


                        if (isset($_POST['submit']) == "Add") {
                            $states = $_POST['states'];
                            $city = $_POST['city'];
                            $place = $_POST['place'];

                            $image = $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);



                            echo $query = "insert into managegallery(state,city,place,image) values('$states','$city','$place','$image')";
                            $c = mysql_query($query);

                            if ($c == '1') {
                                ?>
                                <img src="img/Green_Tick.png" width="40" height="40">
                                <?php
                                echo "<h5 class='green'> Successfully added!!! </h5>";
                                //header('location:place_listing.php');
                            } else {
                                ?>
                                <img src="img/Red_Cross.png" width="40" height="40">
                                <?php
                                echo "<h5 class='red'> Not added!!! </h5>";
                                //header('location:place_add.php');
                            }
                        }
                        ?>

                        <form name ="addContent" onsubmit="return validateForm();" method="post" enctype="multipart/form-data">
                            <header>
                                <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                <h1 style="color:red;">Manage Gallery</h1>
                            </header>

                            <label>State</label>
                            <input name="states" id="states" type="text" value="<?php echo $states; ?>" readonly />
                            <br/>

                            <label>City</label>
                            <input name="city" id="city" type="text"  value="<?php echo $city; ?>" readonly/>
                            <br/>

                            <label>Place</label>
                            <?php
                            $sql1 = "select * from manageplaces where city='$city'";
                            $query1 = mysql_query($sql1);
                            ?>
                            <select name="place">
                                <option value=""> --- Select a Places --- </option>
                                <?php
                                while ($row1 = mysql_fetch_array($query1)) {
                                    echo $places = $row1["place"];
                                    ?>
                                    <option value="<?php echo $places; ?>"><?php echo $places; ?></option>

                                    <?php
                                }
                                ?>

                            </select><br/>




                            <label>Image</label>
                            <input name="image" id="image" type="file" placeholder="Upload image!" />
                            <br/><br/>

                            <input type="submit" name="submit" value="Add">

                            <br/><br/><br/>
                        </form>
                    </div>

                    <!-- content ends -->
                </div><!--/#content.col-md-0-->
            </div><!--/fluid-row-->

            <div id="content-wrapper">
                <div id="content">
                    <div class="container">

                    </div>
                </div>
            </div>
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
