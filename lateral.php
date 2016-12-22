<?php
	echo '<h6><a class="directory" href="index.php">Home Page</a><h6>';
	while($row = mysql_fetch_assoc($result2))
		echo '<h6><a class="directory" href="index.php?page=article&id_article='.$row['id_articulos'].'">'.$row['entrada'].'</a><h6>';
?>