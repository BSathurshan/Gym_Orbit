<?php
require_once '../../connection.php';

// Get the parameters from the URL
if (isset($_GET['gym_username'], $_GET['email'])) {
  
    $email = $_GET['email'];
    $gym_username = $_GET['gym_username'];
    $file_name=$_GET['file'];

    // SQL to delete the machine record based on the 'name' field
    $sql = "DELETE FROM gym WHERE gym_username = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",  $gym_username,$email); 
    $stmt->execute();


    $filePath = "../../Owner/profile/images/". $file_name; 

    if (file_exists($filePath)) {
        unlink($filePath); 
    }

        header("Location: ../admin.PHP");
        exit();


}
    


?>
