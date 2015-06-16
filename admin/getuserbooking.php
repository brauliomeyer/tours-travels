<div>
<?php
$q = $_GET["q"];

    $con = mysql_connect('localhost:8889', 'user', 'user');

    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
        mysql_select_db("tourstravels", $con);
        //$state_name = $_GET['state_name'];
        //$city = $_GET['city'];

        $sql1 ="SELECT DISTINCT city FROM managehotels WHERE state_name = '" . $q . "'";
        //$sql1 ="SELECT DISTINCT city FROM managehotels where hotel_name='".$hotel_name."' AND state_name = '" . $q . "'";
        $result1 = mysql_query($sql1);
?>
    <select name="city" onChange="showCity(this.value); >
            <option value ="">Please select city</option>

        <?php
            while ($row1 = mysql_fetch_array($result1)) {
                echo $city = $row1['city'];
        ?>
            <option value="<?php echo $city; ?>"><?php echo $city; ?></option>
        <?php } ?>
    </select>
    <br/>
</div>
