<?php
class Materials
{
    use Model;  
    
    public function get_Materials($gym_username)
    {
        $conn = $this->getConnection();  

        $sql = "SELECT * FROM materials WHERE gym_username= ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $gym_username );
                $stmt->execute();
                $result=$stmt->get_result();          

                if ($result->num_rows > 0) 
                {
                    $stmt->close();
                    return $result;
                } 
                else 
                {
                    $stmt->close();
                    return false;
                }
        
    }
}
?>
