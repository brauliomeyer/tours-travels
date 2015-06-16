<?php
	$conn = mysql_connect("localhost:8889","root","root");
	if(!$conn)	{
		echo "Connection Error: " . mysql_error();
	}
	mysql_select_db("tourstravels", $conn) or die("Cannot select DB");
?>
