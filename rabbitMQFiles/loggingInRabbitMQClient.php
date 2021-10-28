#!/usr/bin/php
<?php
require_once('/home/vshah/Desktop/IT490Project/path.inc');
require_once('/home/vshah/Desktop/IT490Project/get_host_info.inc');
require_once('/home/vshah/Desktop/IT490Project/rabbitMQLib.inc');


$client = new rabbitMQClient("loggingInRabbitMQ.ini","testServer");
if (isset($argv[2])) {
  $userID = $argv[1];
  $password = $argv[2];
}
else{
  $msg = "NOT ENOUGH INFO";
  die();
}

$request = array();
$request['type'] = "Login";
$request['userID'] = $userID;
$request['password'] = $password;

$response = $client->send_request($request);
//$response = $client->publish($request);

print $response;