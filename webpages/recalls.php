<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width", initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Recalls Page</title>
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<h1>if seeing this, button worked</h1>

	<?php
		if(isset($_POST['make']))
		{
			$make = $_POST['make'];
			echo "Make: $make" . "<br>";
		}

		if(isset($_POST['model']))
		{
			$model = $_POST['model'];
			echo "Model: $model" . "<br>";
		}

		if(isset($_POST['year']))
		{
			$year = $_POST['year'];
			echo "Year: $year" . "<br>";
		}
	?>

</body>
</html>
