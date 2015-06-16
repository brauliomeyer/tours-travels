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
                                <a href="hotel_listing.php">Listing hotel</a>
                            </li>
                        </ul>
                    </div>

                    <?php
                    include("common/connection.php");
                    $id = $_GET['id'];
                    $query = "select * from managehotels where id = " . $id;
                    $result = mysql_query($query);

                    while ($row = mysql_fetch_array($result)) {
                        $id = $row['id'];
                        $state_name = $row['state_name'];
                        $city = $row['city'];
                        $hotel_name = $row['hotel_name'];
                        $hotel_type = $row['hotel_type'];
                        $hotel_range = $row['hotel_range'];
                        $facilities = $row['facilities'];
                        $food = $row['food'];
                        $oldimage = $row['image'];

                        $facilities = explode(",", $facilities);
                        foreach ($facilities as $value) {
                            if (strpos($value, 'atm') !== false) {
                                $atm = "checked";
                            }
                            if (strpos($value, 'bankethall') !== false) {
                                $bankethall = "checked";
                            }
                            if (strpos($value, 'bar') !== false) {
                                $bar = "checked";
                            }
                            if (strpos($value, 'cafe') !== false) {
                                $cafe = "checked";
                            }
                            if (strpos($value, 'depositbox') !== false) {
                                $depositbox = "checked";
                            }
                            if (strpos($value, 'elevator') !== false) {
                                $elevator = "checked";
                            }
                            if (strpos($value, 'pool') !== false) {
                                $pool = "checked";
                            }
                            if (strpos($value, 'restaurant') !== false) {
                                $restaurant = "checked";
                            }
                        }
                    }

                    if (isset($_POST['submit']) == "Update") {
                        $state_name = $_POST['state_name'];
                        $city = $_POST['city'];
                        $hotel_name = $_POST['hotel_name'];
                        $hotel_type = $_POST['hotel_type'];
                        $hotel_range = $_POST['hotel_range'];
                        $facilities = $_POST['facilities'];
                        $food = $_POST['food'];
                        $newimage = $_FILES['image']['name'];

                        $facilities22 = implode(",", $facilities);
                        $facilities = explode(",", $facilities);
                        foreach ($facilities as $value) {
                            if (strpos($value, 'atm') !== false) {
                                $atm = "checked";
                            }
                            if (strpos($value, 'bankethall') !== false) {
                                $bankethall = "checked";
                            }
                            if (strpos($value, 'bar') !== false) {
                                $bar = "checked";
                            }
                            if (strpos($value, 'cafe') !== false) {
                                $cafe = "checked";
                            }
                            if (strpos($value, 'depositbox') !== false) {
                                $depositbox = "checked";
                            }
                            if (strpos($value, 'elevator') !== false) {
                                $elevator = "checked";
                            }
                            if (strpos($value, 'pool') !== false) {
                                $pool = "checked";
                            }
                            if (strpos($value, 'restaurant') !== false) {
                                $restaurant = "checked";
                            }
                        }

                        if ($newimage == '') {

                            $query = "update managehotels set state_name='$state_name', city='$city', hotel_name='$hotel_name', hotel_type='$hotel_type', hotel_range='$hotel_range', facilities='$facilities22', food='$food' where id=" . $id;
                        } else {

                            move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                            $query = "update managehotels set state_name='$state_name', city='$city', hotel_name='$hotel_name', hotel_type='$hotel_type', hotel_range='$hotel_range', facilities='$facilities22', food='$food' where id=" . $id;
                        }

                        $result = mysql_query($query);

                        if ($result == '1') {
                            header('location:hotel_listing.php');
                        } else {
                            echo "Error data not changed";
                        }
                    }
                    ?>

                    <!-- Begin form -->
                    <form action="" method="post" name="formOne" enctype="multipart/form-data">
                        <table width="100%">
                            <tr bgcolor="#f78938">
                                <td colspan="2"><label>Update hotel:</label></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>State:</label></td>
                                <td><input name="state_name" type="text" size="60" value="<?php echo $state_name; ?>" /></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>City:</label</td>
                                <td><input name="city" type="text" size="60" value="<?php echo $city; ?>"  /></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Name:</label</td>
                                <td><input name="hotel_name" type="text" size="60" value="<?php echo $hotel_name; ?>"  /><br/></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Type:</label</td>
                                <td>
                                    <select name="hotel_type" id="hotel_type">
                                        <option value="-1">Select type</option>
                                        <option value="no star" <?php
                                        if ($hotel_type == 'no star') {
                                            echo 'selected';
                                        }
                                        ?>>No star</option>
                                        <option value="three stars" <?php
                                        if ($hotel_type == 'three stars') {
                                            echo 'selected';
                                        }
                                        ?>>Three stars</option>
                                        <option value="four stars" <?php
                                        if ($hotel_type == 'four stars') {
                                            echo 'selected';
                                        }
                                        ?>>Four stars</option>
                                        <option value="five stars" <?php
                                        if ($hotel_type == 'five stars') {
                                            echo 'selected';
                                        }
                                        ?>>Five stars</option>
                                    </select>
                                    <br/></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Hotel range:</label</td>
                                <td>
                                    <select name="hotel_range">
                                        <option value="-1">Select range</option>
                                        <option value="5000 - 10000" <?php
                                        if ($hotel_range == '5000 - 10000') {
                                            echo 'selected';
                                        }
                                        ?>>5000 - 10000</option>
                                        <option value="10000 - 15000" <?php
                                        if ($hotel_range == '10000 - 15000') {
                                            echo 'selected';
                                        }
                                        ?>>10000 - 15000</option>
                                        <option value="15000 - 20000" <?php
                                        if ($hotel_range == '15000 - 20000') {
                                            echo 'selected';
                                        }
                                        ?>>15000 - 20000</option>
                                        <option value="20000 - 25000" <?php
                                        if ($hotel_range == '20000 - 25000') {
                                            echo 'selected';
                                        }
                                        ?>>20000 - 25000</option>
                                        <option value="25000 - 30000" <?php
                                        if ($hotel_range == '25000 - 30000') {
                                            echo 'selected';
                                        }
                                        ?>>25000 - 30000</option>
                                        <option value="30000 - 35000" <?php
                                        if ($hotel_range == '30000 - 35000') {
                                            echo 'selected';
                                        }
                                        ?>>30000 - 35000</option>
                                        <option value="35000 - 40000" <?php
                                        if ($hotel_range == '35000 - 40000') {
                                            echo 'selected';
                                        }
                                        ?>>35000 - 40000</option>
                                        <option value="40000 - above" <?php
                                        if ($hotel_range == '40000 - above') {
                                            echo 'selected';
                                        }
                                        ?>>40000 - above</option>
                                    </select>
                                    <br/></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Facilities:</label><br/></td>
                                <td>
                                    <input type="checkbox" name="facilities[]" value="atm" <?php echo $atm; ?>/>ATM
                                    <input type="checkbox" name="facilities[]" value="bankethall" <?php echo $bankethall; ?>/>Banket hall
                                    <input type="checkbox" name="facilities[]" value="bar" <?php echo $bar; ?>/>Bar
                                    <input type="checkbox" name="facilities[]" value="cafe" <?php echo $cafe; ?>/>Cafe
                                    <input type="checkbox" name="facilities[]" value="depositbox" <?php echo $depositbox; ?>/>Deposit box
                                    <input type="checkbox" name="facilities[]" value="elevator" <?php echo $elevator; ?>/>Elevator
                                    <input type="checkbox" name="facilities[]" value="pool" <?php echo $pool; ?>/>Pool
                                    <input type="checkbox" name="facilities[]" value="restaurant" <?php echo $restaurant; ?>/>Restaurant
                                    <br/></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Food:</label</td>
                                <td>
                                    <select name="food" id="food">
                                        <option value="-1">Select food</option>
                                        <option value="with food" <?php
                                        if ($food == 'with food') {
                                            echo 'selected';
                                        }
                                        ?>>With food</option>
                                        <option value="without food" <?php
                                        if ($food == 'without food') {
                                            echo 'selected';
                                        }
                                        ?>>Without food</option>
                                    </select>
                                    <br/></td>
                            </tr>
                            <tr bgcolor="#249fe6">
                                <td><label>Image:</label></td>
                                <td>
                                    <img src="news/<?php echo $oldimage; ?>" width="100"height="100">
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
