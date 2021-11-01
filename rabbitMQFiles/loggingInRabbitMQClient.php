#!/usr/bin/php
//This sends the userID and password to loggingInRabbitMQServer.php. userID goes first then password
//Example on command line: php loggingInRabbitMQClient.php test 123456789
//Password hash is checked in the server file
<?php
require_once('/home/vshah/Desktop/IT490Project/path.inc');
require_once('/home/vshah/Desktop/IT490Project/get_host_info.inc');
require_once('/home/vshah/Desktop/IT490Project/rabbitMQLib.inc');


$client = new rabbitMQClient("loggingRabbitMQ.ini","testServer");
if (isset($argv[2])) {
  $userID = $argv[1];
  $password = $argv[2];
}
else{
  print("NOT ENOUGH INFO\n");
  die();
}

$request = array();
$request['type'] = "Login";
$request['userID'] = $userID;
$request['password'] = $password;


print ($client->send_request($request));


