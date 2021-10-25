#!/usr/bin/php
<?php

//chdir(getcwd());
print(getcwd());
shell_exec("php testRabbitMQClient.php " . " \"Hello World\" ");

