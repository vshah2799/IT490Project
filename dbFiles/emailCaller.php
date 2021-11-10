<?php

$servername = "localhost";
$username = "test";
$password = "";
$db = "projectDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


$sql = "SELECT * FROM users WHERE (recallFixed = 0)";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {


	$temp = $row["email"];
	print($temp);
        echo shell_exec("php ~/Desktop/IT490Project/dbFiles/email.php $temp" );
    }
} else {
    $errorString = "EMAIL_CALLER: No emails sent \n";
    shell_exec("php ~/Desktop/IT490Project/RABBITMQloggingRabbitMQClient.php $errorString");
}

mysqli_close($conn);
