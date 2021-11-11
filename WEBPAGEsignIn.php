<!DOCTYPE html>
	<html>
	<?php include 'WEBPAGEheader.php'; ?>
		
		<head>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		</head>
<div class="container-lg">
    <form class="row g-3" method="post" action="WEBPAGEsignInNext.php">
        <div class="col-md-4">
            <label id="userName" for="make" class="form-label">Username</label>
            <input type="text" class="form-control" id="userName" name="userName" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">Password</label>
            <input type="text" class="form-control" id="passWord" name="passWord" required>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
		<body>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	 	</body>
<script>

    if(sessionStorage.getItem('user').length>0 || sessionStorage.getItem('pass')>0){
        window.location.href = "WEBPAGEsignInNextVerify.php";
    }

    </script>
</html>
