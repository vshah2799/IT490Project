<!DOCTYPE html>
	<html>
		
		<head>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		</head>

		<body>

			<div class="row">
  				<div class="col-sm-4"><div class="p-3 border bg_light:"><center>Login</center></div></div>

			</div>
			
		<form action="./userAccountPage.php" method ="post">
			User: <input type="text" name="user" id="user"><br>
			Pass: <input type="text" name="pass" id="pass"><br>
		<input type="submit" name="submit" onclick="setCookie(setSessionID)">
			
		</form>

		<?php

			$user = @$_POST["user"];
			$pass = @$_POST["pass"];

		?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		/*	
		function setSessionID()
		{
			let chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			let sessionID = "";
			for (let i = 0; i < 8; i++)
			{
				sessionID += chars.charAt(Math.floor(Math.random() * chars.length));
			}
			return sessionID;
		}

		function setCookie(sessionID)
		{
			var expiry;
			var date = new Date();
			date.setTime(date.getTime()+(1*24*60*60*1000));
			expiry = "; Expires=" + date.toString();

			var userData = {};
			userData.sessionID = sessionID;
			userData.user = document.getElementById("name").value;
			userData.pass = document.getElementById("pass").value;
			userData.expiry = expiry;
			var toJSON = JSON.stringify(userData);
			document.cookie = toJSON;
		}

		function getCookie()
		{
			cookie = JSON.parse(document.cookie);
			alert("SessionID=" + cookie.sessionID + ";User=" + cookie.user + ";Pass" + cookie.pass + cookie.expiry);
		}
		*/
		document.cookie = "User=" + document.getElementById("user").value + "; expires=Mon, 11 Nov 2021 20:47:11 UTC; path=/";
		document.cookie = "Pass=" + document.getElementById("pass").value + "; expires=Mon, 11 Nov 2021 20:47:11 UTC; path=/";
	</script>

	 	</body>
	</html>
