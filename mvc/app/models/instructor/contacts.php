<?php
class Contacts
{
    use Model;  
    
    public function get_Contacts($trainer_username)
    {
        $conn = $this->getConnection();  
        

                // Fetch connected gyms
                $sql = "SELECT * FROM connects_instructors WHERE trainer_username= ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $trainer_username);
                $stmt->execute();
                $resultRequested = $stmt->get_result();

                $Usernames = [];
                while ($row = $resultRequested->fetch_assoc()) {
                    $Usernames[] = $row['user_name'];
                }
                

                    // Fetch if connected to gyms
                    if (!empty($Usernames)) {
                        $placeholders = implode(',', array_fill(0, count($Usernames), '?'));
                        $query2 = "SELECT * FROM user WHERE username IN ($placeholders)";
                        $stmt2 = $conn->prepare($query2);
    
                        $types = str_repeat('s', count($Usernames));
                        $stmt2->bind_param($types, ...$Usernames);
    
                        $stmt2->execute();
                        $result = $stmt2->get_result();
    
                     
                        $stmt->close();
                        $stmt2->close();
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
