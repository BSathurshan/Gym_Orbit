<?php
class Leave
{
    use Model;  
    
    public function leave($gym_username,$username)
    {
        $conn = $this->getConnection();  
        
        $stmt = $conn->prepare("DELETE FROM connects_gym WHERE gym_username=? AND username=?");
        $stmt->bind_param("ss", $gym_username,$username); 
       
        if ( $stmt->execute()) {
            $stmt->close();
            return true; 
        } else {
            $stmt->close();
            return false;  
        }
    }
}
?>
