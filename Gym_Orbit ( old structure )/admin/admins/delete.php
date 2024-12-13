<?php
require_once '../../connection.php';

// Get the parameters from the URL
if (isset($_GET['email'], $_GET['admin_username'])) {
    $email = $_GET['email'];
    $admin_username = $_GET['admin_username'];
    $file_name=$_GET['file'];


    $sql = "DELETE FROM admin WHERE email = ? AND admin_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $admin_username); 
    $stmt->execute();


    $filePath = "../../admin/profile/images/". $file_name; 

    if (file_exists($filePath)) {
        unlink($filePath); 
    }

    

        header("Location: ../admin.PHP");
        exit();

}
    
?>
