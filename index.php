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
				<li class="message">
					<span>13/05/19 22:12 - </span>
					Username:
					Message
				</li>
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