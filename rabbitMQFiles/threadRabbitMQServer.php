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

    if($request['type'] == "Thread1"){
        $threadID = $request['ID'];

        $selectStmt = $conn->prepare("SELECT * FROM threads WHERE threadID= ?");
        $selectStmt->bind_param("i", $threadID);
        $selectStmt->execute();
        print("Got to getting threads from threadIDs\n");
        $result = $selectStmt->get_result();
        $resultArray = $result->fetch_assoc();

        $selectStmt->close();
        $conn->close();

        return $resultArray;
    }elseif ($request['type'] == "Thread2"){
        $id = $request['ID'];
        $comm = $request['comm'];

        $insertStmt = $conn->prepare("INSERT INTO replies (content, threadID, commentUserID, timeStamp) VALUES (?, ?, 3123, current_timestamp())");
        $insertStmt->bind_param("si", $comm, $id );
        $insertStmt->execute();
        return true;
    }elseif ($request['type'] == "Thread3"){
        $id = $request['ID'];
        $sql = "SELECT * FROM replies WHERE threadID = '$id'";
        return mysqli_query($conn, $sql);
    }elseif ($request['type'] = "Thread4"){
        $titleTopic = $request['titleTopic'];
        $tDesc = $request['tDesc'];

        $insertStmt = $conn->prepare("INSERT INTO threads (topic, threadDesc, threadUserID, timeStamp) VALUES (?, ?, 0, current_timestamp())");
        $insertStmt->bind_param("ss", $titleTopic, $tDesc);
        $insertStmt->execute();
        return true;
    }elseif($request['type'] == "Thread5"){
        $sql = "SELECT * FROM threads";
        return mysqli_query($conn, $sql);
    }

    return false;
}

$server = new rabbitMQServer("threadRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();
?>

