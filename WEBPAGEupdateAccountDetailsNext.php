<!DOCTYPE html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php include 'WEBPAGEheader.php';?>
<body>


<a class="btn btn-primary" href="WEBPAGErecalls.php" role="button">Check another car</a>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">

</script>
</body>


<?php
$username = $_POST['username'];
!empty($_POST['email']) ? $email = $_POST['email'] : $email = NULL;
!empty($_POST['firstname']) ? $firstname = $_POST['firstname'] : $firstname = NULL;
!empty($_POST['lastname']) ? $lastname = $_POST['lastname'] : $lastname = NULL;
!empty($_POST['address']) ? $address = $_POST['address'] : $address = NULL;
!empty($_POST['make']) ? $make = $_POST['make'] : $make = NULL;
!empty($_POST['model']) ? $model = $_POST['model'] : $model = NULL;
!empty($_POST['year']) ? $year = $_POST['year'] : $year = NULL;
!empty($_POST['recallFixed']) ? $recallFixed = $_POST['recallFixed'] : $recallFixed = false;


$query = shell_exec("php RABBITMQupdateUserInfoRabbitMQClient.php $username $email $firstname $lastname $address $make $model $year $recallFixed");

if($query){
    echo "Success. You updated your account details";
}else{
    echo "Update details failed";
}

