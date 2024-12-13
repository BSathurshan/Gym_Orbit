<?php
require_once '../../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get values from the form
        $gym_username = $_POST['gym_username'];
        $trainer_username = $_POST['trainer_username'];
        $trainer_name = $_POST['trainer_name'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $location = $_POST['location'];
        $social = $_POST['social'];

        $contact = $_POST['contact'];
        $availability = $_POST['availability'];
        $qualify = $_POST['qualify'];
        $experience = $_POST['experience'];
        $special = $_POST['special'];

        $file = $_FILES['file'];
        $file_name = null;



    if ($file && $file['error'] == 0) {

        $tmpName=$file["tmp_name"];
        $file_name=$file["name"];

        $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        $file_name =$newImageName;

        $targetFile = "../../instructor/profile/images/$newImageName";

        move_uploaded_file($tmpName, $targetFile);
    } 

    // Add to database
    $sql = "INSERT INTO instructors (
        gym_username,trainer_username,email,password,trainer_name,age,gender,contact,social,experience,location,availiblity,qualify,special,file) 
        VALUES (?, ? , ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssss",  
    $gym_username, 
    $trainer_username, 
    $email, 
    $password, 
    $trainer_name, 
    $age, 
    $gender, 
    $contact, 
    $social, 
    $experience, 
    $location, 
    $availability, 
    $qualify, 
    $special,
    $file_name);
    $stmt->execute();
    



        // Redirect back to the machines page
        header("Location: ../Owner.PHP");
        exit();
}
?>
