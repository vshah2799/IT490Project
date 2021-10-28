#!/usr/bin/php
<?php

chdir(getcwd());
shell_exec("php testRabbitMQClient.php " . " \"Hello World\" ");

