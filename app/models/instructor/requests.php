<?php
class Requests
{
    use Model;

    public function get($trainer_username)
    {
        $conn = $this->getConnection();
        $sql = "SELECT * FROM instructor_request WHERE trainer_username = ? AND status != 'accepted'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $trainer_username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return ['found' => 'yes', 'result' => $result];
        }
        return ['found' => 'no'];
    }

    public function accept($id)
    {
        $conn = $this->getConnection();

        // Get request details
        $sql = "SELECT * FROM instructor_request WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $request = $stmt->get_result()->fetch_assoc();

        if ($request) {
            // Add to connects_instructors
            $sql = "INSERT INTO connects_instructors (gym_username, trainer_username, user_name, trainer_name) 
                    VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $request['gym_username'], $request['trainer_username'], $request['username'], $request['trainer_name']);
            $stmt->execute();

            // Add notification
            $reminderId = uniqid();
            $message = "Your instructor [ {$request['trainer_name']} ({$request['trainer_username']}) ] request has been accepted.";
            $sql = "INSERT INTO user_reminders (id, username, message) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $reminderId, $request['username'], $message);
            $stmt->execute();

            // Update the request status to 'accepted'
            $sql = "UPDATE instructor_request SET status = 'accepted' WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $id);
            $stmt->execute();

            return ['found' => 'yes'];
        }
        return ['found' => 'no'];
    }

    public function reject($id)
    {
        $conn = $this->getConnection();

        // Get request details
        $sql = "SELECT * FROM instructor_request WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $request = $stmt->get_result()->fetch_assoc();

        if ($request) {
            // Add notification
            $reminderId = uniqid();
            $message = "Your instructor [ {$request['trainer_name']} ({$request['trainer_username']}) ] request has been rejected.";
            $sql = "INSERT INTO user_reminders (id, username, message) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $reminderId, $request['username'], $message);
            $stmt->execute();

            // Delete from instructor_request
            $sql = "DELETE FROM instructor_request WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $id);
            $stmt->execute();

            return ['found' => 'yes'];
        }
        return ['found' => 'no'];
    }

    public function processRequest($id, $action)
    {
        $conn = $this->getConnection();

        $status = ($action === 'accept') ? 'accepted' : 'rejected';
        $sql = "UPDATE instructor_request SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $id);

        if ($stmt->execute()) {
            if ($action === 'accept') {
                $sqlInsert = "INSERT INTO connects_instructors (gym_username, trainer_username, user_name, trainer_name) 
                              SELECT gym_username, trainer_username, username, trainer_name 
                              FROM instructor_request WHERE id = ?";
                $stmtInsert = $conn->prepare($sqlInsert);
                $stmtInsert->bind_param("i", $id);
                $stmtInsert->execute();
                $stmtInsert->close();
            }
            $stmt->close();
            return true;
        }

        $stmt->close();
        return false;
    }
}
?>
