<?php
require_once "models/workoutconnection.php";
require_once "models/WorkoutModel.php";

class WorkoutController {
    private $workoutModel;

    public function __construct() {
        global $conn;  // Use the global DB connection
        $this->workoutModel = new WorkoutModel($conn);
    }

    public function showWorkoutPage() {
        session_start();
        $username = $_SESSION['username'] ?? null;

        if (!$username) {
            die("Error: No user logged in.");
        }

        $workouts = $this->workoutModel->getUserWorkouts($username);

        // Pass data to the view
        include "views/user/materials.php";
    }
}
?>

