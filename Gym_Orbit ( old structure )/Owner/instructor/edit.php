<?php
require_once '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $gym_username = htmlspecialchars($_POST['gym_username']);
    $old_trainer_username = htmlspecialchars($_POST['old_trainer_username']);
    $old_email = htmlspecialchars($_POST['old_email']);
    $old_file = htmlspecialchars($_POST['old_file']);

    $trainer_username = htmlspecialchars($_POST['trainer_username']);
    $trainer_name = htmlspecialchars($_POST['trainer_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['_password']);
    $age = htmlspecialchars($_POST['age']);
    $gender = htmlspecialchars($_POST['gender']);
    $location = htmlspecialchars($_POST['location']);
    $social = htmlspecialchars($_POST['social']);
    $contact = htmlspecialchars($_POST['contact']);
    $availability = htmlspecialchars($_POST['availability']);
    $qualify = htmlspecialchars($_POST['qualify']);
    $experience = htmlspecialchars($_POST['experience']);
    $special = htmlspecialchars($_POST['special']);
    $file = $_FILES['file']; 
    $file_name=$old_file;


    if ($file && $file['error'] == 0) {

        $old_file=$file_name;
        $file_name = $_FILES['file']['name']; 

        $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        
        $file_name =$newImageName;
        $targetFile = "../../instructor/profile/images/$newImageName";
        $deleteOld  = "../../instructor/profile/images/$old_file";
     
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            
            if (file_exists($deleteOld)) {
                unlink($deleteOld); 
            }
            
        } else {
       
            echo "Sorry, there was an error uploading your file.";
           exit();
        }
    }else{

        $file_name = $_POST['old_file'];
        

    }

   
            $query = "UPDATE instructors 
            SET trainer_username = ?, 
                trainer_name = ?, 
                email = ?, 
                password = ?, 
                age = ?, 
                gender = ?, 
                contact = ?, 
                social = ?, 
                experience = ?, 
                location = ?, 
                availiblity = ?, 
                qualify = ?, 
                special = ?, 
                file = ? 
            WHERE gym_username = ? 
            AND trainer_username = ? 
            AND email = ?";

                $stmt = $conn->prepare($query);

                $stmt->bind_param(
                "sssssssssssssssss", 
                $trainer_username, 
                $trainer_name, 
                $email, 
                $password, 
                $age, 
                $gender, 
                $contact, 
                $social, 
                $experience, 
                $location, 
                $availability, 
                $qualify, 
                $special, 
                $file_name, 
                $gym_username, 
                $old_trainer_username, 
                $old_email
                );

        // Execute the query
        if ($stmt->execute()) {
        echo "Trainer information updated successfully.";
        } else {
        echo "Error: " . $stmt->error;
        }
 
}

        header("Location: ../Owner.PHP");
        exit();


    
?>
