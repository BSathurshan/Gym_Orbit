<?php

class WorkoutModel {
    private $conn;
    
    public function getUserMealPlans($username) { 
        $stmt = $this->conn->prepare("SELECT * FROM meal_plans WHERE username = ? ORDER BY plan_number");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $mealPlans = [];
        while ($row = $result->fetch_assoc()) {
            $mealPlans[] = $row; // Flat list of meal plans
        }
        
        return $mealPlans;
    }
    

}