<?php
class Check_Email
{
    use Model; 
    public function check($email)
    {
        // Get the database connection from the Model trait
        $conn = $this->getConnection();

        // Use a single UNION query to check all tables
        $sql = "
            SELECT 'user' AS source FROM user WHERE email = ?
            UNION
            SELECT 'gym' AS source FROM gym WHERE email = ?
            UNION
            SELECT 'instructors' AS source FROM instructors WHERE email = ?
            UNION
            SELECT 'admin' AS source FROM admin WHERE email = ?
        ";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Failed to prepare statement: ' . $conn->error);
        }

        // Bind the email parameter to all four placeholders
        $stmt->bind_param("ssss", $email, $email, $email, $email);
        
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

?>