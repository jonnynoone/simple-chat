<?php

require('database.php'); 

$query = "SELECT * FROM chat";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
	$date = date_create($row['datetime']);

	echo "
	<li class=\"message\">
		<span>" . date_format($date, "d/m/y h:i A") . " - </span>
		" . $row['username'] . ":
		" . $row['message'] . "
	</li>
	";
}

?>