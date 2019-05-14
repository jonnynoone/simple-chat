<?php

require('database.php');

if ($_POST['user'] > "" && $_POST['message'] > "") {
	$username = mysqli_real_escape_string($link, $_POST['user']);
	$message = mysqli_real_escape_string($link, $_POST['message']);

	$query = "INSERT INTO chat (username, message)
			  VALUES ('$username', '$message')";

	mysqli_query($link, $query);

	echo "success";
}

?>