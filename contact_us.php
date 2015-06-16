<?php
// Connect to server and select databse.
include("scripts/getpagename.php");

// Start up your PHP Session
session_start();

?>
<!DOCTYPE HTML>
<!--
        Halcyonic 3.1 by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Message</title>
        <meta name="keywords" content="<?php echo $SEO_keyword; ?>">
        <meta name="description" content="<?php $SEO_description ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Braulio Design Research">

        <!-- PHP Code -->
        <?php include 'scripts/cities_select_list.php'; ?>
        <?php include("common/code.php"); ?>

        <!-- CSS Code -->
        <link rel="stylesheet" href="css/main.css" type="text/css">

        <!-- JavaScript Code for slider -->
        <script src="js/cities_ajax_select.js" type="text/javascript"></script>
        <script src="js/jquery.min.js" type="text/javascript" ></script>
        <script src="js/slider.js" type="text/javascript" ></script>
    </head>

    <body>
        <!-- <a href="botval/val.php">Niet leuk voor mechaniserende objecten</a>  -->
        <?php include("common/header.php"); ?>
        <?php include("common/slider.php"); ?>

        <!-- Content -->
        <div id="content-wrapper">
            <div id="content">
                <div class="container">
                    <div class="row">
                        <?php include("common/managecities_left.php"); ?>
                        <div class="9u skel-cell-important">

                            <!-- Main Content -->
                            <section>
                                <header>
                                    <div style="text-align:right;"><a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></div>
                                    <h1 class="hh"><span>Please</span> leave a message if you want to contact us!</h1>
                                </header>

                                <?php
                                if(isset($_POST['submit'])=="Send") {
                                $to = "braulio_meijer@yahoo.com";
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $subject = $_POST['subject'];
                                $messageClient = $_POST['messageClient'];
                                $contact_number = $_POST['contact_number'];
                                $mesg = 'Name: '.$name. 'Email: '.$email. 'Contact number'.$contact_number. 'Subject: '.$subject. 'Message: '.$messageClient;

                                 $headers = 'MIME-Version: 1.0' . "\r\n";
                                 $headers .= 'Content-type: text/htmml; charset=iso-8859-1' . "\r\n";

                                 $headers .='From: ""' . "\r\n";
                                 $headers .='CC: abc<abc@abc.com>';

                                 $message ="<table>
                                     <tr>
                                         <td>Dear $name</td>
                                     </tr>
                                     <tr>
                                         <td>$mesg</td>
                                     </tr>
                                     <tr>
                                         <td>Warm regards</td>
                                     </tr>
                                     <tr>
                                         <td>Tours & Travel</td>
                                     </tr>
                                 </table>";

                                 echo $mail = mail($to,$subject,$message,$headers);

                                 if ($mail == '1') {
                                     ?>
                                     <img src="img/Green_Thick.png" width="40" height="40">
                                     <?php
                                     echo "<h5 class='green'> Successfully Send!!! </h5>";
                                     header('location:state_listing.php');
                                 } else {
                                     ?>
                                     <img src="img/Red_Cross.png" width="40" height="40">
                                     <?php
                                     header('location:state_add.php');
                                     echo "Send";
                                 }
                                }
                                ?>


                                <div id="leave_comment">
                                    <form name="formContact1" method="post" onsubmit="return validate(this);" id="formContact1">
                                    <table>
                                        <tr>
                                            <td><label for="name">Name</label></td>
                                            <td><input type="text" id="name" name="name" required></td>

                                        </tr>
                                        <tr>
                                            <td><label for="email">E-mail</label></td>
                                            <td><input type="email" id="email" name="email" title="Email: (Format: something@something.com)" required maxlength="50"></td>

                                        </tr>
                                        <tr>
                                            <td><label for="subject">Phone</label></td>
                                            <td><input id="contact_number" name="contact_number" type="tel" pattern="(\d{4})([\-])(\d{2})[\-](\d{7})" title="Phone Number (Format: 0099-99-9999999)" required maxlength="20"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="subject">Subject</label></td>
                                            <td><input type="text" id="subject" name="subject" required maxlength="50"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="subject">Message</label></td>
                                            <td><textarea id="messageClient" name="messageClient" rows="5" cols="21" required maxlength="200"></textarea></td>
                                        </tr>
                                        <tr><td><input type='submit' value='send Mail' name="sendMail" onclick='javascript:validate()'></td></tr>
                                    </table>
                                    </form>
                                    <script type="text/javascript">
                                        var nameUser = /^[A-Za-z0-9 ]{3,20}$/;
                                        var emailUser = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{1,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                                        var subjectUser = /^[A-Za-z0-9 ]{3,}$/;
                                        var messageUser = /^[A-Za-z0-9 ]{3,}$/;
                                        var contact_numberUser = /^(\d{4})([\-])(\d{2})[\-](\d{7})$/;

                                        function validate(formContact1) {

                                            var name = formContact1.name.value;
                                            var email = formContact1.email.value;
                                            var subject = formContact1.subject.value;
                                            var message = formContact1.messageClient.value;
                                            var contact_number = formContact1.contact_number.value;
                                            var errors = [];

                                            if (!(nameUser.test(name))) {
                                                errors[errors.length] = "Enter your name please!";
                                            }
                                            if (!(emailUser.test(email))) {
                                                errors[errors.length] = "Enter a valid email address!";
                                            }
                                            if (!(contact_numberUser.test(contact_number))) {
                                                errors[errors.length] = "Do not forget your phone number!";
                                            }
                                            if (!(subjectUser.test(subject))) {
                                                errors[errors.length] = "Enter a subject!";
                                            }
                                            if (!(messageUser.test(message))) {
                                                errors[errors.length] = "Do not forget your message please!";
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
                                </div>

                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <?php include("common/footer.php"); ?>

        <!-- <a href="botval/val.php">Niet leuk voor mechaniserende objecten</a>  -->
    </body>
</html>
