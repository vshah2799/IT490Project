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
    echo "Connected successfully\n";
//******************************************************************************************/

    if(!$request['type'] == 'Signup')
    {
        return "ERROR: unsupported message type\n";
    }
    $userID = $request['userID'];
    $email = $request['email'];
    $fn = $request['fn'];
    $ln = $request['ln'];
    $password = $request['password'];
    $address = $request['address'];
    $make = $request['make'];
    $model = $request['model'];
    $year = $request['year'];
    $recallFixed = $request['recallFixed'];
    $sql = "SELECT * FROM users WHERE (userID = '$userID' and password = '$password')";
	print("Got to checking if user already there");
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) >= 1){
        return false;
    }
print("Got to insterting data");
    $sqlInsert = "INSERT INTO users (userID, email, firstname, lastname, password, address, make, model, year, recallFixed) VALUES ('$userID', '$email', '$fn', '$ln', '$password', '$address', '$make', '$model', $year, $recallFixed)";
  
    if(mysqli_query($conn, $sqlInsert)){
	    return true;
    }else{
	    return false;
    }
  
    
}


$server = new rabbitMQServer("loggingRabbitMQ.ini","testServer");


$server->process_requests('requestProcessor');
exit();

?>

