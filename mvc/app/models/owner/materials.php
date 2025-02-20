<?php
class Materials
{
    use Model;  
    
    public function get($username)
    {
        $conn = $this->getConnection();  

        $sql = "SELECT * FROM materials WHERE gym_username = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $stmt->close();
            return ['found'=>'yes','result'=>$result];   

            }
        else 
        {
            $stmt->close();
            return ['found'=>'no'];   
        }
    }

    public function add($gym_username,$id,$type,$title,$file,$details,$gym_name,$file_name)
    {
        $conn = $this->getConnection();  

        if ($file && $file['error'] == 0) {

            $tmpName=$file["tmp_name"];
            $file_name=$file["name"];
    
            $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            $file_name =$newImageName;
    
            $targetFile = $_SERVER['DOCUMENT_ROOT'] ."/mvc/public/assets/images/materials/images/".$newImageName;
    
            move_uploaded_file($tmpName, $targetFile);
        } 

        $sql = "INSERT INTO materials (type,id,gym_username,gym_name, title, file,details) VALUES (?, ? , ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $type,$id, $gym_username ,$gym_name, $title ,$file_name ,$details);

        if( $stmt->execute()){
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