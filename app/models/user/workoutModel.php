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

    // Function to get progress for a specific user
public function getWorkoutProgress($username) {
    $stmt = $this->conn->prepare("SELECT * FROM workout_progress WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $progress = [];
    while ($row = $result->fetch_assoc()) {
        $progress[$row['day']][$row['exercise']] = $row['completed'];
    }

    return $progress;
}

// Function to update progress when a checkbox is clicked
public function updateWorkoutProgress($username, $day, $exercise, $completed) {
    // Check if record exists
    $stmt = $this->conn->prepare("SELECT id FROM workout_progress WHERE username = ? AND day = ? AND exercise = ?");
    $stmt->bind_param("sss", $username, $day, $exercise);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update progress if record exists
        $stmt = $this->conn->prepare("UPDATE workout_progress SET completed = ? WHERE username = ? AND day = ? AND exercise = ?");
        $stmt->bind_param("isss", $completed, $username, $day, $exercise);
    } else {
        // Insert a new progress record
        $stmt = $this->conn->prepare("INSERT INTO workout_progress (username, day, exercise, completed) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $username, $day, $exercise, $completed);
    }
    
    return $stmt->execute();
}

public function addMealPlan($user, $instructor, $meal_plan_name) {
    $stmt = $this->conn->prepare("INSERT INTO meal_plan (user_username, instructor_username, meal_plan_name) VALUES (?, ?, ?)");
    $stmt->execute([$user, $instructor, $meal_plan_name]);
    return $this->conn->lastInsertId();
}

public function addNutrition($mealPlanId, $nutrition_name, $amount) {
    $stmt = $this->conn->prepare("INSERT INTO meal_plan_nutrition (mealPlan_id, nutrition_name, amount) VALUES (?, ?, ?)");
    $stmt->execute([$mealPlanId, $nutrition_name, $amount]);
}

public function updateMealPlan($mealPlanId, $meal_plan_name) {
    $stmt = $this->conn->prepare("UPDATE meal_plan SET meal_plan_name = ? WHERE mealPlan_id = ?");
    return $stmt->execute([$meal_plan_name, $mealPlanId]);
}

public function updateNutrition($nutritionId, $nutrition_name, $amount) {
    $stmt = $this->conn->prepare("UPDATE meal_plan_nutrition SET nutrition_name = ?, amount = ? WHERE id = ?");
    return $stmt->execute([$nutrition_name, $amount, $nutritionId]);
}

public function deleteNutritionsByMealPlan($mealPlanId) {
    $stmt = $this->conn->prepare("DELETE FROM meal_plan_nutrition WHERE mealPlan_id = ?");
    return $stmt->execute([$mealPlanId]);
}



   

    
    public function __destruct() {
        $this->conn->close();
    }


}
