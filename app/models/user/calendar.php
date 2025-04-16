<?php
class Calendar
{
    use Model;  

    public function getSavedColors($gym_username) {
        $conn = $this->getConnection();
        $query = "SELECT date, color FROM gym_schedule WHERE gym_username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $gym_username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $colors = [];
        while ($row = $result->fetch_assoc()) {
            $colors[$row['date']] = $row['color'];
        }
        return $colors;
    }
    
    public function getNotes($gym_username) {
        $conn = $this->getConnection();
        $query = "SELECT note_id, content, date FROM gym_notes WHERE gym_username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $gym_username);
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
    
    public function getAvailability($gym_username) {
        $conn = $this->getConnection();
        $query = "SELECT name,file,available FROM machines WHERE gym_username = ?"; // Adjust table/columns as needed
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $gym_username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $availability = [];
        while ($row = $result->fetch_assoc()) {
            $availability[] = [
                'name' => $row['name'],
                'file' => $row['file'],
                'available' => $row['available']
            ];
        }
        return $availability;
    }
    

 }
?>