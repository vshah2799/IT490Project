<!DOCTYPE html>

	<html>
		<head>

			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		</head>

		<body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">OOOREO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">


      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="WEBPAGErecalls.php">Check Recall</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="WEBPAGEthread.php">Forums</a>
	    </li>
          <li class="nav-item">
              <a class="nav-link" href="WEBPAGEmarket.php">Marketplace</a>
          </li>
	    <li class="nav-item">
          <a class="nav-link" href="WEBPAGEsignUp.php">Sign In/Sign Up</a>
        </li>
          <li class="nav-item">
              <a class="nav-link" href="WEBPAGEshowAccountDetails.php">Account</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="WEBPAGElogout.php">Logout</a>
          </li>


      </ul>
    </div>
  </div>
</nav>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



<script>

	if(sessionStorage.getItem('user')>0 || sessionStorage.getItem('pass')>0){
	}else{
	   sessionStorage.setItem('user', '');
	   sessionStorage.setItem('pass', '');
	}
   
</script>




        </body>
