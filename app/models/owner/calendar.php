<?php
class Calendar {
    use Model;  

    public function updateMachineAvailability($data, $username) {
        $conn = $this->getConnection();  
        $success = true; // Track execution status

        foreach ($data as $machineName => $availability) {
            $sql = "UPDATE machines SET available = ? WHERE name = ? AND gym_username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $availability, $machineName, $username);
            
            if (!$stmt->execute()) {
                $success = false; // If any query fails, set success to false
            }
        }
        return $success; // Return final result after loop
    }


    public function updateTodayColor($date,$color,$username){


        $conn = $this->getConnection();  

        $sql = "INSERT INTO gym_schedule (gym_username, date, color) 
        VALUES (?, ?, ?) 
        ON DUPLICATE KEY UPDATE color = VALUES(color)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $date, $color);
            
            if ($stmt->execute()) {
                return true; 
            }else{
                return false; 

            }

        
    }
}
?>
