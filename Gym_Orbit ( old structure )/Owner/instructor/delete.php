<?php
require_once '../../connection.php';

// Get the parameters from the URL
if (isset($_GET['email'], $_GET['trainer_username'])) {
    $email = $_GET['email'];
    $trainer_username = $_GET['trainer_username'];
    $file_name=$_GET['file'];


    $sql = "DELETE FROM instructors WHERE email = ? AND trainer_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $trainer_username); 
    $stmt->execute();


    $filePath = "../../instructor/profile/images/". $file_name; 

    if (file_exists($filePath)) {
        unlink($filePath); 
    }

    

        header("Location: ../Owner.PHP");
        exit();

}
    
?>
