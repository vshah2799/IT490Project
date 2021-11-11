<!DOCTYPE html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Ooreo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
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
                    <a class="nav-link" href="WEBPAGEsignIn.php">Account</a>
                </li>


            </ul>
        </div>
    </div>
</nav>
<body>


<a class="btn btn-primary" href="WEBPAGErecalls.php" role="button">Check another car</a>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>


<?php
$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];


$recallText = shell_exec("php RABBITMQrecallPageRabbitMQClient.php $make $model $year");

print($recallText);

