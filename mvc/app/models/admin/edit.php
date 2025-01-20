<?php
class Edit
{
    use Model;  

    public function user($new_username, $new_email, $name, $location, $contact, $old_email, $old_username)
    {
        $conn = $this->getConnection();  

        $sql = "UPDATE user SET username =? ,email =? ,name = ? ,location = ? , contact = ? WHERE email = ? AND username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $new_username, $new_email, $name, $location, $contact, $old_email, $old_username); 

         if( $stmt->execute() ){

             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }
    
    }

    public function owner($new_username,$new_gym_name,$new_owner_name,$new_email,$new_age,$new_gender,$new_location,$new_gym_contact,
    $new_owner_contact,$new_start_year,$new_experience,$new_web,$new_social,$old_email,$old_username)
    {
        $conn = $this->getConnection();  

        $sql = "UPDATE gym SET gym_username = ?, gym_name = ?, owner_name = ?, email = ?, age = ?, gender = ?, location = ?, gym_contact = ?, owner_contact = ?, start_year = ?, experience = ?, web = ?, social = ? WHERE email = ? AND gym_username = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "sssssssssssssss",
            $new_username,
            $new_gym_name,
            $new_owner_name,
            $new_email,
            $new_age,
            $new_gender,
            $new_location,
            $new_gym_contact,
            $new_owner_contact,
            $new_start_year,
            $new_experience,
            $new_web,
            $new_social,
            $old_email,
            $old_username
        );
        

         if( $stmt->execute() ){

             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }
    
    }

    
    public function instructor($gym_username, $old_trainer_username, $old_email, $trainer_username, $trainer_name, $email, $age, $gender, 
    $location, $social, $contact, $availability, $qualify, $experience, $special)
    {
        $conn = $this->getConnection();  

        $query = "UPDATE instructors 
        SET trainer_username = ?, 
            trainer_name = ?, 
            email = ?,
            age = ?, 
            gender = ?, 
            contact = ?, 
            social = ?, 
            experience = ?, 
            location = ?, 
            availiblity = ?, 
            qualify = ?, 
            special = ?
        WHERE gym_username = ? 
        AND trainer_username = ? 
        AND email = ?";

            $stmt = $conn->prepare($query);

            $stmt->bind_param(
            "sssssssssssssss", 
            $trainer_username, 
            $trainer_name, 
            $email, 
            $age, 
            $gender, 
            $contact, 
            $social, 
            $experience, 
            $location, 
            $availability, 
            $qualify, 
            $special, 
            $gym_username, 
            $old_trainer_username, 
            $old_email
            );

         if( $stmt->execute() ){

             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }
    
    }

    public function material($gym_username,$id,$type,$title,$details,$file,$file_name,$access)
    {
        $conn = $this->getConnection();  


    // Handle file upload (if a new file is uploaded)
    if ($file && $file['error'] == 0) {

        $old_file=$file_name;
        $file_name = $_FILES['file']['name']; 

        $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        
        $file_name =$newImageName;
        $targetFile = $_SERVER['DOCUMENT_ROOT'] ."/mvc/public/assets/images/materials/images/".$newImageName;
        $deleteOld  = $_SERVER['DOCUMENT_ROOT'] ."/mvc/public/assets/images/materials/images/".$old_file;
     
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            
            if (file_exists($deleteOld)) {
                unlink($deleteOld); 
            }
            
        } else {
       
            echo "Sorry, there was an error uploading your file.";
           exit();
        }
    }else{

        $file_name = $_POST['old_file_name'];
        

    }
    $sql = "UPDATE materials SET type = ?, title = ?, file = ? , details= ? WHERE id= ? AND gym_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss",$type, $title, $file_name, $details, $id, $gym_username); 

         if( $stmt->execute() ){

             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }
    
    }

    public function post($gym_username,$id,$title,$details,$file,$file_name,$access)
    {
        $conn = $this->getConnection();  

    // Handle file upload (if a new file is uploaded)
    if ($file && $file['error'] == 0) {

        $old_file=$file_name;
        $file_name = $_FILES['file']['name']; 

        $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        
        $file_name =$newImageName;
        $targetFile = $_SERVER['DOCUMENT_ROOT'] ."/mvc/public/assets/images/posts/images/".$newImageName;
        $deleteOld  = $_SERVER['DOCUMENT_ROOT'] ."/mvc/public/assets/images/posts/images/".$old_file;
     
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            
            if (file_exists($deleteOld)) {
                unlink($deleteOld); 
            }
            
        } else {
       
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }


        $sql = "UPDATE posts SET title = ?, file = ? , details= ? WHERE id= ? AND gym_username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $title, $file_name, $details, $id, $gym_username); 
         if( $stmt->execute() ){

             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }
    
    }


 }
?>