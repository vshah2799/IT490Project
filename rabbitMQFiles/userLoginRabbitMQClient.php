#!/usr/bin/php
//This sends the userID and password to loggingInRabbitMQServer.php. userID goes first then password
//Example on command line: php loggingInRabbitMQClient.php test 123456789
//Password hash is checked in the server file
<?php
require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');


$client = new rabbitMQClient("loggingRabbitMQ.ini","testServer");
if (isset($argv[2])) {
  $userID = $argv[1];
  $password = $argv[2];
}
else{
  $errorString = "USER_LOGIN_PAGE_CLIENT: Not enough info";
  shell_exec("php  ~/Desktop/IT490Project/loggingRabbitMQClient.php \"$errorString\"");
  return $errorString;
}

$request = array();
$request['userID'] = $userID;
$request['password'] = $password;

$response = $client->send_request($request);
print($response);
return ($response);


