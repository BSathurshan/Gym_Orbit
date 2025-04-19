<?php
class Support
{
    use Model;  
    
    public function get_Support($username,$email,$role,$issue,$message)
    {
        $conn = $this->getConnection();  

        $sql = "INSERT INTO support (username, email, role, issue, message) VALUES (?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $username,$email,$role,$issue,$message);         

                if ($stmt->execute()) 
                {
                    $stmt->close();
                    return true;
                } 
                else 
                {
                    $stmt->close();
                    return false;
                }
        
    }
}