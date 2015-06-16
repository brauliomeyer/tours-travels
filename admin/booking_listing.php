<?php
ob_start();
session_start();

// Connect to server and select databse.
include("common/connection.php");

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

        <style>
            table {
                border-collapse: collapse;
            }

            .oddRow {
                background-color: #FFFFFF;
                font-size:16px;
                color:#101010;
            }
            .evenRow {
                background-color: #39a8e8;
                font-size:16px;
                color:#101010;
            }
            .evenRow:hover, .oddRow:hover {
                background-color: #ffef46;
                color: red;
            }
            .underline	{
                font-size:16px;
                color:#101010;
            }
        </style>

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
                                <a href="place_listing.php">Listing places</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Begin table -->



					<?php
						include("common/connection.php");
						  //$query = "SELECT * FROM managebooking";
                          //$result = mysql_query($query);

					if(isset($_POST['submit'])=='Delete')
					{
					$delete=$_POST['c'];
					foreach($delete as $id)
					{
					echo $id;
					echo$query="delete from managebooking where id=".$id; //die;
					$result=mysql_query($query);
					if($result=='1')
					{
					header("location:booking_listing.php");
					}
					else{
					echo"record is not deleted";
					}
					}
					}
					?>
					<?php

                         $query = "SELECT * FROM managebooking";
                         $result = mysql_query($query);


if (isset($_POST['delete']) == "Delete") {
                        $rr = $_POST['checkbox'];
                        foreach ($rr as $id) {

                            $query2 = "DELETE FROM managebooking WHERE id='$id'";
                            $result2 = mysql_query($query2);
                        }

                        // if successful redirect to content_check.php
                        if ($result2 == 1) {
                            // echo "<meta http-equiv=\"refresh\" content=\"0;URL=content_listing.php\">";
                            header('location:booking_listing.php');
                        } else {
                            echo "Error";
							header('location:booking_add.php');
                        }
                    }
				    ?>

                    <table width="100%" border="1" cellspacing="2" cellpadding="2">
                        <tr>
                            <td>
                                <form name ="addContent" action="" method="post" enctype="multipart/form-data">
                                    <table width="100%" border="0" cellpadding="1" cellspacing="1">
                                        <tr style="background-color: green;">
                                            <td align="center" colspan="14"><strong>Booking content</strong> </td>
                                        </tr>
                                      <tr class="<?php if (isset($classname)) echo $classname; ?>">
                                        <td align="center">#</td>
										<!-- <td align="center"><strong>Id</strong></td> -->
                                        <td align="center"><strong>State</strong></td>
										<td align="center"><strong>City</strong></td>
                                        <td align="center"><strong>Hotel</strong></td>
                                        <!-- <td align="center"><strong>Adults</strong></td>
										<td align="center"><strong>Childs</strong></td> -->
										<td align="center"><strong>Start date</strong></td>
										<td align="center"><strong>End date</strong></td>
                                        <td align="center"><strong>Name</strong></td>
                                        <td align="center"><strong>Email</strong></td>
										<td align="center"><strong>Phone</strong></td>
										<td align="center"><strong>Address</strong></td>
										<td align="center"><strong>Action</strong></td>
									  </tr>
                                <?php
                                        while ($rows = mysql_fetch_array($result)) {
                                            if ($i % 2 == 0) {
                                                $classname = "evenRow";
                                            } else {
                                                $classname = "oddRow";
                                            }
                                            ?>

                                      <tr class="<?php if (isset($classname)) echo $classname; ?>">
                                        <td align="center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $rows['id']; ?>"></td>
                                        <!-- <td align="center"><php //echo $id = $rows['id']; ?></td> -->
                                        <td align="center"><?php echo $state_name = $rows['state_name']; ?></td>
                                        <td align="center"><?php echo $city = $rows['city']; ?></td>
										<td align="center"><?php echo $hotel_name = $rows['hotel_name']; ?></td>
										<!-- <td align="center"><php //echo $no_of_adults = $rows['no_of_adults']; ?></td>
										<td align="center"><php //echo $no_of_childs = $rows['no_of_childs']; ?></td> -->
										<td align="center"><?php echo $start_date = $rows['start_date']; ?></td>
										<td align="center"><?php echo $end_date = $rows['end_date']; ?></td>
										<td align="center"><?php echo $name = $rows['name']; ?></td>
										<td align="center"><?php echo $email = $rows['email']; ?></td>
										<td align="center"><?php echo $contact_number = $rows['contact_number']; ?></td>
										<td align="center"><?php echo $address = $rows['address']; ?></td>
										<td align="center"><a class="underline" href="booking_send.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>&email=<?php echo $email; ?>&hotel_name=<?php echo $hotel_name; ?>&contact_number=<?php echo $contact_number; ?>">Send</a></td>
                                      </tr>
                                            <?php
                                            $i++;
                                        }
                                        ?>

                                        <tr class="hoover" style="background-color: green;">
                                            <td colspan="14" align="center"	>
                                                <input name="delete" type="submit" id="delete" value="Delete">
                                    </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
            <!-- End table -->



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
