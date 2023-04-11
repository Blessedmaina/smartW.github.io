<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "smartwaste";

// Create connection
$mysqli = new mysqli($host, $user, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
