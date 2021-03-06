#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    return true;
    //return false if not valid
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
  }

  $fp = fopen('logFileUserCreated', 'a');
  fwrite($fp, $request['message'] . " \r\n");
  fclose($fp);

  ##return array("returnCode" => '0', 'message'=>"TESTTTTTTTTTTTServer received request and processed");
  return ("Hello world");
}

$server = new rabbitMQServer("RABBITMQloggingRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

