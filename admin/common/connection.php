<?php
	$conn = mysql_connect("localhost:8889","user","user");
	if(!$conn)	{
		echo "Connection Error: " . mysql_error();
	}
	mysql_select_db("tourstravels", $conn);
?>
