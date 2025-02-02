<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym_orbit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$date = $_POST['date'];
$color = $_POST['color'];
$gym_username=01;

// Update database
$sql = "INSERT INTO gym_schedule (gym_username , date , color) VALUES ('$gym_username','$date', '$color') 
        ON DUPLICATE KEY UPDATE color='$color'";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>
