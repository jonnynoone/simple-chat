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
			</ul>
		</div> <!-- /#messages -->

		<div id="input" class="group">
			<form method="post" action="index.php">
				<input type="text" id="userInput" placeholder="Enter Your Name" required>
				<input type="text" id="messageInput" placeholder="Enter Your Message" required>
				<br>
				<button type="button" onclick="insertData()">Submit</button>
			</form>
		</div> <!-- /#input -->

		<div id="information" class="group">
			<div>
				<span class="info-text"></span>
			</div>
		</div> <!-- /#information -->
	</div> <!-- /.container -->

	<script>
		var readData = () => {
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = () => {
				if (xhr.readyState === 4 && xhr.status === 200) {
					let chat = document.querySelector('#chat');
					chat.firstElementChild.innerHTML = xhr.responseText;
					chat.scrollTop = chat.scrollHeight;
				}
			};

			xhr.open('GET', 'read.php', true);
			xhr.send();
		};

		var insertData = () => {
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = () => {
				if (xhr.readyState === 4 && xhr.status === 200) {
					if (xhr.responseText === "success") {
						document.querySelector('.info-text').innerHTML = "Message sent.";
						setTimeout(() => {
							document.querySelector('.info-text').innerHTML = "";
						}, 3000);

						document.querySelector('#userInput').value = "";
						document.querySelector('#messageInput').value = "";

						readData();
					};
				}
			};

			var user = document.querySelector('#userInput').value;
			var message = document.querySelector('#messageInput').value;

			xhr.open('POST', 'insert.php', true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.send(`user=${user}&message=${message}`);
		};

		window.onload = readData();
	</script>
</body>

</html>