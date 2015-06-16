<div class="3u">

	<header>
		<a href="newsdetail.php?id=<?php echo $id; ?>"><h1>Latest News</h1></a>
	</header>
	<marquee direction="up" onMouseOver="this.stop();" onMouseOut="this.start();" scrolldelay=15 scrollamount=2 >


	<?php

		// Connect to server and select databse
    	include("common/connection.php");
    
    	$query = "SELECT * FROM managenews";
    	$result = mysql_query($query);

		while ($row = mysql_fetch_array($result)) {
			//$id = $row['id'];
			//$category = $row['category'];
			$title = $row['title'];
			$date = $row['date'];
			$detail = $row['detail'];
			$image = $row['image'];
    ?>

		<div><img height="100" width="200" src="admin/news/<?php echo $image;?>"></div>
			
			<div><h3>Title: <?php echo $title ?></h3></div>
			<div><h4>Publish date: <?php echo $date; ?><h4></div>
			<div>
				<p style="float:right;">Article: <?php echo $dd = substr($detail,0,100); ?>...
				<a href="newsdetail.php?id=<?php echo $id; ?>">Read more</a>				
				</p>
	
			</div>
			
			<hr/>
	<?php
	$i++;
    	}		
    ?>	
	</marquee>	

</div>
