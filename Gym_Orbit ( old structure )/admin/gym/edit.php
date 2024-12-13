<?php
require_once '../../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $old_email = $_POST['old_email'];
    $old_username = $_POST['old_username'];


    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $name = $_POST['name'];
    $contact =(int) $_POST['contact'];
    $location = $_POST['location'];




    // Update the database
    $sql = "UPDATE user SET username =? ,email =? ,name = ? ,location = ? , contact = ? WHERE email = ? AND username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $new_username, $new_email, $name, $location, $contact, $old_email, $old_username); 
    $stmt->execute();

    // Redirect back to the machines page
    header("Location: ../admin.PHP");
    exit();
}
?>
