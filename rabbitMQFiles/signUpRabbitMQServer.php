#!/usr/bin/php
//Returns true if account gets added and false if it cannot be added
<?php
require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');


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
    shell_exec("php  ~/Desktop/IT490Project/loggingRabbitMQClient.php \"$errorString\"");
    print($errorString);
    die();

    }
    echo "Connected successfully\n";
//******************************************************************************************/

    $userID = $request['userID'];
    $email = $request['email'];
    $fn = $request['fn'];
    $ln = $request['ln'];
    $password = password_hash($request['password'], PASSWORD_DEFAULT); 
    $address = $request['address'];
    $make = $request['make'];
    $model = $request['model'];
    $year = $request['year'];
    $recallFixed = $request['recallFixed'];

    $selectStmt = $conn->prepare("SELECT * FROM users WHERE (userID = ? and password = ?)");
    $selectStmt->bind_param("ss", $userID, $password);
    $selectStmt->execute();
    print("Got to checking if user already there\n");
    mysqli_stmt_store_result($selectStmt);
    if(mysqli_stmt_num_rows($selectStmt) >= 1){
        return false;
    }

    $insertStmt = $conn->prepare("INSERT INTO users (userID, email, firstname, lastname, password, address, make, model, year, recallFixed) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertStmt->bind_param("ssssssssii", $userID, $email, $fn, $ln, $password, $address, $make, $model, $year, $recallFixed );

    if($insertStmt->execute()){
	print("Statement executed");
	$selectStmt->close();
    	$insertStmt->close();
    	$conn->close();
        return true;
    }
    $selectStmt->close();
    $insertStmt->close();
    $conn->close();

    return false;

}


$server = new rabbitMQServer("loggingRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();

?>

