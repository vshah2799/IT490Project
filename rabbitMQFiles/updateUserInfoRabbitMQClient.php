<?php
require_once('/home/vshah/Desktop/IT490Project/path.inc');
require_once('/home/vshah/Desktop/IT490Project/get_host_info.inc');
require_once('/home/vshah/Desktop/IT490Project/rabbitMQLib.inc');


$client = new rabbitMQClient("loggingRabbitMQ.ini","testServer");
if (!isset($argv[1])){
    $errorString = "SIGNUP_PAGE_CLIENT: Not enough info";
    chdir("..");
    shell_exec("php loggingRabbitMQClient.php \"$errorString\"");
    return $errorString;
}

$request = array();
$request['userID'] = $argv[1];;
$request['email'] = $argv[2];
$request['fn'] = $argv[3];
$request['ln'] = $argv[4];
$request['address'] = $argv[5];
$request['make'] = $argv[6];
$request['model'] = $argv[7];
$request['year'] = $argv[8];
$request['recallFixed'] = $argv[9];

$response = $client->send_request($request);

print $response;
return $response;