<?php
require_once '../../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Get values from the form
        $admin_username = $_POST['admin_username'];
        $admin_name = $_POST['admin_name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $location = $_POST['location'];
        $contact = $_POST['contact'];
        $type = $_POST['type'] ; 
        $file = $_FILES['file'];
        $file_name = null;




    if ($file && $file['error'] == 0) {

        $tmpName=$file["tmp_name"];
        $file_name=$file["name"];

        $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        $file_name =$newImageName;

        $targetFile = "../profile/images/$newImageName";

        move_uploaded_file($tmpName, $targetFile);
    } 

    // Add to database
    $sql = "INSERT INTO admin (
        type,
        admin_username,
        password,
        admin_name,
        email,
        age,
        gender,
        location,
        contact,
        file) 
        VALUES (?, ? , ?, ?, ?, ?, ?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssss",
        $type,
        $admin_username,
        $password,
        $admin_name,
        $email,
        $age,
        $gender,
        $location,
        $contact,
        $file_name
    );
    
    $stmt->execute();
    
        // Redirect back to the machines page
        header("Location: ../admin.PHP");
        exit();
}
?>
