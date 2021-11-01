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
    $sql = "SELECT password FROM users WHERE (userID = '$userID')";
	
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) == 1){
	print("Got data, success");
    }else{
	return false;
    }
    
    mysqli_close($conn);
    
    $hashedPassword = mysqli_fetch_assoc($results);


    if(password_verify($password, $hashedPassword['password'])){
	    return true;
    }
    return false;
}


$server = new rabbitMQServer("loggingRabbitMQ.ini","testServer");


$server->process_requests('requestProcessor');
exit();

?>

