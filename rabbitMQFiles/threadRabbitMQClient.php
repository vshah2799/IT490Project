<?php
require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');


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
}elseif ($argv[1] == "Thread4"){
    $request['type'] = "Thread4";
    $request['titleTopic'] = $argv[2];
    $request['tDesc'] = $argc[3];
}elseif ($argc[1] == 'Thread5'){
    $request['type'] = "Thread5";
}


$response = $client->send_request($request);

var_dump($response);
return $response;
