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
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/datepicker.js"></script>


    </script>
    <script type="text/javascript">
        function validateForm()
        {
            var x = document.forms["index"]["date"].value;
            if (x == null || x == "")
            {
                alert("you must enter your check in Date(click the calendar icon)");
                return false;
            }
            var y = document.forms["index"]["end"].value;
            if (y == null || y == "")
            {
                alert("you must enter your check out Date(click the calendar icon)");
                return false;
            }
        }
    </script>
    <script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }

        function validateForm() {
            if (document.addContent.category.value == "")
            {
                alert("Please enter category!");
                document.addContent.category.focus();
                return false;
            }
            if (document.addContent.title.value == "")
            {
                alert("Please enter title!");
                document.addContent.title.focus();
                return false;
            }
            if (document.addContent.date.value == "")
            {
                alert("Please enter date!");
                document.addContent.date.focus();
                return false;
            }
            if (document.addContent.detail.value == "")
            {
                alert("Please enter detail!");
                document.addContent.detail.focus();
                return false;
            }
            return(true);
        }
    </script>

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

                <div id="envelope">

                    <form name ="addContent" onsubmit="return validateForm();" method="post" enctype="multipart/form-data">
                        <header>
                            <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                            <h1 style="color:red;">Edit Content Here</h1>

                            <?php
                            include("common/connection.php");

                            if (isset($_POST['submit']) == "Submit") {

                                $category = $_POST['category'];
                                $title = $_POST['title'];
                                $date = $_POST['date'];
                                $detail = $_POST['detail'];
                                $image = $_FILES['image']['name'];
                                move_uploaded_file($_FILES['image']['tmp_name'], "news/" . $_FILES['image']['name']);

                                $query = "select * from managenews where title = '$title'";
                                $result = mysql_query($query);
                                $numrows = mysql_num_rows($result);
                                if ($numrows > 0) {
                                    echo "<br/> Name already exists! ";
                                    header('location:news_add.php');
                                    exit();
                                }

                                $query = "insert into managenews(category,title,date,detail,image) values('$category','$title','$date','$detail','$image')";
                                $c = mysql_query($query);

                                if ($c == '1') {
                                    ?>
                                    <img src="img/Green_Tick.png" width="40" height="40">
                                    <?php
                                    echo "<h5 class='green'> Successfully added!!! </h5>";
                                    header('location:news_listing.php');
                                } else {
                                    ?>
                                    <img src="img/Red_Cross.png" width="40" height="40">
                                    <?php
                                    echo "<h5 class='red'> Not added!!! </h5>";
                                    header('location:news_add.php');
                                    //echo "FAIL";
                                }
                            }
                            ?>

                        </header>

                        <label>Category:</label>
                        <input type="text" name="category" placeholder="Enter category">

                        <label>Title:</label>
                        <input type="text" name="title" placeholder="Enter news heading">

                        <label>Publishing date:</label>
                        <input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="date" id="sd"  maxlength="10" readonly="readonly" />

                        <label>detail:</label>
                        <input type="text" name="detail" placeholder="Enter news detail">

                        <label>Image:</label>
                        <input type="file" name="image" placeholder="Enter image">

                        <br/>
                        <input name="submit" type="submit" value="Submit" >
                    </form>
                </div>

                <!-- End form -->
                <!-- content ends -->
            </div><!--/#content.col-md-0-->
        </div><!--/fluid-row-->

        <div id="content-wrapper">
            <div id="content">
                <div class="container">
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
