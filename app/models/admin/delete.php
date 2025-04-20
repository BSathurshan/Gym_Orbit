<?php
class Delete
{
    use Model;  

    public function user($username,$email,$file_name)
    {
        $conn = $this->getConnection();  

        $sql = "DELETE FROM user WHERE username = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $username,$email); 

         if( $stmt->execute() ){

            $filePath =$_SERVER['DOCUMENT_ROOT'] . "/mvc/public/assets/images/user/profile/images/". $file_name; 

            if (file_exists($filePath)) {
                unlink($filePath); 
            }
            
             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }

    
    }

    public function gym($gym_username,$email,$file_name)
    {
        $conn = $this->getConnection();  

        $sql = "DELETE FROM gym WHERE gym_username = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $gym_username,$email); 

         if( $stmt->execute() ){

            $filePath =$_SERVER['DOCUMENT_ROOT'] . "/mvc/public/assets/images/owner/profile/images/". $file_name; 

            if (file_exists($filePath)) {
                unlink($filePath); 
            }
            
             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }

    
    }

    public function instructor($trainer_username,$email,$file_name)
    {
        $conn = $this->getConnection();  

        $sql = "DELETE FROM instructors WHERE email = ? AND trainer_username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $trainer_username); 

         if( $stmt->execute() ){

            if($file_name!=null){
                $filePath =$_SERVER['DOCUMENT_ROOT'] . "/mvc/public/assets/images/instructor/profile/images/". $file_name; 

                if (file_exists($filePath)) {
                    unlink($filePath); 
                }

            }

            
             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }

    
    }


    public function admin($admin_username,$email,$file_name)
    {
        $conn = $this->getConnection();  

        $sql = "DELETE FROM admin WHERE email = ? AND admin_username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $admin_username); 

         if( $stmt->execute() ){

            $filePath =$_SERVER['DOCUMENT_ROOT'] . "/mvc/public/assets/images/admin/profile/images/". $file_name; 

            if (file_exists($filePath)) {
                unlink($filePath); 
            }
            
             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }

    
    }


    public function post($id,$gym_username,$file_name)
    {
        $conn = $this->getConnection();  

        $sql = "DELETE FROM posts WHERE id = ? AND gym_username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $id, $gym_username); 

         if( $stmt->execute() ){

            $filePath =$_SERVER['DOCUMENT_ROOT'] . "/mvc/public/assets/images/posts/images/". $file_name; 

            if (file_exists($filePath)) {
                unlink($filePath); 
            }
            
             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }

    
    }

    public function material($id,$file_name,$gym_username,$access)
    {
        $conn = $this->getConnection();  

        $sql = "DELETE FROM materials WHERE id = ? AND gym_username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $id, $gym_username); 

         if( $stmt->execute() ){

            $filePath =$_SERVER['DOCUMENT_ROOT'] . "/mvc/public/assets/images/materials/images/". $file_name; 

            if (file_exists($filePath)) {
                unlink($filePath); 
            }
            
             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }

    
    }

    public function message($username, $issue, $message, $time)
    {
        $conn = $this->getConnection();  
    
        $sql = "DELETE FROM support WHERE username = ? AND issue = ? AND message = ? AND time = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $issue, $message, $time); 
    
        if ($stmt->execute()) {
            $stmt->close();
            return ['found' => 'yes'];   
        } else {
            $stmt->close();
            return ['found' => 'no'];   
        }
    }

 }
?>