<?php
class membership {
    use Model;

    public function getAcceptedClients($trainer_username)
    {
        $conn = $this->getConnection();
        $sql = "SELECT u.username, u.name, u.email, u.age, u.gender, u.file AS profile_image
                FROM connects_instructors ci
                JOIN user u ON ci.user_name = u.username
                WHERE ci.trainer_username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $trainer_username);
        $stmt->execute();
        $result = $stmt->get_result();

        $clients = [];
        while ($row = $result->fetch_assoc()) {
            $clients[] = $row;
        }

        $stmt->close();

        if (!empty($clients)) {
            return ['found' => 'yes', 'result' => $clients];
        } else {
            return ['found' => 'no', 'message' => 'No accepted users yet!'];
        }
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
