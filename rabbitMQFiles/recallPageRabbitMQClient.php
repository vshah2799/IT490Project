#!/usr/bin/php
<?php
require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');
//This sends recall information for a car. Need make, model, and yer
//Data goes in this order: make model year
//Example call from command line: php recallPageRabbitMQClient.php make model year

$client = new rabbitMQClient("recallRabbitMQ.ini","testServer");
if (!isset($argv[3])){

    $errorString = "RECALL_PAGE_CLIENT: Not enough info";
    shell_exec("php  ../loggingRabbitMQClient.php \"$errorString\"");
    return $errorString;
}


$request = array();
$request['make'] = $argv[1];
$request['model'] = $argv[2];
$request['year'] = $argv[3];


$response = $client->send_request($request);

print $response;
return $response;

