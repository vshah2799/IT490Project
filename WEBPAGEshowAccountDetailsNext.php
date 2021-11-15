<script>
    userName = sessionStorage.getItem('user');
    password = sessionStorage.getItem('pass');
    
    if(userName.length == 0 || password.length == 0){
        window.location.href = "WEBPAGEsignIn.php";
    }
</script>

<?php

$user = $_POST['user'];

$query = shell_exec("php RABBITMQshowUserDataRabbitMQClient.php \"$user\"");

//print ($query['userID']);
//print("Email: " . $query["email"]);
//print("Firstname: " . $query["firstName"]);
//print("Lastname: " . $query["lastName"]);
//print("Address: " . $query["address"]);
//print("Make: " . $query["make"]);
//print("Model: " . $query["model"]);
//print("Year: " . $query["year"]);
//if($query["recallFixed"] == 1){
//    print("Recall fixed: " . $recallFixed = "Yes");
//}else{
//    print("Recall fixed: " . $recallFixed = "No");
//}

print(var_dump($query));
?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width", initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Recalls Page</title>
</head>

<?php include 'WEBPAGEheader.php';?>

<body>

<a class="btn btn-primary" href="WEBPAGEupdateAccountDetails.php" role="button">Update Account Details</a>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>
</html>
