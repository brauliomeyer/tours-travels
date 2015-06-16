<?php
ob_start();
$state_name = $_GET['state_name'];
$city = $_GET['city'];
?>
<!DOCTYPE HTML>

<html>
    <head>
        <title> Login Page</title>
        <meta charset="utf-8">

        <!--CSS & JavaScript Code -->
        <?php include("common/code.php"); ?>

        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/loginform.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/style-desktop.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <!-- JavaScript Code for slider -->
        <script src="js/jquery.min.js" type="text/javascript" ></script>
        <script src="js/slider.js" type="text/javascript"></script>
        <script>
            var ck_userName = /(?=^.{4,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;;
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

        <SCRIPT type="text/javascript">
            window.history.forward();
            function noBack()
            {
                window.history.forward();
            }
        </SCRIPT>
    </head>

    <body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
        <!-- Header -->
        <?php include("common/header.php"); ?>
        <?php include("common/slider.php"); ?>

    </div>
    <!-- Content -->
    <div id="content-wrapper">
        <div id="content">
            <div class="container">
                <div class="row">
                    <?php include("common/left.php"); ?>
                    <div class="9u skel-cell-important">

                        <!-- Main Content --> <section >
                            <div class="loginbox radius">
                                <h2 style="color:#FFF; text-align:center"> Login Here !!!!</h2>
                                <div class="loginboxinner radius">
                                    <div class="loginheader">
                                        <h1 class="title">Login</h1>
                                <!--	<div class="logo"><img src="http://w3lessons.info/logo.png" /></div> -->
                                    </div><!--loginheader-->

                                    <?php
                                    if (isset($_POST['submit']) == 'Login') {
                                        include("connection/connection.php");
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];

                                       echo  $query = "Select * from manageusers where username= '$username' and password= '$password'";
                                        $result = mysql_query($query);
                                       $num_rowa = mysql_num_rows($result);

                                        // Check if username and password are correct
										//1 is a pass & 0 is no pass
                                        if ($num_rowa = '1') {
                                            // If correct, we set the session to YES
                                              $_SESSION['username1'] = $username;
											  $url="state_name=$state_name&city=$city";

                                            echo "<h1>You are now logged correctly in</h1>";
										   header("location:booking.php?$url");

                                        } else {


                                            echo "<h1>You are NOT logged correctly in </h1>";
                                            echo "<p><a href='registration.php'>Link registration page</a></p>";
                                        }
                                    }
                                    ?>

                                    <div class="loginform">

                                        <form name="login" id="login" method="post" >
                                            <p>
                                                <label for="username" class="bebas">Username</label>
                                                <input type="text" id="username" name="username" class="radius2" required>
                                            </p>
                                            <p>
                                                <label for="password" class="bebas">Password</label>
                                                <input type="password" id="password" name="password" class="radius2" required>
                                            </p>
                                            <p>
                                              <input type="submit" value="Login" name="submit">
                                               <!--    <button class="radius title" name="submit" name="client_login">Login</button>    -->
                                            </p>
                                        </form>
                                    </div><!--loginform-->
                                </div><!--loginboxinner-->
                            </div><!--loginbox-->
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include("common/footer.php"); ?>
</body>
</html>
<?php ob_flush(); ?>
