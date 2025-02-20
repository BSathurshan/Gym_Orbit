<?php
class Add_Instructor
{
    use Model; 
    public function submit(
        $access,
        $gym_username,
        $trainer_username,
        $trainer_name,
        $email,
        $age,
        $password,
        $gender,
        $location,
        $social,
        $contact,
        $availability,
        $qualify,
        $experience,
        $special,
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

            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/mvc/public/assets/images/instructor/profile/images/";
            $targetFile = $targetDir . $newImageName;

    
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

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
    }
}

