<div class="3u">

	<header>
		<a href="#"><h3>Cities</h3></a>
	</header>

	<?php
		// Connect to server and select databse
    	include("common/connection.php");
    $state_name=$_GET['state_name'];
    	 $query = "SELECT * FROM managecities where states='".$state_name."'";
    	$result = mysql_query($query);

		while ($row = mysql_fetch_array($result)) {

			$city = $row['city'];
    ?>
			<div><h3><a href="manageplaces.php?state_name=<?php echo $state_name; ?>&city=<?php echo $city; ?>"><?php echo $city ?></a></h3></div>
			<hr/>
	<?php
	$i++;
    	}
    ?>
</div>
