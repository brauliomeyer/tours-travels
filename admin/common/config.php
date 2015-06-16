<?php
		$host="localhost:8889";
		$username="root";
		$password="root";
		$dbname="Work";

		$con=mysql_connect("$host","$username","$password") or die();
		
		if(!$con)	{
			echo "Error connection wit database => ". mysql_error();
		} 	else { 
				mysql_select_db("$dbname",$con);
			}
?>