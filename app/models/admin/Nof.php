<?php
class Nof {
    use Model;

    public function getMembershipReport() {
        $conn = $this->getConnection();
        $sql = "SELECT COUNT(*) AS active_members 
                FROM user 
                WHERE ban = 'no' AND active IN ('full', 'part')";
        $stmt = $conn->prepare($sql);
    
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            return ['found' => 'yes', 'result' => $data];
        } else {
            return ['found' => 'no'];
        }
    }

    public function getInstructorCount() {
        $conn = $this->getConnection();
        $sql = "SELECT COUNT(*) AS instructor_count 
                FROM instructors";  // Replace with your actual table if different
        $stmt = $conn->prepare($sql);
    
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            return ['found' => 'yes', 'result' => $data];
        } else {
            return ['found' => 'no'];
        }
    }
    
    
}
?>
