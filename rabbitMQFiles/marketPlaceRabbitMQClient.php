<?php
require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');


$client = new rabbitMQClient("marketRabbitMQ.ini", "testServer");

$request = array();
if($argv[1] == "Market1"){
    $request['carName'] = $argv[2];
    $request['carDesc'] = $argv[3];
    $request['dealer'] =  $argv[4];
    $request['contact'] = $argv[5];
    $request['type'] = "Market1";

}elseif ($argv[1] == "Market2"){
    $request['type'] = "Market2";
}elseif ($argv[1] == "Market3"){
    $request['type'] = "Market3";
    $request['carID'] = $argv[2];
}

$response = $client->send_request($request);

var_dump($response);
return $response;
