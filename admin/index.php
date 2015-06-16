<?php
ob_start();
//session_start();
//if(S_SESSION['username']=='' || S_SESSION['password']=='') {
//	header('location:login.php');
//	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tours & Travels</title>
        <?php include("common/code.php"); ?>

        <script type="text/javascript">
            window.history.forward();
            function noBack()
            {
                window.history.forward();
            }
        </script>
        <script>
            var ck_userName = /(?=^.{4,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
            ;
            var ck_passWord = /(?=^.{10,50}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;

            function validate(login) {

                var userName = login.username.value;
                var passWord = login.password.value;
                var errors = [];

                if (!ck_userName.test(userName)) {
                    errors[errors.length] = "You valid name has no special char.";
                }
                if (!ck_passWord.test(passWord)) {
                    errors[errors.length] = "You must enter a valid Password.";
                }

                if (errors.length > 0) {

                    reportErrors(errors);
                    return false;
                }
                return true;
            }
            function reportErrors(errors) {
                var msg = "Please Enter Valide Data...\n";
                for (var i = 0; i < errors.length; i++) {
                    var numError = i + 1;
                    msg += "\n" + numError + ". " + errors[i];
                }
                alert(msg);
            }
        </script>
    </head>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <?php include("common/header_index.php"); ?>
    <!-- topbar ends -->

    <div class="ch-container">
        <div class="row">

            <!-- left menu starts -->
            <?php //include("common/left.php");	?>
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
                            <a href="index.php">Login</a>
                        </li>
                    </ul>
                </div>

                <?php
                include("common/connection.php");

                if (isset($_POST['submit']) == "Login") {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $query = "select * from admindetail where username = '$username' and password = '$password'";
                    $result = mysql_query($query) or die(mysql_error());
                    $num_rows = mysql_num_rows($result);

                    if ($num_rows == '1') {
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;
                        header("Location:welcome.php");
                    } else {
                        echo "Password and username does not match";
                    }
                }
                ?>
                <div style="height:600px" class="input-group col-md-4">
                    <form name="formLogin" class="form-horizontal" action="#" method="post">
                        <fieldset>
                            <table align="center">
                                <tr>
                                    <td><span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span></td>
                                    <td><label>Username:</label></td>
                                    <td><input class="form-control" name="username" id="username" type="text" autofocus required /></td>
                                </tr>
                                <tr>
                                    <td><span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span></td>
                                    <td><label>Password:</label></td>
                                    <td><input class="form-control" name="password" id="password" type="password" autofocus required /></td>
                                </tr>
                                <tr>
                                    <td colspan="3" ><input class="btn btn-default" name="submit" type="submit" value="Login" /></td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                </div>

    <!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


<!-- content part start here -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here settings can be configured...</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
            </div>
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
