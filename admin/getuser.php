<?php
$q = $_GET["q"];

$con = mysql_connect('localhost:8889', 'user', 'user');

if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("tourstravels", $con);


//echo $sql="SELECT * FROM managecities WHERE states = "'.$states.'"";
$sql = "SELECT * FROM managecities WHERE states = '" . $q . "'";

$result = mysql_query($sql);
?>

<select name="city" onChange="showCity(this.value); >
            < option value ="">Please select city</option>

<?php
while ($row = mysql_fetch_array($result)) {
    echo $city = $row['city'];
    ?>
    <option value="<?php echo $city; ?>"><?php echo $city; ?></option>
    <?php
}
?>
</select>
