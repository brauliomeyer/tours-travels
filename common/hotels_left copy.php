<div class="3u">
    <table>
        <tr>
            <td>
                <header>
                    <a href="toerist_places.php?id=<?php echo $id; ?>"><h3>States</h3></a>
                </header>

                <?php
                // Connect to server and select databse
                include("common/connection.php");
                $states = $_GET['states'];
                $city = $_GET['city'];
                $query1 = "SELECT * FROM manageplaces where states='" . $states . "' and city='" . $city . "'"; // 1xstate_name
                $result1 = mysql_query($query1);

                while ($row1 = mysql_fetch_array($result1)) {

                    $place = $row1['place'];
                    ?>
                    <div><h3>
                            <a href="places_detail.php?state_name=<?php echo $states; ?>&city=<?php echo $city; ?>&place=<?php echo $place; ?>"><?php echo $place ?></a></h3></div>
                    <hr/>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <header>
                    <a href="#"><h3>Hotels</h3></a>
                </header>
                <?php
                // Connect to server and select databse
                include("common/connection.php");
                $state_name = $_GET['state_name'];           // 2xstate_name
                $city = $_GET['city'];
                $query2 = "SELECT * FROM managehotels where state_name='" . $state_name . "' and city='" . $city . "'"; // 1xstate_name
                $result2 = mysql_query($query2);

                while ($row2 = mysql_fetch_array($result2)) {

                    $hotel_name = $row2['hotel_name'];
                    ?>
                    <div><h3>
                            <a href="hotel_detail.php?state_name=<?php echo $state_name; ?>&city=<?php echo $city; ?>&hotel_name=<?php echo $hotel_name; ?>"><?php echo $hotel_name ?></a></h3></div>
                    <hr/>
                    <?php
                }
                ?>
            </td>
        </tr>
    </table>
</div>
