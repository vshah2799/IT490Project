<?php
require_once('/home/vshah/Desktop/IT490Project/path.inc');
require_once('/home/vshah/Desktop/IT490Project/get_host_info.inc');
require_once('/home/vshah/Desktop/IT490Project/rabbitMQLib.inc');

class projectRabbitMQServer
{

    public function loggingIn(){
        $server = new rabbitMQServer("loggingRabbitMQ.ini","testServer");
        $server->process_requests('requestProcessor');

    }
}