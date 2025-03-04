<?php
// models/db_connection.php
$host = "localhost";
$dbname = "gym_orbit";
$username = "root";  // Change this if needed
$password = "";  // Set your MySQL password

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
