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

        chdir(getcwd());
        $temp = $row["recallFixed"];
        shell_exec("php email.php $temp" );
    }
} else {
    echo "0 results";
}

mysqli_close($conn);