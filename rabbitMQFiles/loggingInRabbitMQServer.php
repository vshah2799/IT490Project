#!/usr/bin/php
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
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
//******************************************************************************************/

  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
    $userID = $request['userID'];
    $password = $request['password'];
    $sql = "SELECT FROM users (userID, password)
            WHERE (userID = $userID and password = $password)";

    try{
        (mysqli_query($conn, $sql));
        echo "Data retrieved successfully";
    }catch(Exception $e){
        return $e;
    }

    mysqli_close($conn);

    return array("$userID and $password are good" );
}

$server = new rabbitMQServer("loggingRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();

?>

