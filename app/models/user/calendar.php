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
    

    public function getGymTimes($gym_username) {
        $conn = $this->getConnection();
        $query = "SELECT monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM gym_time WHERE gym_username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $gym_username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?: [];
    }
    
    public function getInstructorTimes($gym_username) {
        $conn = $this->getConnection();
        $query = "SELECT trainer_username, trainer_name, age, gender, file, monday, tuesday, wednesday, thursday, friday, saturday, sunday 
                  FROM instructor_time 
                  WHERE gym_username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $gym_username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $instructors = [];
        while ($row = $result->fetch_assoc()) {
            $instructors[] = [
                'trainer_username' => $row['trainer_username'],
                'trainer_name' => $row['trainer_name'],
                'age' => $row['age'],
                'gender' => $row['gender'],
                'file' => $row['file'],
                'times' => [
                    'monday' => $row['monday'],
                    'tuesday' => $row['tuesday'],
                    'wednesday' => $row['wednesday'],
                    'thursday' => $row['thursday'],
                    'friday' => $row['friday'],
                    'saturday' => $row['saturday'],
                    'sunday' => $row['sunday']
                ]
            ];
        }
        return $instructors;
    }


    public function saveBooking($username, $gym_username, $trainer_username, $date, $time) {
        $conn = $this->getConnection();
        $query = "INSERT INTO bookings (username, gym_username, trainer_username, date, time) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $username, $gym_username, $trainer_username, $date, $time);
        return $stmt->execute();
    }
    
 }
?>