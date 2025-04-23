<?php
class Gyms
{
    use Model;  
    
    public function get_GymDetails($gym_username)
    {
        $conn = $this->getConnection();  

        $sql = "SELECT * FROM gym WHERE gym_username = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $gym_username);
        $stmt->execute();
        $result = $stmt->get_result();          

        $stmt->close();
        return $result;
    }
}
?>