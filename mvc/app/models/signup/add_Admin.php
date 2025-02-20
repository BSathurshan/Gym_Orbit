<?php
class Add_Admin
{
    use Model; 
    public function submit(
        $admin_username,
				$admin_name,
				$email,
				$age,
				$password,
				$gender,
				$location,
				$contact,
				$type,
				$file
    )
    {

        $file = $_FILES['file'];
        $file_name=NULL; 

        
        // Get the database connection from the Model trait
        $conn = $this->getConnection();

        if ($file && $file['error'] == 0) {

            $tmpName=$file["tmp_name"];
            $file_name=$file["name"];
    
            $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            $file_name =$newImageName;

            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/mvc/public/assets/images/admin/profile/images/";
            $targetFile = $targetDir . $newImageName;

    
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

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
    }
}

