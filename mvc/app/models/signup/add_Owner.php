<?php
class Add_Owner
{
    use Model; 
    public function submit(
        $name,
        $email,
        $username,
        $password,
        $type,
        $file,
        $age,
        $gym_contact,
        $location,
        $gender,
        $web,
        $social,
        $gym_name,
        $owner_contact,
        $start_year,
        $experience
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

            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/mvc/public/assets/images/owner/profile/images/";
            $targetFile = $targetDir . $newImageName;

    
            move_uploaded_file($tmpName, $targetFile);
        }

            // Add to database
            $sql = "INSERT INTO gym (
                gym_username ,  gym_name, password, owner_name, email, age, gender,location, gym_contact,  owner_contact,
                start_year, experience,web, social, file ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param(
                "sssssssssssssss",
                $username,
                $gym_name,
                $password,
                $name,
                $email,
                $age,
                $gender,
                $location,
                $gym_contact,
                $owner_contact,
                $start_year,
                $experience,
                $web,
                $social,
                $file_name
            );
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
    }
}

