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

$sql = "SELECT * FROM users WHERE (userID = 'Vishal')";

if (mysqli_query($conn, $sql)) {
    echo "Query Success";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
