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
                <!--

            window.history.forward();
            function noBack()
            {
                window.history.forward();
            }

            function validateForm() {
                if (document.addContent.state_name.value == "")
                {
                    alert("Please enter state name!");
                    document.addContent.state_name.focus();
                    return false;
                }
                return(true);
            }
            //-->
        </SCRIPT>
    </head

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
                                <a href="state_add.php">Add states</a>
                            </li>
                        </ul>
                    </div>

                    <div id="envelope">
                        <?php
                        include("common/connection.php");

                        if (isset($_POST['submit']) == "Submit") {

                            $state_name = $_POST['state_name'];
                            $detail = $_POST['detail'];
                            $image = $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                            $query = "select * from managestates where state_name= '$state_name'";
                            $result = mysql_query($query);
                            $numrows = mysql_num_rows($result);
                            if ($numrows > 0) {
                                echo "<br/> Name state already exists! ";
                                //sleep(10);
                                //header('location:state_add.php');
                                exit();
                            }

                            $query = "insert into managestates(state_name,detail,image) values('$state_name','$detail','$image')";
                            $c = mysql_query($query);

                            if ($c == '1') {
                                ?>
                                <img src="img/Green_Thick.png" width="40" height="40">
                                <?php
                                echo "<h5 class='green'> Successfully added!!! </h5>";
                                //header('location:state_listing.php');
                            } else {
                                ?>
                                <img src="img/Red_Cross.png" width="40" height="40">
                                <?php
                                header('location:state_add.php');
                                echo "FAIL";
                            }
                        }
                        ?>

                        <form name ="addContent" onsubmit="return validateForm();" method="post" enctype="multipart/form-data">
                            <header>
                                <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                <h1 style="color:red;">Edit Content Here</h1>
                            </header>

                            <label>State:</label>
                            <input type="text" name="state_name" placeholder="Enter state name">

                            <label>Description:</label><br/>
                            <?php
                            include('fckeditor/fckeditor.php');
                            $FCKeditor = new FCKeditor('detail');
                            $FCKeditor->BasePath = 'fckeditor/';
                            $FCKeditor->Create();
                            ?><br/><br/>


                            <label>Image:</label><br/>
                            <input type="file" name="image" />

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
