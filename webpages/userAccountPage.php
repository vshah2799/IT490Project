<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width", initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>User Page</title>
	</head>

	<body>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		<div class="row justify-content-center">
			<div class="col-sm-3 col-md-6 col-lg-12">
				<h1>User Dashboard</h1>
			</div>
		</div>

		<h2>Update Information</h2>

		<form action="./testUserUpdate.php" method="post">
			<div class="form-group">
				<label for="user">Username</label>
				<input type="text" class="form-control" name="user" id="user" placeholder="Enter username">
			</div>

			<div class="form-group">
				<label for="make">Make</label>
				<input type="text" class="form-control" name="make" id="make" placeholder="Enter make">
			</div>

			<div class="form-group">
				<label for="model">Model</label>
				<input type="text" class="form-control" name="model" id="model" placeholder="Enter model">
			</div>

			<div class="form-group">
				<label for="year">Year</label>
				<input type="text" class="form-control" name="year" id="year" placeholder="Enter year">
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<button type="submit" onclick="displayCookie()">Test Cookie</button>

		<script>
			function displayCookie()
			{
				// getCookie();
				if (document.cookie.length == 0)
				{
					alert("Cookie was not written to");
				}
				else
				{
					alert("Cookie was indeed written to\n");
				}
			}
		</script>
	</body>
</html>
