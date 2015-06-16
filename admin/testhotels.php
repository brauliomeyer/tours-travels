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
                                <a href="hotel_add.php">Add hotels</a>
                            </li>
                        </ul>
                    </div>

                    <div id="envelope">
                        <?php
                        include("common/connection.php");
                        $state_name = $_GET['state'];
                        $city = $_GET['city'];


                        if (isset($_POST['submit']) == "Add") {
                            $state_name = $_POST['state_name'];
                            $city = $_POST['city'];
                            $hotel_name = $_POST['hotel_name'];
                            $hotel_type = $_POST['hotel_type'];
                            $hotel_range = $_POST['hotel_range'];
                            $facilities = $_POST['facilities'];
                            $facilities = implode(', ', $facilities);
                            $food = $_POST['food'];
                            $image = $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                            $query = "select * from managehotels where hotel_name = '$hotel_name' and image = '$image' ";
                            $result = mysql_query($query);
                            $numrows = mysql_num_rows($result);
                            if ($numrows > 0) {
                                echo "<br/> Name hotel already exists! ";
                                sleep(10);
                                header('location:hotel_add.php');
                                exit();
                            }

                            echo $query = "insert into managehotels(state_name,city,hotel_name,hotel_type,hotel_range,facilities,food,image) values('$state_name','$city','$hotel_name','$hotel_type','$hotel_range','$facilities','$food','$image')";
                            $c = mysql_query($query);

                            if ($c == '1') {
                                ?>
                                <img src="img/Green_Tick.png" width="40" height="40">
                                <?php
                                echo "<h5 class='green'> Successfully added!!! </h5>";
                                //header('location:hotel_listing.php');
                            } else {
                                ?>
                                <img src="img/Red_Cross.png" width="40" height="40">
                                <?php
                                echo "<h5 class='red'> Not added!!! </h5>";
                                //header('location:hotel_add.php');
                            }
                        }
                        ?>

                        <form name ="addContent" onsubmit="return validateForm();" method="post" enctype="multipart/form-data">
                            <header>
                                <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                <h1 style="color:red;">Add hotel</h1>
                            </header>

                            <label>State</label>
                            <input name="state_name" id="state_name" type="text" value="<?php echo $state_name; ?>" readonly />
                            <br/>

                            <label>City</label>
                            <input name="city" id="city" type="text"  value="<?php echo $city; ?>" readonly/>
                            <br/>

                            <label>Hotel name</label>
                            <input name="hotel_name" id="hotel_name" type="text" placeholder="Enter hotel name!" />
                            <br/>

                            <label>Hotel type</label>
                            <select name="hotel_type" id="hotel_type">
                                <option value="no star">No stars
                                <option value="three stars">Three stars
                                <option value="four stars">Four stars
                                <option value="five stars">Five stars
                            </select>
                            <br/>

                            <label>Hotel range</label>
                            <select name="hotel_range" id="hotel_range">
                                <option value="5000 - 10000">5000 - 10000</option>
                                <option value="10000 - 15000">10000 - 15000</option>
                                <option value="15000 - 20000">15000 - 20000</option>
                                <option value="20000 - 25000">20000 - 25000</option>
                                <option value="25000 - 30000">25000 - 30000</option>
                                <option value="30000 - 35000">30000 - 35000</option>
                                <option value="35000 - 40000">35000 - 40000</option>
                                <option value="40000 - above">40000 - above</option>
                            </select>
                            <br/>

                            <label>Facilities</label>
                            <div>
                                <input type="checkbox" name="facilities[]" value="atm">ATM
                                <input type="checkbox" name="facilities[]" value="bankethall">Banket hall
                                <input type="checkbox" name="facilities[]" value="bar">Bar
                                <input type="checkbox" name="facilities[]" value="cafe">Cafe
                                <input type="checkbox" name="facilities[]" value="depositbox">Deposit box
                                <input type="checkbox" name="facilities[]" value="elevator">Elevator
                                <input type="checkbox" name="facilities[]" value="pool">Pool
                                <input type="checkbox" name="facilities[]" value="restaurant">Restaurant
                            </div><br/>

                            <label>Food</label>
                            <select name="food" id="food">
                                <option value="with food">With food
                                <option value="without food">Without food
                            </select>
                            <br/>

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
