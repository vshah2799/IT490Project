<?php

$test = shell_exec("php ../rabbitMQFiles/recallPageRabbitMQClient.php MCI J4500 2001");
//$test = require_once("../rabbitMQFiles/recallPageRabbitMQClient.php MCI J4500 2001");
print($test);

