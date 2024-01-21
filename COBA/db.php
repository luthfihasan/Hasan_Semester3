<?php
// Server configuration
$host = 'localhost'; // Server
$user = 'root';
$pass = '';
$database = 'crudphp'; // Database Name

// Establishing a database connection
$conn = mysqli_connect($host, $user, $pass, $database);

// Display an error message if the connection is not established
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
