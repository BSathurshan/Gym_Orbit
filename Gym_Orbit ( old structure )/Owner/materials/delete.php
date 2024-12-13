<?php
require_once '../../connection.php';

// Get the parameters from the URL
if (isset($_GET['id'], $_GET['gym_username'])) {
    $id = $_GET['id'];
    $file_name=$_GET['file'];
    $gym_username = $_GET['gym_username'];
    $access = $_GET['access'];

    // SQL to delete the machine record based on the 'name' field
    $sql = "DELETE FROM materials WHERE id = ? AND gym_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $id, $gym_username); 
    $stmt->execute();


    $filePath = "./images/". $file_name; 

    if (file_exists($filePath)) {
        unlink($filePath); 
    }

    
    if($access=='admin'){

        header("Location: ../../../../admin/admin.PHP");
        exit();

    }else{
        header("Location: ../Owner.PHP");
        exit();

    }

}
    
?>
