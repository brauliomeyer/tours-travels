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
    </head>

    <body>
        <!-- topbar starts -->
<?php include("common/topbar.php"); ?>


        <!-- topbar ends -->
        <div class="ch-container">
            <div class="row">

                <!-- left menu starts -->
                <div class="col-sm-2 col-lg-2">
                    <div class="sidebar-nav">
                        <div class="nav-canvas">
                            <div class="nav-sm nav nav-stacked">

                            </div>
                            <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="nav-header">Main</li>
                                <li><a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                                </li>
                                <li><a class="ajax-link" href="ui.php"><i class="glyphicon glyphicon-eye-open"></i><span> UI Features</span></a>
                                </li>
                                <li><a class="ajax-link" href="form.php"><i
                                            class="glyphicon glyphicon-edit"></i><span> Forms</span></a></li>
                                <li><a class="ajax-link" href="chart.php"><i class="glyphicon glyphicon-list-alt"></i><span> Charts</span></a>
                                </li>
                                <li><a class="ajax-link" href="typography.php"><i class="glyphicon glyphicon-font"></i><span> Typography</span></a>
                                </li>
                                <li><a class="ajax-link" href="gallery.php"><i class="glyphicon glyphicon-picture"></i><span> Gallery</span></a>
                                </li>
                                <li class="nav-header hidden-md">Sample Section</li>
                                <li><a class="ajax-link" href="table.php"><i
                                            class="glyphicon glyphicon-align-justify"></i><span> Tables</span></a></li>
                                <li class="accordion">
                                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Accordion Menu</span></a>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#">Child Menu 1</a></li>
                                        <li><a href="#">Child Menu 2</a></li>
                                    </ul>
                                </li>
                                <li><a class="ajax-link" href="calendar.php"><i class="glyphicon glyphicon-calendar"></i><span> Calendar</span></a>
                                </li>
                                <li><a class="ajax-link" href="grid.php"><i
                                            class="glyphicon glyphicon-th"></i><span> Grid</span></a></li>
                                <li><a href="tour.php"><i class="glyphicon glyphicon-globe"></i><span> Tour</span></a></li>
                                <li><a class="ajax-link" href="icon.php"><i
                                            class="glyphicon glyphicon-star"></i><span> Icons</span></a></li>
                                <li><a href="error.php"><i class="glyphicon glyphicon-ban-circle"></i><span> Error Page</span></a>
                                </li>
                                <li><a href="login.php"><i class="glyphicon glyphicon-lock"></i><span> Login Page</span></a>
                                </li>
                            </ul>
                            <label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
                        </div>
                    </div>
                </div>
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
                                <a href="#">Charts</a>
                            </li>
                        </ul>
                    </div>

                    <div class="row">

                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-list-alt"></i> Chart with points</h2>

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
                                    <div id="sincos" class="center" style="height:300px"></div>
                                    <p id="hoverdata">Mouse position at (<span id="x">0</span>, <span id="y">0</span>). <span
                                            id="clickdata"></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-list-alt"></i> Flot</h2>

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
                                    <div id="flotchart" class="center" style="height:300px"></div>
                                </div>
                            </div>
                        </div>

                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-list-alt"></i> Stack Example</h2>

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
                                    <div id="stackchart" class="center" style="height:300px;"></div>

                                    <p class="stackControls center">
                                        <input class="btn btn-default" type="button" value="With stacking">
                                        <input class="btn btn-default" type="button" value="Without stacking">
                                    </p>

                                    <p class="graphControls center">
                                        <input class="btn btn-primary" type="button" value="Bars">
                                        <input class="btn btn-primary" type="button" value="Lines">
                                        <input class="btn btn-primary" type="button" value="Lines with steps">
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div><!--/row-->

                    <div class="row">
                        <div class="box col-md-4">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-list-alt"></i> Pie</h2>

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
                                    <div id="piechart" style="height:300px"></div>
                                </div>
                            </div>
                        </div>

                        <div class="box col-md-4">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-list-alt"></i> Realtime</h2>

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
                                    <div id="realtimechart" style="height:190px;"></div>
                                    <p>You can update a chart periodically to get a real-time effect by using a timer to insert the new data
                                        in the plot and redraw it.</p>

                                    <p>Time between updates: <input id="updateInterval" type="text" value=""
                                                                    style="text-align: right; width:5em"> milliseconds</p>
                                </div>
                            </div>
                        </div>

                        <div class="box col-md-4">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-list-alt"></i> Donut</h2>

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
                                    <div id="donutchart" style="height: 300px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/row-->

                    <!-- chart libraries start -->
                    <script src="bower_components/flot/excanvas.min.js"></script>
                    <script src="bower_components/flot/jquery.flot.js"></script>
                    <script src="bower_components/flot/jquery.flot.pie.js"></script>
                    <script src="bower_components/flot/jquery.flot.stack.js"></script>
                    <script src="bower_components/flot/jquery.flot.resize.js"></script>
                    <!-- chart libraries end -->
                    <script src="js/init-chart.js"></script>

                    <!-- content ends -->
                </div><!--/#content.col-md-0-->
            </div><!--/fluid-row-->

            <!-- Ad, you can remove it -->
            <div class="row">
                <div class="col-md-9 col-lg-9 col-xs-9  hidden-xs">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Charisma Demo 2 -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:728px;height:90px"
                         data-ad-client="ca-pub-5108790028230107"
                         data-ad-slot="3193373905"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <div class="col-md-2 col-lg-3 col-sm-12 col-xs-12 donate">
                    <div>
                        <small>Help development of Charisma</small>
                    </div>
                    <a class="btn btn-default" href="http://flattr.com/thing/1507720/usmanhalalitcharisma-on-GitHub"
                       target="_blank"><i class="glyphicon glyphicon-usd green"></i> Donate</a>
                </div>

            </div>
            <!-- Ad ends -->

            <hr>

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

            <footer class="row">
                <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad
                        Usman</a> 2012 - 2014</p>

                <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                        href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
            </footer>

        </div><!--/.fluid-container-->

        <!-- external javascript -->

        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- library for cookie management -->
        <script src="js/jquery.cookie.js"></script>
        <!-- calender plugin -->
        <script src='bower_components/moment/min/moment.min.js'></script>
        <script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
        <!-- data table plugin -->
        <script src='js/jquery.dataTables.min.js'></script>

        <!-- select or dropdown enhancer -->
        <script src="bower_components/chosen/chosen.jquery.min.js"></script>
        <!-- plugin for gallery image view -->
        <script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
        <!-- notification plugin -->
        <script src="js/jquery.noty.js"></script>
        <!-- library for making tables responsive -->
        <script src="bower_components/responsive-tables/responsive-tables.js"></script>
        <!-- tour plugin -->
        <script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
        <!-- star rating plugin -->
        <script src="js/jquery.raty.min.js"></script>
        <!-- for iOS style toggle switch -->
        <script src="js/jquery.iphone.toggle.js"></script>
        <!-- autogrowing textarea plugin -->
        <script src="js/jquery.autogrow-textarea.js"></script>
        <!-- multiple file upload plugin -->
        <script src="js/jquery.uploadify-3.1.min.js"></script>
        <!-- history.js for cross-browser state change on ajax -->
        <script src="js/jquery.history.js"></script>
        <!-- application script for Charisma demo -->
        <script src="js/charisma.js"></script>
    </body>
</html>
<?php ob_flush(); ?>
