#!/usr/bin/php
//Returns true if account gets added and false if it cannot be added
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

    $errorString = "SIGNUP_PAGE_SERVER: Connection failed: " . mysqli_connect_error();
    chdir("..");
    shell_exec("php loggingRabbitMQClient.php $errorString");
    print($errorString);
    die();

    }
    echo "Connected successfully\n";
//******************************************************************************************/

    if(!$request['type'] == 'Signup')
    {

    $errorString = "SIGNUP_PAGE_SERVER: Unsupported reuest type ";
    chdir("..");
    shell_exec("php loggingRabbitMQClient.php $errorString");
    print($errorString);
    die();
    }
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

    // prepare and bind

    $selectStmt = $conn->prepare("SELECT * FROM users WHERE (userID = ? and password = ?)");
    $selectStmt->bind_param("ss", $userID, $password);
    $selectStmt->execute();
    print("Got to checking if user already there");
    mysqli_stmt_store_result($selectStmt);
    if(mysqli_stmt_num_rows($selectStmt) >= 1){
        return false;
    }



    $insertStmt = $conn->prepare("INSERT INTO users (userID, email, firstname, lastname, password, address, make, model, year, recallFixed) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertStmt->bind_param("ssssssssii", $userID, $email, $fn, $ln, $password, $address, $make, $model, $year, $recallFixed );

    if($insertStmt->execute()){
        return true;
    }
    $selectStmt->close();
    $insertStmt->close();
    $conn->close();

    return false;



    /* Working MYSQL Code
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
    */

}


$server = new rabbitMQServer("loggingRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();

?>

