<?php
class Check_Contact
{
    use Model;

    public function check($contact)
    {
        $conn = $this->getConnection();

        $sql = "
            SELECT 'user' AS source FROM user WHERE contact = ?
            UNION
            SELECT 'gym' AS source FROM gym WHERE owner_contact = ? OR gym_contact = ?
            UNION
            SELECT 'instructors' AS source FROM instructors WHERE contact = ?
            UNION
            SELECT 'admin' AS source FROM admin WHERE contact = ?
        ";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Failed to prepare statement: ' . $conn->error);
        }

        $stmt->bind_param("sssss", $contact, $contact, $contact, $contact, $contact);
        
        if (!$stmt->execute()) {
            $stmt->close();
            throw new Exception('Failed to execute statement: ' . $stmt->error);
        }

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();

        if ($row) {
            return ['found' => $row['source'], 'available' => false];
        }

        return ['found' => 'no', 'available' => true];
    }
}
?>