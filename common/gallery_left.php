<div class="3u">

	<header>
		<a href="#"><h3>Places</h3></a>
	</header>

	<?php
		// Connect to server and select databse
    	include("common/connection.php");

    	$query = "SELECT * FROM manageplaces";
    	$result = mysql_query($query);

		while ($row = mysql_fetch_array($result)) {
			$place = $row['place'];
    ?>
			<div><h3><a href="gallerydetail.php?place=<?php echo $place; ?>"><?php echo $place ?></a></h3></div>
			<hr/>
	<?php
    	}
    ?>
</div>
