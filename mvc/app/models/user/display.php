<?php
class Display
{
    use Model;  
    
    public function joined($username)
    {
        $conn = $this->getConnection();  
        
        $stmt = $conn->prepare("SELECT * FROM connects_gym WHERE username = ?");
        $stmt->bind_param("s", $username); 
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $stmt->close();
            return $result;
        } else {
            $stmt->close();
            return false;  
        }
    }
}
?>
