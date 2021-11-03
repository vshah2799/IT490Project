#!/usr/bin/php
//This sends recall information for a car. Need make, model, and yer
//Data goes in this order: make model year
//Example call from command line: php recallPageRabbitMQClient.php make model year
<?php
require_once('/home/vshah/Desktop/IT490Project/path.inc');
require_once('/home/vshah/Desktop/IT490Project/get_host_info.inc');
require_once('/home/vshah/Desktop/IT490Project/rabbitMQLib.inc');


$client = new rabbitMQClient("loggingRabbitMQ.ini","testServer");
if (!isset($argv[3])){

    $errorString = "RECALL_PAGE_CLIENT: Not enough info";
    chdir("..");
    shell_exec("php loggingRabbitMQClient.php \"$errorString\"");
    print($errorString);
    die();
}


$request = array();
$request['type'] = "Recall";
$request['make'] = $argv[1];
$request['model'] = $argv[2];
$request['year'] = $argv[3];


$response = $client->send_request($request);

print $response;
return $repsonse;

