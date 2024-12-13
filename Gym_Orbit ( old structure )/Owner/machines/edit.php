<?php
require_once '../../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $gym_username = $_POST['gym_username'];
    
    $old_name = $_POST['old_name'];
    $old_file = $_POST['old_file'];

    $new_name = $_POST['name'];
    $file = $_FILES['file']; // For file upload
    

    // Handle file upload (if a new file is uploaded)
    if ($file && $file['error'] == 0) {

        $file_name = $_FILES['file']['name']; 

        $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        
        $file_name =$newImageName;
        $targetFile = "./images/$newImageName";
        $deleteOld  = "./images/$old_file";
     
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            
            if (file_exists($deleteOld)) {
                unlink($deleteOld); 
            }
            
        } else {
       
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {

        $file_name = $_POST['old_file']; 
        $new_name = $_POST['name']; 
    }

    // Update the database
    $sql = "UPDATE machines SET name = ?, file = ? WHERE name = ? AND gym_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $new_name, $file_name, $old_name, $gym_username); 
    $stmt->execute();

    // Redirect back to the machines page
    header("Location: ../Owner.PHP");
    exit();
}
?>
