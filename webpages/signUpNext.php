<!DOCTYPE html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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


<a class="btn btn-primary" href="recalls.php" role="button">Check another car</a>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>


<?php

!empty($_POST['username']) ? $username = $_POST['username'] : $username = NULL;
!empty($_POST['email']) ? $email = $_POST['email'] : $email = NULL;
!empty($_POST['firstname']) ? $firstname = $_POST['firstname'] : $firstname = NULL;
!empty($_POST['lastname']) ? $lastname = $_POST['lastname'] : $lastname = NULL;
!empty($_POST['password']) ? $password = $_POST['password'] : $password = NULL;
!empty($_POST['address']) ? $address = $_POST['address'] : $address = NULL;
!empty($_POST['make']) ? $make = $_POST['make'] : $make = NULL;
!empty($_POST['model']) ? $model = $_POST['model'] : $model = NULL;
!empty($_POST['year']) ? $year = $_POST['year'] : $year = NULL;
!empty($_POST['recallFixed']) ? $recallFixed = $_POST['recallFixed'] : $recallFixed = false;


$query = shell_exec("php ../rabbitMQFiles/recallPageRabbitMQClient.php $username $email $firstname $lastname $password $address $make $model $year $recallFixed");

if($query){
    echo "Success. You have signed up! NOW GO LOGIN!!";
}else{
    echo "Sign Up failed";
}

