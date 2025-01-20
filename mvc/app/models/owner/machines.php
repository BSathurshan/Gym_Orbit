<?php
class Machines
{
    use Model;  
    
    public function get($username)
    {
        $conn = $this->getConnection();  

        $sql = "SELECT * FROM machines WHERE gym_username = ? ";
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

    public function add($gym_username,$name,$file,$file_name)
    {
        $conn = $this->getConnection();  

        $sql = "SELECT * FROM machines  WHERE name = ? AND gym_username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $gym_username); 
        $stmt->execute();
        $resultRequested = $stmt->get_result();

        if ($resultRequested->num_rows == 0) {

            if ($file && $file['error'] == 0) {
        
                $tmpName=$file["tmp_name"];
                $file_name=$file["name"];
        
                $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;
                $file_name =$newImageName;
        
                $targetFile = $_SERVER['DOCUMENT_ROOT'] ."/mvc/public/assets/images/machines/".$newImageName;
        
                move_uploaded_file($tmpName, $targetFile);
            } 
        
            // Add to database
            $sql = "INSERT INTO machines (gym_username, name, file) VALUES (?, ?, ?)";
        
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss",  $gym_username , $name ,$file_name);
            
            if ($stmt->execute()) {

                $stmt->close();
                return ['found'=>'yes'];   
    
                }
            else 
            {
                $stmt->close();
                return ['found'=>'no'];   
            }
            
        
        
            }else{
        
                $stmt->close();
                return ['found'=>'already'];   
            }


    }

    public function delete($name ,$file ,$gym_username)
    {
        $conn = $this->getConnection();  

        $sql = "DELETE FROM machines WHERE name = ? AND gym_username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $gym_username); 

        if ($stmt->execute()) {

            $filePath = $_SERVER['DOCUMENT_ROOT'] ."/mvc/public/assets/images/machines/". $file; 

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        
            $stmt->close();
            return ['found'=>'yes'];   

            }
        else 
        {
            $stmt->close();
            return ['found'=>'no'];   
        }
    }

    public function edit($gym_username,$old_name,$old_file,$new_name,$file)
    {
        $conn = $this->getConnection();  

        if ($file && $file['error'] == 0) {

            $file_name = $_FILES['file']['name']; 
    
            $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            
            $file_name =$newImageName;
            $targetFile = $_SERVER['DOCUMENT_ROOT'] ."/mvc/public/assets/images/machines/".$newImageName;
            $deleteOld  = $_SERVER['DOCUMENT_ROOT'] ."/mvc/public/assets/images/machines/".$old_file;
         
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                
                if (file_exists($deleteOld)) {
                    unlink($deleteOld); 
                }
                
            } else {
           
                echo "Sorry, there was an error uploading your file.";
                exit();
            }
        } else {
    
            $file_name = $_POST['old_file']; 
            $new_name = $_POST['name']; 
        }

        $sql = "UPDATE machines SET name = ?, file = ? WHERE name = ? AND gym_username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $new_name, $file_name, $old_name, $gym_username); 
        

        if ($stmt->execute()) {

            $stmt->close();
            return ['found'=>'yes'];   

            }
        else 
        {
            $stmt->close();
            return ['found'=>'no'];   
        }
    }
}
?>