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
        <?php include("common/css_code.php"); ?>

        <link href="css/color_text.css" rel="stylesheet" type="text/css" />
        <SCRIPT type="text/javascript">
            window.history.forward();
            function noBack()
            {
                window.history.forward();
            }

            function validateForm() {
                if (document.addContent.states.value == "-1")
                {
                    alert("Please provide your state!");
                    return false;
                }

                if (document.addContent.city.value == "")
                {
                    alert("Please provide your city!");
                    document.addContent.city.focus();
                    return false;
                }
                return(true);
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
                                <a href="city_add.php">Add cities</a>
                            </li>
                        </ul>
                    </div>

                    <div id="envelope">
                        <?php
                        include("common/connection.php");

                        if (isset($_POST['submit']) == "Submit") {

                            $id = $_POST['id'];
                            $states = $_POST['states'];
                            $city = $_POST['city'];
                            $description = $_POST['description'];
                            $image = $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                            $query = "select * from managecities where city = '$city' and description = '$description'";
                            $result = mysql_query($query);
                            $numrows = mysql_num_rows($result);
                            if ($numrows > 0) {
                                //echo "<br/> Name already exists! ";
                                header('location:city_add.php');
                                exit();
                            }

                            $query = "insert into managecities(states,city,description,image) values('$states','$city','$description','$image')";
                            $c = mysql_query($query);

                            if ($c == '1') {
                                ?>
                                <img src="img/Green_Tick.png" width="40" height="40">
                                <?php
                                echo "<h5 class='green'> Successfully added!!! </h5>";
                                //header('location:city_listing.php');
                            } else {
                                ?>
                                <img src="img/Red_Cross.png" width="40" height="40">
                                <?php
                                echo "<h5 class='red'> Not added!!! </h5>";
                                //header('location:city_add.php');
                            }
                        }
                        ?>

                        <form name ="addContent" onsubmit="return validateForm();" method="post" enctype="multipart/form-data">
                            <header>
                                <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                <h1 style="color:red;">Edit Content Here</h1>
                            </header>

                            <?php
                            $query = "select * from managestates";
                            $result = mysql_query($query);
                            ?>

                            <label>State</label>
                            <select name="states">
                                <option value="-1">Please select state</option>

                                <?php
                                while ($row = mysql_fetch_array($result)) {
                                    $states = $row['state_name'];
                                    ?>
                                    <option value="<?php echo $states; ?>"><?php echo $states; ?></option>
                                    <?php
                                }
                                ?>
                            </select>

                            <label>City</label>
                            <input type="text" name="city" placeholder="Enter state name">

                            <label>Description</label><br/>
                            <input type="text" name="description" >
                            <?php
                            include('fckeditor/fckeditor.php');
                            $FCKeditor = new FCKeditor('description');
                            $FCKeditor->BasePath = 'fckeditor/';
                            $FCKeditor->Create();
                            ?><br/><br/>

                            <label>Image</label><br/>
                            <input type="file" name="image" placeholder="Upload image">

                            <br/>
                            <input name="submit" type="submit" value="Submit">
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
