<div class="3u">

	<header>
		<a href="#"><h3>States</h3></a>
	</header>

	<?php
		// Connect to server and select databse
    	include("common/connection.php");

    	$query = "SELECT * FROM managestates";
    	$result = mysql_query($query);

		while ($row = mysql_fetch_array($result)) {
			$state_name = $row['state_name'];
			$city = $row['city'];
    ?>
			<div><h3><a href="placesnew.php?state_name=<?php echo $state_name; ?>"><?php echo $state_name ?></a></h3></div>
			<hr/>
	<?php
    	}
    ?>
</div>
