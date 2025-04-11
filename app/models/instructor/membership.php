<?php
class membership {
    use Model;

    public function getAcceptedClients($instructor_id) {
        $conn = $this->getConnection();  
        $sql = "SELECT username 
                  FROM instructors_client_history 
                  WHERE trainer_username = ? ";
                  
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $instructor_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $clients = [];
        while ($row = $result->fetch_assoc()) {
            $clients[] = $row;  // Store each row in the array
        }

        $stmt->close();
        return $clients; 
        }
        public function saveSchedule($username, $schedule_date, $schedule_time, $schedule_details) {
            $conn = $this->getConnection();  
            $sql = "INSERT INTO schedules (username, schedule_date, schedule_time, schedule_details) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $username, $schedule_date, $schedule_time, $schedule_details);
            
            if ($stmt->execute()) {
                return ['status' => 'success', 'message' => 'Schedule assigned successfully.'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to assign schedule.'];
            }
        }
}
?>
