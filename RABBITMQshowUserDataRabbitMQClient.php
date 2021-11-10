<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


$client = new rabbitMQClient("RABBITMQshowUserDataRabbitMQ.ini", "testServer");
if (!isset($argv[1])) {
    $errorString = "SIGNUP_PAGE_CLIENT: Not enough info";
    chdir("..");
    shell_exec("php RABBITMQloggingRabbitMQClient.php \"$errorString\"");
    return $errorString;
}


$request = array();
$request['userID'] = $argv[1];;

$response = $client->send_request($request);

var_dump($response);
return $response;