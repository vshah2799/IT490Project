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

    if($request['type'] == "Market1"){
        $carName = $request['carName'];
        $carDesc = $request['carDesc'];
        $dealer  = $request['dealer'];
        $contact = $request['contact'];
        $insertStmt = $conn->prepare("INSERT INTO carsells (carName, carDesc, ownerName, contactInfo) VALUES (?, ?, ?, ?)");
        $insertStmt->bind_param("ssss", $carName,$carDesc,$dealer,$contact );
        return $insertStmt->execute();

    }elseif ($request['type'] == "Market2"){
        $sql = "SELECT * FROM carsells";
        return mysqli_query($conn, $sql);
    }

    return false;
}

$server = new rabbitMQServer("marketRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();
?>

