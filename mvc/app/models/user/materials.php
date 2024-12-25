<?php
class Materials
{
    use Model;  
    
    public function get($username)
    {
        $conn = $this->getConnection();  

                        // Fetch connected gyms
                        $sql = "SELECT * FROM connects_gym WHERE username= ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $resultRequested = $stmt->get_result();
        
                        $gymUsernames = [];
                        while ($row = $resultRequested->fetch_assoc()) {
                            $gymUsernames[] = $row['gym_username'];
                        }
                        

                        // Fetch for each result
                        if (!empty($gymUsernames)) {
                            $placeholders = implode(',', array_fill(0, count($gymUsernames), '?'));
                            $query2 = "SELECT * FROM materials WHERE gym_username IN ($placeholders)";
                            $stmt2 = $conn->prepare($query2);
        
                            $types = str_repeat('s', count($gymUsernames));
                            $stmt2->bind_param($types, ...$gymUsernames);
        
                            $stmt2->execute();
                            $result = $stmt2->get_result();
        
                            if( $result ->num_rows > 0) {
                                $stmt->close();
                                $stmt2->close();
                                return ['found' => 'yes' ,'result' => $result];
                
                            }else{
                                $stmt->close();
                                $stmt2->close();
                                return ['found' => 'no'];
                            }
                           
                        } else {

                                return ['found' => 'alert'];
                                $stmt->close();
                                return false;
                        } 
    }
}
?>