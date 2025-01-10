<?php
$servername = "127.0.0.1";
$username = "abdanio";
$password = "abdanio123*#";
$dbname = "biodata";
$port = 3306;
$timeout = 10; // Timeout in seconds

// Create connection
$conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname, port: $port);
$conn->options(option: MYSQLI_OPT_CONNECT_TIMEOUT, value: $timeout);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>