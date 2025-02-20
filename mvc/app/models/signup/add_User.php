<?php
class Add_User
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
        $contact,
        $location,
        $health,
        $gender,
        $activeMode,
        $goalChoice,
        $achieveChoice
    
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

            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/mvc/public/assets/images/user/profile/images/";
            $targetFile = $targetDir . $newImageName;

    
            move_uploaded_file($tmpName, $targetFile);
        }

            // Add to database
            $sql = "INSERT INTO user (username,password, name, email, age, gender,contact,location,goals,active,health,file,achieve) VALUES
                (?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssssss",  $username ,$password, $name ,$email,$age, $gender,$contact,
                                                $location,$goalChoice,$activeMode,$health,$file_name,$achieveChoice);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
    }
}

