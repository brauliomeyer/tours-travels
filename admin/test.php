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
                                <a href="city_add.php">Add places</a>
                            </li>
                        </ul>
                    </div>

                    <div id="envelope">
                        <?php
                        include("common/connection.php");
                        $states = $_GET['Statename'];
                        $city = $_GET['city'];


                        if (isset($_POST['submit']) == "Add") {
                            $states = $_POST['states'];
                            $city = $_POST['city'];
                            $place = $_POST['place'];
                            $history = $_POST['history'];
                            $distance = $_POST['distance'];
                            $near_places = $_POST['near_places'];
                            $image = $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                            $query = "select * from manageplaces where history = '$history' and image = '$image' ";
                            $result = mysql_query($query);
                            $numrows = mysql_num_rows($result);
                            if ($numrows > 0) {
                                echo "<br/> Name state already exists! ";
                                sleep(10);
                                header('location:state_add.php');
                                exit();
                            }

                            $query = "insert into manageplaces(states,city,place,history,distance,near_places,image) values('$states','$city','$place','$history','$distance','$near_places','$image')";
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
                                <h1 style="color:red;">Add Content Here</h1>
                            </header>

                            <label>State</label>
                            <input name="states" id="states" type="text" value="<?php echo $states; ?>" readonly />
                            <br/>

                            <label>City</label>
                            <input name="city" id="city" type="text"  value="<?php echo $city; ?>" readonly/>
                            <br/>

                            <label>Place</label>
                            <input name="place" id="place" type="text" placeholder="Enter place" />
                            <br/>

                            <label>Nearest places</label>
                            <?php
                            include('fckeditor/fckeditor.php');
                            $FCKeditor = new FCKeditor('near_places');
                            $FCKeditor->BasePath = 'fckeditor/';
                            $FCKeditor->Create();
                            ?><br/><br/>

                            <label>History</label>
                            <?php
                            include('fckeditor/fckeditor.php');
                            $FCKeditor = new FCKeditor('history');
                            $FCKeditor->BasePath = 'fckeditor/';
                            $FCKeditor->Create();
                            ?><br/><br/>


                            <label>Distance</label>
                            <?php
                            include('fckeditor/fckeditor.php');
                            $FCKeditor = new FCKeditor('distance');
                            $FCKeditor->BasePath = 'fckeditor/';
                            $FCKeditor->Create();
                            ?><br/><br/>

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
