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
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully\n";
//******************************************************************************************/

  if(!($request['type'] == 'Recall'))
  {
    return "ERROR: unsupported message type";
  }

  $make = $request['make'];
  $model = $request['model'];
  $year = $request['year'];

  $sql = "SELECT recallText FROM carRecalls WHERE (make = '$make' and model = '$model' and year = '$year')";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
	  $row = mysqli_fetch_assoc($result);
	  return $row['recallText'];

  } else {
      return "No recalls found";
  }

}

$server = new rabbitMQServer("loggingRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

