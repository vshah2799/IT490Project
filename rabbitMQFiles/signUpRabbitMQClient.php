#!/usr/bin/php
//This sends signup info the signUpRabbitMQServer.php. server returns true if userID is unique and
//fields get added to the db
//Data goes in this order: userID, email, firstname, lastname, password, address, make, model, year, recallFixed, type
//TYPE IS EITHER "Signup" or "Update" -- case sensistive for type
//Enter "NULL" for all empty data
//recallFixed is either 0 or 1. 0 is False and 1 is True
<?php
require_once('/home/vshah/Desktop/IT490Project/path.inc');
require_once('/home/vshah/Desktop/IT490Project/get_host_info.inc');
require_once('/home/vshah/Desktop/IT490Project/rabbitMQLib.inc');


$client = new rabbitMQClient("loggingRabbitMQ.ini","testServer");
if (!isset($argv[5])){
    $errorString = "SIGNUP_PAGE_CLIENT: Not enough info \n";
    chdir("..");
    shell_exec("php loggingRabbitMQClient.php $errorString");
    print($errorString);
    die();
}


$request = array();
$request['type'] = $argv[11];
$request['userID'] = $argv[1];;
$request['email'] = $argv[2];
$request['fn'] = $argv[3];
$request['ln'] = $argv[4];
$request['password'] = $argv[5];
$request['address'] = $argv[6];
$request['make'] = $argv[7];
$request['model'] = $argv[8];
$request['year'] = $argv[9];
$request['recallFixed'] = $argv[10];

$response = $client->send_request($request);

print $response;
return $response;

