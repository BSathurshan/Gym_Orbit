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

    public function getSavedColors($username) {
        $conn = $this->getConnection(); // Assuming this returns a mysqli connection
    
        $query = "SELECT date, color FROM gym_schedule WHERE gym_username = ?";
        $stmt = $conn->prepare($query); // Fixed: $this->$conn -> $conn
        $stmt->bind_param("s", $username); // Fixed: $this->$username -> $username
        $stmt->execute();
        $result = $stmt->get_result();
    
        $colors = [];
        while ($row = $result->fetch_assoc()) {
            $colors[$row['date']] = $row['color']; // Builds { "2025-04-09": "rgb(0, 0, 255)" }
        }
    
        return $colors; // Return to controller, no echo here
    }


    public function saveNote($id, $content, $date, $username) {
        $conn = $this->getConnection();
        $query = "INSERT INTO gym_notes (note_id, gym_username, content, date) VALUES (?, ?, ?, ?) 
                  ON DUPLICATE KEY UPDATE content = ?, date = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $id, $username, $content, $date, $content, $date);
        return $stmt->execute();
    }
    
    public function deleteNote($id, $username) {
        $conn = $this->getConnection();
        $query = "DELETE FROM gym_notes WHERE note_id = ? AND gym_username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $id, $username);
        return $stmt->execute();
    }
    
    public function getNotes($username) {
        $conn = $this->getConnection();
        $query = "SELECT note_id, content, date FROM gym_notes WHERE gym_username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $notes = [];
        while ($row = $result->fetch_assoc()) {
            $notes[] = [
                'id' => $row['note_id'],
                'content' => $row['content'],
                'date' => $row['date']
            ];
        }
        return $notes;
    }
}
?>
