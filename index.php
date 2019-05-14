<?php

require('database.php');

if (isset($_POST['submit'])) {
	if ($_POST['user'] > "" && $_POST['message'] > "") {
		$username = mysqli_real_escape_string($link, $_POST['user']);
		$message = mysqli_real_escape_string($link, $_POST['message']);

		$query = "INSERT INTO chat (username, message)
				  VALUES ('$username', '$message')";

		mysqli_query($link, $query);
	}
}

$query = "SELECT * FROM chat";
$result = mysqli_query($link, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simple Chat</title>

	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<header>
			<h1>Simple Chat</h1>
		</header>

		<div id="chat">
			<ul>
				<?php

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
			</ul>
		</div> <!-- /#messages -->

		<div id="input" class="group">
			<form method="post" action="index.php">
				<input type="text" name="user" placeholder="Enter Your Name">
				<input type="text" name="message" placeholder="Enter Your Message">
				<br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div> <!-- /#input -->

		<div id="information" class="group">
			<div>
				<span class="info-text">Information message goes here.</span>
			</div>
		</div> <!-- /#information -->
	</div> <!-- /.container -->
</body>

</html>