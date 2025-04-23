<?php
class Support
{
    use Model; 
    public function submit($issue,$message,$username,$role,$email){

        $conn = $this->getConnection();  

        $sql = "INSERT INTO support (username, issue, message, role, email) 
        VALUES (?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE 
            issue = VALUES(issue),
            message = VALUES(message),
            role = VALUES(role),
            email = VALUES(email)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $username, $issue, $message , $role ,$email);
        

            if ($stmt->execute()) {

                $stmt->close();
                return ['found'=>'yes'];   

            } else {
               
                $stmt->close();
                return ['found'=>'no'];   
                
            }
        
    }
}
?>