<?php
class MealModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getMealPlansByGoal($goal) {
        $stmt = $this->conn->prepare("SELECT * FROM meal_plans WHERE goal = ?");
        $stmt->bind_param("s", $goal);
        $stmt->execute();
        $result = $stmt->get_result();

        $mealPlans = [];
        while ($row = $result->fetch_assoc()) {
            $mealPlans[] = $row;
        }

        return $mealPlans;
    }

    public function saveUserGoal($username, $goal) {
        $stmt = $this->conn->prepare("INSERT INTO user_selected_goal (username, goal) VALUES (?, ?) ON DUPLICATE KEY UPDATE goal = ?");
        $stmt->bind_param("sss", $username, $goal, $goal);
        return $stmt->execute();
    }

    public function getUserGoal($username) {
        $stmt = $this->conn->prepare("SELECT goal FROM user_selected_goal WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return $row['goal'];
        }

        return null;
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>
