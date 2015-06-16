<!-- Header -->
<div id="header-wrapper">
    <header id="header" class="container">
        <div class="row">
            <div class="12u">

<!-- Logo -->
<h1><a href="#" id="logo" style="padding:-30px; font-family: 'Lobster;'">Tours&Travel</a></h1>

                <!-- Nav -->
                <nav id="nav">
                    <a href="detail.php?pagename=Home">Home</a>
                    <a href="detail.php?pagename=About US">About Us</a>
                    <a href="detail.php?pagename=Services">Services</a>
                    <a href="gallery.php?pagename=Gallery">Gallery</a>
				    <a href="cities.php?pagename=City">City</a>
                    <a href="toerist_places.php?pagename=City">Place</a>
                    <a href="detail.php?pagename=Contact Us">Contact Us</a>
                    <?php
						//Start session on every page with php-include
						session_start();

		                if (!empty($_SESSION['username1']))
						{
                        ?>
								<a style="color: #ed391a;" href="logout.php"><?php echo $_SESSION['username1']; ?>&nbsp;&nbsp;&nbsp; Logout</a>
						<?php	} ?>
				</nav>
            </div>
        </div>
    </header>
</div>
<!-- End -->
