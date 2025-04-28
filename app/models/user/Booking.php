<?php
class Booking
{
    use Model;  

    public function details($username) 
    {
        $conn = $this->getConnection();
    
        $sql = "SELECT * FROM bookings WHERE username = ? ORDER BY date DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username); 
        $stmt->execute();
        $result = $stmt->get_result();
    
        if($result->num_rows > 0) {
            return ['found' => 'yes', 'result' => $result];
        } else {
            return ['found' => 'no'];
        }
    }

    public function moreDetails($gym_username, $trainer_username)
    {
        $conn = $this->getConnection();
    
        // Fetch gym details
        $sqlGym = "SELECT gym_name FROM gym WHERE gym_username = ?";
        $stmtGym = $conn->prepare($sqlGym);
        $stmtGym->bind_param("s", $gym_username);
        $stmtGym->execute();
        $resultGym = $stmtGym->get_result();
    
        // Fetch trainer details
        $sqlTrainer = "SELECT trainer_name, file FROM trainer WHERE trainer_username = ?";
        $stmtTrainer = $conn->prepare($sqlTrainer);
        $stmtTrainer->bind_param("s", $trainer_username);
        $stmtTrainer->execute();
        $resultTrainer = $stmtTrainer->get_result();
    
        // Check if both are found
        if ($resultGym->num_rows > 0 && $resultTrainer->num_rows > 0) {
            $gym = $resultGym->fetch_assoc();
            $trainer = $resultTrainer->fetch_assoc();
    
            return [
                'found' => 'yes',
                'gym_name' => $gym['gym_name'],
                'trainer_name' => $trainer['trainer_name'],
                'trainer_image' => $trainer['trainer_image']
            ];
        } else {
            return ['found' => 'no'];
        }
    }
    
    
}    
?>