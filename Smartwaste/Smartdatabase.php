<?php
// Define database connection variable

$host = "localhost"; // Host name
$username = "root"; // MySQL username
$password = 'j0hnM@1n@1'; // MySQL password
$dbname = "smartwaste"; // Database name

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>