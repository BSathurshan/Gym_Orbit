<?php
require_once '../../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get values from the form
    $gym_username = $_GET['gym_username'];
    $gym_name = $_GET['gym_name'];
    $name = $_GET['name'];
    $username = $_GET['username'];
    


    // Update the database
    $sql = " INSERT INTO connects_gym (username,gym_username,user_Name,gym_Name) VALUES(?,?,?,?) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss",$username, $gym_username ,$name,$gym_name ); 
    $stmt->execute();

    // Redirect back to the machines page
    header("Location: ../User.PHP");
    exit();
}
?>