<?php
class Materials
{
    use Model;  

    public function getFreeMaterials($username)
    {
        $conn = $this->getConnection();
    
        // Fetch connected gyms
        $sql = "SELECT gym_username FROM connects_gym WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultRequested = $stmt->get_result();

        $gymUsernames = [];
        while ($row = $resultRequested->fetch_assoc()) {
            $gymUsernames[] = $row['gym_username'];
        }
    
        $stmt->close();
    
        if (!empty($gymUsernames)) {
            $placeholders = implode(',', array_fill(0, count($gymUsernames), '?'));
            $query = "SELECT * FROM materials WHERE gym_username IN ($placeholders) AND type = 'free' ORDER BY createdAt DESC";
            $stmt = $conn->prepare($query);
            $types = str_repeat('s', count($gymUsernames));
            $stmt->bind_param($types, ...$gymUsernames);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                $stmt->close();
                return ['found' => 'yes', 'result' => $result];
            } else {
                $stmt->close();
                return ['found' => 'no'];

            }
        } else {
            return ['found' => 'alert'];
        }
    }
        public function getPremiumMaterials($username)
    {
        $conn = $this->getConnection();

        // Fetch only premium connected gyms
        $sql = "SELECT gym_username FROM connects_gym WHERE username = ? AND type = 'premium'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultRequested = $stmt->get_result();

        $premiumGyms = [];
        while ($row = $resultRequested->fetch_assoc()) {
            $premiumGyms[] = $row['gym_username'];
        }

        $stmt->close();

        if (!empty($premiumGyms)) {
            $placeholders = implode(',', array_fill(0, count($premiumGyms), '?'));
            $query = "SELECT * FROM materials WHERE gym_username IN ($placeholders) AND type = 'premium' ORDER BY createdAt DESC";
            $stmt = $conn->prepare($query);
            $types = str_repeat('s', count($premiumGyms));
            $stmt->bind_param($types, ...$premiumGyms);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $stmt->close();
                return ['found' => 'yes', 'result' => $result];
            } else {
                $stmt->close();
                return ['found' => 'no'];
            }
        } else {
            return ['found' => 'alert'];
        }
    }


    
    // public function get($username)
    // {
    //     $conn = $this->getConnection();  

    //                     // Fetch connected gyms
    //                     $sql = "SELECT * FROM connects_gym WHERE username= ?";
    //                     $stmt = $conn->prepare($sql);
    //                     $stmt->bind_param("s", $username);
    //                     $stmt->execute();
    //                     $resultRequested = $stmt->get_result();
        
    //                     $gymUsernames = [];
    //                     while ($row = $resultRequested->fetch_assoc()) {
    //                         $gymUsernames[] = $row['gym_username'];
    //                     }
                        

    //                     // Fetch for each result
    //                     if (!empty($gymUsernames)) {
    //                         $placeholders = implode(',', array_fill(0, count($gymUsernames), '?'));
    //                         $query2 = "SELECT * FROM materials WHERE gym_username IN ($placeholders) ORDER BY createdAt DESC ";
    //                         $stmt2 = $conn->prepare($query2);
        
    //                         $types = str_repeat('s', count($gymUsernames));
    //                         $stmt2->bind_param($types, ...$gymUsernames);
        
    //                         $stmt2->execute();
    //                         $result = $stmt2->get_result();
        
    //                         if( $result ->num_rows > 0) {
    //                             $stmt->close();
    //                             $stmt2->close();
    //                             return ['found' => 'yes' ,'result' => $result];
                
    //                         }else{
    //                             $stmt->close();
    //                             $stmt2->close();
    //                             return ['found' => 'no'];
    //                         }
                           
    //                     } else {
    //                             $stmt->close();
    //                             return ['found' => 'alert'];
    //                     } 
    // }
}
?>