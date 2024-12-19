<?php
class Reminder
{
    use Model;  
    
    public function get_Reminders($username)
    {
        $conn = $this->getConnection();  

                    $sql = "SELECT * FROM instructors_reminders WHERE id = ? ";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if($result->num_rows >0)
                    {
                        return $result;
                    }
                    else
                    {
                        return false;
                    }
    

    }
        
}
?>