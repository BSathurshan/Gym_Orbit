<?php
require_once '../../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $gym_username = $_POST['gym_username'];
    $name = $_POST['name'];
    $file = $_FILES['file'];
    $file_name=NULL;

    $sql = "SELECT * FROM machines  WHERE name = ? AND gym_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $gym_username); 
    $stmt->execute(); 

    $resultRequested = $stmt->get_result();

    if ($resultRequested->num_rows == 0) {

    if ($file && $file['error'] == 0) {

        $tmpName=$file["tmp_name"];
        $file_name=$file["name"];

        $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        $file_name =$newImageName;

        $targetFile = "./images/$newImageName";

        move_uploaded_file($tmpName, $targetFile);
    } 

    // Add to database
    $sql = "INSERT INTO machines (gym_username, name, file) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",  $gym_username , $name ,$file_name);
    $stmt->execute();
    


    }else{

        echo "machine name already in use";
    }

        // Redirect back to the machines page
        header("Location: ../Owner.PHP");
        exit();
}
?>
