#!/usr/bin/php
//This returns true if the userID and Password are correct and false if not
//Password hash gets checked as well

<?php
require_once('/home/vshah/Desktop/IT490Project/path.inc');
require_once('/home/vshah/Desktop/IT490Project/get_host_info.inc');
require_once('/home/vshah/Desktop/IT490Project/rabbitMQLib.inc');


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

    $errorString = "USER_LOGIN_PAGE_SERVER: Connection failed: " . mysqli_connect_error();
    chdir("..");
    shell_exec("php loggingRabbitMQClient.php \"$errorString\"");
    print($errorString);
    die();
    }
    echo "Connected successfully\n";
//******************************************************************************************/

    $userID = $request['userID'];
    $password = $request['password'];

    $selectStmt = $conn->prepare("SELECT password FROM users WHERE (userID = ?)");
    $selectStmt->bind_param("s", $userID);
    $selectStmt->execute();
    $result = $selectStmt->get_result();
    $passwordText = $result->fetch_assoc();

    if(!empty($passwordText)){
        if(password_verify($password, $passwordText['password'])){
            return true;
        }
    }
    print("USE NOT VERIFIED");
    return false;

}

$server = new rabbitMQServer("loggingRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();
?>

