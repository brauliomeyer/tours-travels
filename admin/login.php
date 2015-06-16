<?php ob_start(); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <!-- <link href="admin/common/loginstyle.css" rel="stylesheet" type="text/css" >  -->

        <title> Login Page</title>

        <?php
        include("common/code.php");
        ?>
    </head>
    <body>
        <!-- Header -->
        <?php include("common/header.php"); ?>

        <!-- Content -->
        <div id="content-wrapper">
            <div id="content">
                <div class="container">
                    <div class="row">
                        <?php include("common/left.php"); ?>
                        <div class="9u skel-cell-important">

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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include("common/footer.php"); ?>

</body>
</html>
session_destroy();
<?php ob_flush(); ?>
