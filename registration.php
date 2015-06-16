<?php
	// Start up your PHP Session
	session_start();

if (!(empty($_SESSION['username1']))) {
	  header("Location:index.php");
	}
?>
<!DOCTYPE HTML>

<html>
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <meta name="keywords" content="<?php echo $SEO_keyword; ?>">
        <meta name="description" content="<?php $SEO_description ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--PHP Code -->
        <?php include("common/code.php"); ?>

		<!-- CSS Code -->
		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link href="css/registrationstyle.css" rel="stylesheet" type="text/css" >

        <!--- JS code-->
        <script type="text/javascript" src="js/jquery-1.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>

    </head>
    <body>
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

						  <?php
						  if (isset($_POST['submit'])) {
							  $query1 = "insert into manageusers(firstname,lastname,username,password,confirmpassword,email,phoneno,address) values('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[confirmpassword]','$_POST[email]','$_POST[phoneno]','$_POST[address]')";
							  $result = mysql_query($query1, $conn) or die(mysql_error($conn));

							  if ($result = '1') {
								  echo "data inserted ";
							  } else {
								  echo "data not inserted";
							  }
						  }
						  ?>

                        <!-- Main Content -->
                        <!--	<section style="height:950px;"> -->
                        <div class="register span6" style="width:100%;">
                            <form action="" method="post" >
                                <h2>REGISTER TO <span class="red"><strong>TOURS&TRAVELS</strong></span></h2>
                                <label for="firstname">First Name</label>
                                <input type="text" id="firstname" name="firstname" placeholder="enter your first name..." required>
                                <label for="lastname">Last Name</label>
                                <input type="text" id="lastname" name="lastname" placeholder="enter your last name..." required>
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" placeholder="choose a username..." required>
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="choose a password..." required>
                                <label for="password">Confirm Password</label>
                                <input type="password" id="confirmpassword" name="confirmpassword" placeholder="confirm password..." required>

                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" placeholder="enter your email..." required>

                                <label for="password">Phone No</label>
                                <input type="text" id="phoneno" name="phoneno" placeholder="enter phone no..." required>

                                <label for="password">Address</label>
                                <input type="text" id="address" name="address" placeholder="enter address..." required>

                                <button type="submit" value="insert" name="submit"  > REGISTER </button>
                                <!--   <button type="submit">REGISTER</button> -->
                            </form>
                        </div>

                        <!-- </section> -->
						 <?php
						 // }
						 ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include("common/footer.php"); ?>
</body>
</html>
