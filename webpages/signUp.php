<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width", initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Recalls Page</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Ooreo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recalls.php">Check Recall</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="thread.php">Forums</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="market.php">Marketplace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signIn.php">Account</a>
                </li>


            </ul>
        </div>
    </div>
</nav>

<body>

<div class="container-lg">
    <form class="row g-3" method="post" action="signUpNext.php">
        <div class="col-md-4">
            <label for="make" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Firstname</label>
            <input type="text" class="form-control" id="firstname" name="firstname"  aria-describedby="inputGroupPrepend2" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname"  aria-describedby="inputGroupPrepend2" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password"  aria-describedby="inputGroupPrepend2" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address"  aria-describedby="inputGroupPrepend2" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Make</label>
            <input type="text" class="form-control" id="make" name="make"  aria-describedby="inputGroupPrepend2">
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Model</label>
            <input type="text" class="form-control" id="model" name="model"  aria-describedby="inputGroupPrepend2">
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Year</label>
            <input type="text" class="form-control" id="year" name="year"  aria-describedby="inputGroupPrepend2">
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Is your car's recall issue fixed? ENTER "true" OR "false" without the quotes</label>
            <input type="text" class="form-control" id="recallFixed" name="recallFixed"  aria-describedby="inputGroupPrepend2">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
