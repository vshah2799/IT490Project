<?php
require_once('/home/vshah/Desktop/IT490Project/path.inc');
require_once('/home/vshah/Desktop/IT490Project/get_host_info.inc');
require_once('/home/vshah/Desktop/IT490Project/rabbitMQLib.inc');


$client = new rabbitMQClient("threadRabbitMQ.ini", "testServer");

$request = array();
if($argv[1] == "Thread1"){
    $request['ID'] = $argv[2];;
    $request['type'] = "Thread1";
}elseif ($argv[1] == "Thread2"){
    $request['type'] = "Thread2";
    $request['ID'] = $argv[2];
    $request['comm'] = $argv[3];
}elseif($argv[1] == "Thread3"){
    $request['type'] = "Thread3";
    $request['ID'] = $argv[2];
}


$response = $client->send_request($request);

var_dump($response);
return $response;
