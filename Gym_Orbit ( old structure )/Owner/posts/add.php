<?php
require_once '../../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $gym_username = $_POST['gym_username'];
    $id=uniqid();
    $title = $_POST['title'];
    $file = $_FILES['file'];
    $details = $_POST['details'];
    $gym_name=$_POST['gym_name'];
    $file_name=NULL;



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
    $sql = "INSERT INTO posts (id,gym_username,gym_name, title, file,details) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $id, $gym_username ,$gym_name, $title ,$file_name ,$details);
    $stmt->execute();
    



        // Redirect back to the machines page
        header("Location: ../Owner.PHP");
        exit();
}
?>
