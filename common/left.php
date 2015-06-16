<div class="3u">

<header>
	<a href="#"><h1>Latest News</h1></a>
</header>
<marquee direction="up" onMouseOver="this.stop();" onMouseOut="this.start();" scrolldelay=15 scrollamount=2 >

<?php
//Connect to server and select databse
include("common/connection.php");

$query = "SELECT * FROM managenews";
$result = mysql_query($query);

while ($row = mysql_fetch_array($result)) {
		$title = $row['title'];
		$id = $row['id'];
		$date = $row['date'];
		$detail = $row['detail'];
		$image = $row['image'];
    ?>
    <table>
        <tr><td><h3>Title: <?php echo $title = substr($title, 0, 23); ?></h3></td></tr>
        <tr><td><h4>Publish date: <?php echo $date = substr($date, 0, 20); ?><h4></td></tr>
            <tr>
                <td>
                    <img width="252" height="150" src="admin/news/<?php echo $image; ?>" style="border:12px solid #ccd1d5; align-content: space-around; align-items: center;">
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $detail = substr($detail, 0, 125); ?>...<a href="newsdetail.php?id=<?php echo $id; ?>">Read More</a>
                </td>
            </tr>
            </table>
            <hr/>
            <?php
        }
        ?>
</marquee>

</div>
