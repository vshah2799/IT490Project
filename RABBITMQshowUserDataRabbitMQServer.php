#!/usr/bin/php
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

    $selectStmt = $conn->prepare("SELECT * FROM users WHERE (userID = ?)");
    $selectStmt->bind_param("s", $userID);
    $selectStmt->execute();
    print("Got user data\n");
    $result = $selectStmt->get_result();
    $showUserText = $result->fetch_assoc();
    $returnArray = array(
        "userID"     => $showUserText['userID'],
        "firstName"  => $showUserText['firstName'],
        "lastName"   => $showUserText['lastName'],
        "password"   => $showUserText['password'],
        "address"    => $showUserText['address'],
        "make"       => $showUserText['make'],
        "model"      => $showUserText['model'],
        "year"       => $showUserText['year'],
        "recallFixed" => $showUserText['recallFixed']
    );

    $selectStmt->close();
    $conn->close();

    return $returnArray;

}


$server = new rabbitMQServer("RABBITMQshowUserDataRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();

?>
