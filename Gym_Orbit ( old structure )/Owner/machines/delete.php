<?php
require_once '../../connection.php';

// Get the parameters from the URL
if (isset($_GET['name'], $_GET['file'], $_GET['gym_username'])) {
    $name = $_GET['name'];
    $file = $_GET['file'];
    $gym_username = $_GET['gym_username'];

    // SQL to delete the machine record based on the 'name' field
    $sql = "DELETE FROM machines WHERE name = ? AND gym_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $gym_username); // "ss" for two strings
    $stmt->execute();


    // If the file exists, delete the file from the server
    $filePath = "./images/". $file; // Adjust the file path if needed

    if (file_exists($filePath)) {
        unlink($filePath); // Delete the file
    }

    // Redirect back to the machines page after deletion
    header("Location: ../Owner.PHP");
    exit();

}
    
?>
