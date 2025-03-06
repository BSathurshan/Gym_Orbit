<?php
require_once "workoutconnection.php"; // Include DB connection

class WorkoutModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserWorkouts($username) {
        $stmt = $this->conn->prepare("SELECT * FROM workout_schedule WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
