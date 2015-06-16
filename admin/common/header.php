<div class="navbar navbar-default" role="navigation">

    <!-- user dropdown starts -->
    <div class="btn-group pull-right">
        <ul >
            <form class="navbar-search pull-right">
                <input placeholder="Search" class="search-query form-control col-md-10" name="query" type="text">
            </form>
        </ul>
    </div>

    <!-- user dropdown starts -->
    <div class="btn-group pull-right">
        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
            <span class="caret"></span>
            <?php
            //Start session on every page with php-include
            session_start();

            if (!empty($_SESSION['username'])) {
                ?>
                <a style="color: #ed391a;" href="#"><?php echo $_SESSION['username']; ?></a>
            <?php } ?>
        </button>

        <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li class="divider"></li>
            <li><a href="really_logout.php">Logout</a></li>
        </ul>
    </div>
    <!-- user dropdown ends -->

    <!-- theme selector starts -->
    <div class="btn-group pull-right theme-container animated tada">

        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-tint"></i><span
                class="hidden-sm hidden-xs"> Change Theme / Skin</span>
            <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" id="themes">
            <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
            <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
            <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
        </ul>
    </div>
    <!-- theme selector ends -->


    <div ><img src="img/logo.png" width="200" style="padding:10px 0 0 10px;"></div>
    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <ul class="collapse navbar-collapse nav navbar-nav top-menu">

            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Manage content <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="content_add.php">Add content</a></li>
                    <li class="divider"></li>
                    <li><a href="content_listing.php">Listing content</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Manage news <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="news_add.php">Add news</a></li>
                    <li class="divider"></li>
                    <li><a href="news_listing.php">Listing news</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Manage states <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="state_add.php">Add states</a></li>
                    <li class="divider"></li>
                    <li><a href="state_listing.php">Listing states</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Manage cities <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="city_add.php">Add cities</a></li>
                    <li class="divider"></li>
                    <li><a href="city_listing.php">Listing cities</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Manage places <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="place_add.php">Add places</a></li>
                    <li class="divider"></li>
                    <li><a href="place_listing.php">Listing places</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Manage Gallery <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="gallery_add.php">Add Gallery</a></li>
                    <li class="divider"></li>
                    <li><a href="gallery_listing.php">Listing Gallery</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Manage Hotel <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="hotel_add.php">Add hotel</a></li>
                    <li class="divider"></li>
                    <li><a href="hotel_listing.php">Listing hotel</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Manage Booking <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <!-- <li><a href="booking_add.php">Add hotel</a></li>
                    <li class="divider"></li> -->
                    <li><a href="booking_listing.php">Listing booking</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
