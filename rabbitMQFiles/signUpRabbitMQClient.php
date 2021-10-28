#!/usr/bin/php
//This sends signup info the signUpRabbitMQServer.php. server returns true if userID is unique and
//fields get added to the db
//Leave empty strings for the empty fields
//Data goes in this order: userID, email, firstname, lastname, password, address, make, model, year
<?php
require_once('/home/vshah/Desktop/IT490Project/path.inc');
require_once('/home/vshah/Desktop/IT490Project/get_host_info.inc');
require_once('/home/vshah/Desktop/IT490Project/rabbitMQLib.inc');


$client = new rabbitMQClient("loggingRabbitMQ.ini","testServer");
if (!isset($argv[1])){
    print("NOT ENOUGH INFO\n");
    die();
}


$request = array();
$request['type'] = "Signup";
$request['userID'] = $argv[1];
$request['password'] = $argv[5] ;
$request['email'] = $argv[2];
$request['fn'] = $argv[3];
$request['ln'] = $argv[4];
$request['address'] = $argv[6];
$request['make'] = $argv[7];
$request['model'] = $argv[8];
$request['year'] = $argv[9];


//$response = $client->send_request($request);

print $request[0];

