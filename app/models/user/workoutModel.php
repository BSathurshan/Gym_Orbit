<?php

class WorkoutModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // GET Operation
    public function getUserWorkouts($username) { 
        $stmt = $this->conn->prepare("SELECT * FROM workout_schedule WHERE username = ? ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), id");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $workouts = [];
        while ($row = $result->fetch_assoc()) {
            $workouts[$row['day']][] = $row;
        }
        
        return $workouts;
    }
    
    // UPDATE Operation
    public function saveWorkout($username, $data) {  
        // First delete existing workouts for this user
        $stmt = $this->conn->prepare("DELETE FROM workout_schedule WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        
        // Insert new workouts
        $stmt = $this->conn->prepare("INSERT INTO workout_schedule (username, day, exercise, sets, reps) VALUES (?, ?, ?, ?, ?)");
        
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $success = true;
        
        foreach ($days as $day) {
            for ($i = 1; $i <= 5; $i++) {
                $exercise = $data[$day]['workout'][$i] ?? '';
                $sets = $data[$day]['sets'][$i] ?? 0;
                $reps = $data[$day]['reps'][$i] ?? 0;
                
                // Only insert if exercise is not empty
                if (!empty($exercise)) {
                    $stmt->bind_param("ssiii", $username, $day, $exercise, $sets, $reps);
                    if (!$stmt->execute()) {
                        $success = false;
                    }
                }
            }
        }
        
        return $success;
    }
    
    public function __destruct() {
        $this->conn->close();
    }
}
