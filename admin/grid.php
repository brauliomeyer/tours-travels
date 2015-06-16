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
        ?>
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

                <noscript>
                <div class="alert alert-block col-md-12">
                    <h4 class="alert-heading">Warning!</h4>

                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                        enabled to use this site.</p>
                </div>
                </noscript>

                <div id="content" class="col-lg-10 col-sm-10">
                    <!-- content starts -->
                    <div>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Grid</a>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-th"></i> Grid 12</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                                class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="row">
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div><!--/row-->

                    <div class="row">
                        <div class="box col-md-3">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-th"></i> Grid 3</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="row">
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="box col-md-3">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-th"></i> Grid 3</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="row">
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="box col-md-3">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-th"></i> Grid 3</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="row">
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="box col-md-3">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2>Plain</h2>
                                </div>
                                <div class="box-content">
                                    <div class="row">
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div><!--/row-->

                    <div class="row">
                        <div class="box col-md-6">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-th"></i> Grid 6</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                                class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="row">
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                        <div class="box col-md-6">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-th"></i> Grid 6</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                                class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="row">
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div><!--/row-->
                    <div class="row">
                        <div class="box col-md-4">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-th"></i> Grid 4</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                                class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="row">
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                        <div class="box col-md-4">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-th"></i> Grid 4</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                                class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="row">
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                        <div class="box col-md-4">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-th"></i> Grid 4</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                                class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="row">
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                        <div class="col-md-4"><h6>column 4</h6></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div><!--/row-->

                    <!-- content ends -->
                </div><!--/#content.col-md-0-->
            </div><!--/fluid-row-->

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
