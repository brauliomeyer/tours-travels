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
                                <a href="#">Tables</a>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-user"></i> Datatable + Responsive</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div>
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Date registered</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>David R</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Chris Jack</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jack Chris</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Muhammad Usman</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sheikh Heera</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Helen Garner</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Saruar Ahmed</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ahemd Saruar</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Habib Rizwan</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rizwan Habib</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Amrin Sana</td>
                                                <td class="center">2012/08/23</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sana Amrin</td>
                                                <td class="center">2012/08/23</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ifrah Jannat</td>
                                                <td class="center">2012/06/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jannat Ifrah</td>
                                                <td class="center">2012/06/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Robert</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Dave Robert</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brown Robert</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Usman Muhammad</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Abdullah</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Dow John</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>John R</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Paul Wilson</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Wilson Paul</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Heera Sheikh</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sheikh Heera</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Christopher</td>
                                                <td class="center">2012/08/23</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Andro Christopher</td>
                                                <td class="center">2012/08/23</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jhon Doe</td>
                                                <td class="center">2012/06/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lorem Ipsum</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Abraham</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brown Blue</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Worth Name</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                    </div><!--/row-->

                    <div class="row">
                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-user"></i> Responsive, Swipable Table</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <table class="table table-striped table-bordered responsive">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Date registered</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr>
                                                <td>Muhammad Usman</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Abraham</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brown Blue</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Worth Name</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                    </div><!--/row-->

                    <div class="row">
                        <div class="box col-md-6">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2>Simple Table</h2>

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
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Date registered</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Muhammad Usman</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>White Horse</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sheikh Heera</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Saruar</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sana Amrin</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <ul class="pagination pagination-centered">
                                        <li><a href="#">Prev</a></li>
                                        <li class="active">
                                            <a href="#">1</a>
                                        </li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                        <div class="box col-md-6">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2>Striped Table</h2>

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
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Date registered</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Muhammad Usman</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>White Horse</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sheikh Heera</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Saruar</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sana Amrin</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <ul class="pagination pagination-centered">
                                        <li><a href="#">Prev</a></li>
                                        <li class="active">
                                            <a href="#">1</a>
                                        </li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div><!--/row-->

                    <div class="row">
                        <div class="box col-md-6">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2>Bordered Table</h2>

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
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Date registered</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Muhammad Usman</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>White Horse</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sheikh Heera</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Saruar</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sana Amrin</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <ul class="pagination pagination-centered">
                                        <li><a href="#">Prev</a></li>
                                        <li class="active">
                                            <a href="#">1</a>
                                        </li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                        <div class="box col-md-6">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2>Condensed Table</h2>

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
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Date registered</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Muhammad Usman</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>White Horse</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sheikh Heera</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Saruar</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sana Amrin</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <ul class="pagination pagination-centered">
                                        <li><a href="#">Prev</a></li>
                                        <li class="active">
                                            <a href="#">1</a>
                                        </li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                    </div><!--/row-->

                    <div class="row">
                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2>Combined All</h2>

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
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Date registered</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Muhammad Usman</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>White Horse</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sheikh Heera</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Saruar</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sana Amrin</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <ul class="pagination pagination-centered">
                                        <li><a href="#">Prev</a></li>
                                        <li class="active">
                                            <a href="#">1</a>
                                        </li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!--/span-->

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

            <!-- Start footer area -->
            <?php include("common/footer.php"); ?>
            <!-- End footer area -->

        </div><!--/.fluid-container-->

        <!-- external javascript -->
        <?php include("common/javascript_code.php"); ?>

    </body>
</html>
<?php ob_flush(); ?>
