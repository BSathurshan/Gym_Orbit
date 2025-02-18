<?php
class MealPlan
{
    use Model;

    // Add a meal plan
    public function addMealPlan($username, $day, $meal)
    {
        $conn = $this->getConnection();

        $sql = "INSERT INTO meal (username, day, meal) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sss", $username, $day, $meal); // Bind parameters
        $stmt->execute();
        $stmt->close();

        echo "Meal plan added successfully";
    }

    // Fetch meal plans for a specific user
    public function getMealPlans($username)
    {
        $conn = $this->getConnection();

        $sql = "SELECT * FROM meal WHERE username = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $username); // Bind the username
        $stmt->execute();

        $result = $stmt->get_result(); // Get result

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC); // Return all rows as an array
        } else {
            return false; // No records found
        }

        $stmt->close();
    }

    // Update a meal plan
    public function updateMealPlan($meal_id, $day, $meal)
    {
        $conn = $this->getConnection();

        $sql = "UPDATE meal SET day = ?, meal = ? WHERE meal_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ssi", $day, $meal, $meal_id); // Bind parameters
        $stmt->execute();

        echo "Meal plan updated successfully";

        $stmt->close();
    }

    // Delete a meal plan
    public function deleteMealPlan($meal_id)
    {
        $conn = $this->getConnection();

        $sql = "DELETE FROM meal WHERE meal_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("i", $meal_id); // Bind the meal_id
        $stmt->execute();

        echo "Meal plan deleted successfully";

        $stmt->close();
    }
}