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
                    document.addContent.states.focus();
                    return false;
                }

                if (document.addContent.city.value == "-1")
                {
                    alert("Please provide your city!");
                    document.addContent.city.focus();
                    return false;

                }

                if (document.addContent.place.value == "")
                {
                    alert("Please enter place!");
                    document.addContent.place.focus();
                    return false;
                }
                return(true);
            }

            function showUser(str) {
                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                }

                xmlhttp.open("GET", "getuser.php?q=" + str, true);
                xmlhttp.send();
            }

            function showCity(city)
            {
                document.frm.submit();
                header("location:test.php");
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
                                <a href="gallery_add.php">Add gallery</a>
                            </li>
                        </ul>
                    </div>

                    <div id="envelope">

                        <?php
                        if (isset($_GET['submit']) == 'Proceed') {
                            echo $city = $_GET['city'];
                            echo $statename = $_GET['shop'];
                            header("location:gallery.php?statename=$statename&city=$city");
                        }
                        ?>
                        <form name ="addContent" onsubmit="return validateForm();" method="get" enctype="multipart/form-data">
                            <header>
                                <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                <h1 style="color:red;">Manage Gallery</h1>
                            </header>

                            <label>State</label>
                            <?php
                            $sql1 = "select * from managestates";
                            $query1 = mysql_query($sql1);
                            ?>
                            <select name="shop" onchange="showUser(this.value)">
                                <option value=""> --- Select a state --- </option>
                                <?php
                                while ($row1 = mysql_fetch_array($query1)) {
                                    echo $statename = $row1["state_name"];
                                    ?>
                                    <option value="<?php echo $statename; ?>"><?php echo $statename; ?></option>

                                    <?php
                                }
                                ?>

                            </select><br/>

                            <label>City</label>
                            <div id="txtHint"><b></b>
                                <?php
                                echo $statename = $_GET['q'];
                                echo $city = $_GET['city'];
                                ?>

                            </div><br/>
                            <div id="txtHint"><b></b></div>

                            <input type="submit" name="submit" value="Proceed">

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
