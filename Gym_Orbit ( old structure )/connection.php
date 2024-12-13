<?php
// Database credentials
$host = 'localhost';      // or your database server (e.g., 127.0.0.1)
$username = 'root';       // Your database username
$password = '';           // Your database password (empty by default on localhost)
$dbname = 'gym_orbit'; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
