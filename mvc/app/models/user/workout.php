<?php
class Workout
{
    use Model;

    // Add a workout with title
    public function addworkout($username, $title, $plan, $day)
    {
        $conn = $this->getConnection();

        $sql = "INSERT INTO workout (username, title, plan, day) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql); 
        
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ssss", $username, $title, $plan, $day); // "ssss" means all four values are strings
        $stmt->execute();
        $stmt->close();

        echo "Workout plan added successfully";  
    }

    // Fetch workouts for a specific user
    public function getworkout($username)
    {
        $conn = $this->getConnection();

        $sql = "SELECT * FROM workout WHERE username = ?"; // Use a placeholder (?)
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $username); // Bind the username
        $stmt->execute();

        $result = $stmt->get_result(); // Get result

        if ($result->num_rows > 0) {  // Check num_rows correctly
            return $result->fetch_all(MYSQLI_ASSOC); // Return all rows as an array
        } else {
            return false; // No records found
        }

        $stmt->close();
    }

    // Update a workout with title
    public function updateworkout($workout_id, $title, $plan, $day)
    {
        $conn = $this->getConnection();

        $sql = "UPDATE workout SET title = ?, plan = ?, day = ? WHERE workout_id = ?"; // Use placeholders (?)
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sssi", $title, $plan, $day, $workout_id); // Bind the title, plan, day, and workout_id
        $stmt->execute();

        echo "Workout plan updated successfully";  

        $stmt->close();
    }

    // Delete a workout
    public function deleteworkout($workout_id)
    {
        $conn = $this->getConnection();

        $sql = "DELETE FROM workout WHERE workout_id = ?"; // Use a placeholder (?)
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("i", $workout_id); // Bind the workout_id
        $stmt->execute();

        echo "Workout plan deleted successfully";  

        $stmt->close();
    }
}