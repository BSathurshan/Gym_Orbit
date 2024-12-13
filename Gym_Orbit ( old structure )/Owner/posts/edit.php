<?php
require_once '../../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $gym_username = $_POST['gym_username'];
    $id =  $_POST['id'];
    
    $title = $_POST['title'];
    $details = $_POST['details'];

    $file = $_FILES['file']; 
    $file_name = $_POST['old_file_name'];
    $access=$_POST['access'];

    // Handle file upload (if a new file is uploaded)
    if ($file && $file['error'] == 0) {

        $old_file=$file_name;
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
    }

    // Update the database
    $sql = "UPDATE posts SET title = ?, file = ? , details= ? WHERE id= ? AND gym_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $title, $file_name, $details, $id, $gym_username); 
    $stmt->execute();

    // Redirect 
    if($access=='admin'){

        header("Location: ../../../../admin/admin.PHP");
        exit();

    }else{
        header("Location: ../Owner.PHP");
        exit();

    }
}
?>
