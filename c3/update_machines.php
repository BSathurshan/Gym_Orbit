<?php
// update_machines.php

// Get the raw POST data
$data = file_get_contents("php://input");

// Decode the JSON data
$data = json_decode($data, true);

// Check if the data is valid
if ($data === null) {
    die("Error decoding JSON data.");
}

if (!isset($data['availability'])) {
    die("Availability data not found in the request.");
}

// Extract the availability data
$availabilityData = $data['availability'];

// Check if availability data is an array
if (!is_array($availabilityData)) {
    die("Availability data is not an array.");
}

// Connect to the database
$conn = new mysqli("localhost", "root", "", "gym_orbit");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the availability for each machine
foreach ($availabilityData as $machineName => $availability) {
    // Ensure to use the correct gym_username, dynamically or hardcoded (like '01')
    $sql = "UPDATE machines SET available = ? WHERE name = ? AND gym_username = '01'"; // Modify the gym_username as needed
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $availability, $machineName); // Bind the parameters (availability and machine name)
    $stmt->execute();
}

// Close the connection
$conn->close();

// Respond with a success message
echo json_encode(["status" => "success", "message" => "Availability updated successfully"]);

?>
