<?php
class Check_Username
{
    use Model; 
    public function check($username)
    {
        // Get the database connection from the Model trait
        $conn = $this->getConnection();

        // Use a single UNION query to check all tables
        $sql = "
            SELECT 'user' AS source FROM user WHERE username = ?
            UNION
            SELECT 'gym' AS source FROM gym WHERE gym_username = ?
            UNION
            SELECT 'instructors' AS source FROM instructors WHERE trainer_username = ?
            UNION
            SELECT 'admin' AS source FROM admin WHERE admin_username = ?
        ";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Failed to prepare statement: ' . $conn->error);
        }

        // Bind the username parameter to all four placeholders
        $stmt->bind_param("ssss", $username, $username, $username, $username);
        
        if (!$stmt->execute()) {
            $stmt->close();
            throw new Exception('Failed to execute statement: ' . $stmt->error);
        }

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();

        // Return result
        if ($row) {
            return ['found' => $row['source'], 'available' => false];
        }

        return ['found' => 'no', 'available' => true];
    }
}

