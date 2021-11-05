//Returns recall info as a string
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
	   
    $errorString = "RECALL_PAGE_SERVER: Connection failed: " . mysqli_connect_error();
    chdir("..");
    shell_exec("php loggingRabbitMQClient.php \"$errorString\"");
    print($errorString);
    die();
    }
    echo "Connected successfully\n";
//******************************************************************************************/

  $make = $request['make'];
  $model = $request['model'];
  $year = $request['year'];

  $selectStmt = $conn->prepare("SELECT recallText FROM carRecalls WHERE (make = ? and model = ? and year = ?)");
  $selectStmt->bind_param("ssi", $make, $model, $year);
  $selectStmt->execute();
  $result = $selectStmt->get_result();
  $recallText = $result->fetch_assoc();

  if(!empty($recallText)){
      return $recallText['recallText'];
  }
  return "No recall found";

}

$server = new rabbitMQServer("loggingRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

