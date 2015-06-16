 <?php
$q = intval($_GET['q']);

	$con = mysql_connect("localhost:8889","user","user");
	if(!$con)	{
		echo "Connection Error: " . mysql_error();
	} 
	mysql_select_db("tourstravels", $con) or die("Cannot select DB")

$sql="SELECT * FROM managecities WHERE id_cities = '".$q."'";
echo $result1 = mysqli_query($con,$sql);


while($row1 = mysqli_fetch_array($result1)) {
  echo $row1['states'];
  echo $row1['city'];
  echo $row['description'];
}

mysqli_close($con);
?> 