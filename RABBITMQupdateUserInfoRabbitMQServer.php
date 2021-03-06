#!/usr/bin/php
//Returns true if account gets added and false if it cannot be added
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


function requestProcessor($request)
{
    $servername = "localhost";
    $username = "test";
    $dbPassword = "";
    $db = "projectDB";
//DB Connection*****************************************************************************/
    $conn = mysqli_connect($servername, $username, $dbPassword, $db);
// Check connection
    if (!$conn) {
        $errorString = "SIGNUP_PAGE_SERVER: Connection failed: " . mysqli_connect_error();
        shell_exec("php  RABBITMQloggingRabbitMQClient.php \"$errorString\"");
        print($errorString);
        die();

    }
    echo "Connected successfully\n";
//******************************************************************************************/

    $userID = $request['userID'];
    $email = $request['email'];
    $fn = $request['fn'];
    $ln = $request['ln'];
    $address = $request['address'];
    $make = $request['make'];
    $model = $request['model'];
    $year = $request['year'];
    $recallFixed = $request['recallFixed'];

    print("Got to geting info that's already there");
    print($userID);
    $selctStmt = "SELECT * FROM users WHERE userID = '$userID'";

    $result = $conn->query($selctStmt);
    $selectArray = $result->fetch_assoc();

    if(empty($email)){
        $email = $selectArray['email'];
    }if(empty($fn)){
        $fn = $selectArray['firstname'];
    }if(empty($ln)){
        $ln = $selectArray['lastname'];
    }if(empty($address)){
        $address = $selectArray['address'];
    }if(empty($make)){
        $make = $selectArray['make'];
    }if(empty($model)){
        $model = $selectArray['model'];
    }if(empty($year)){
        $year = $selectArray['year'];
    }if(empty($recallFixed)){
        $recallFixed = $selectArray['recallFixed'];
    }else{
        $recallFixed = 1;
    }
    
    print("$email \n");
    print("$fn \n");
    print("$ln \n");
    print("$address \n");
    print("$make \n");
    print("$model \n");
    print("$year \n");
    print("$recallFixed \n");
    print("$userID \n");
    

    $insertStmt = $conn->prepare("UPDATE users SET email = ?, firstName = ?, lastName = ?, address = ?, make = ?, model = ?, year = ?, recallFixed = ? WHERE userID = ?");
    $insertStmt->bind_param("ssssssiis",  $email, $fn, $ln, $address, $make, $model, $year, $recallFixed, $userID );

    if($insertStmt->execute()){
        print("Statement executed");
        $insertStmt->close();
        $conn->close();
        return true;
    }
    
    $insertStmt->close();
    $conn->close();

    return false;
}


$server = new rabbitMQServer("RABBITMQupdateUserInfoRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();

?>
