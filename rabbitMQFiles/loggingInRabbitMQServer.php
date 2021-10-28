#!/usr/bin/php
//This returns true if the userID and Password are correct and false if not

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
    echo "Connected successfully\n";
//******************************************************************************************/

	
    
    
  if(!$request['type'] == 'Login')
  {
    return "ERROR: unsupported message type\n";
  }
    $userID = $request['userID'];
    $password = $request['password'];
    $sql = "SELECT * FROM users WHERE (userID = '$userID' and password = '$password')";
	
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) == 1){
	print("Got data, success");
    }else{
	return false;
    }
    
    mysqli_close($conn);

    return true;
}


$server = new rabbitMQServer("loggingRabbitMQ.ini","testServer");


$server->process_requests('requestProcessor');
exit();

?>

