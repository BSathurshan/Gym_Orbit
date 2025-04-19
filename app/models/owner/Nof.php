<?php
class Nof {
    use Model;

    public function getMembershipReport($gymUsername) {
        $conn = $this->getConnection();
    
        // Count active users connected to the gym
        $sql1 = "SELECT COUNT(*) AS active_members 
                 FROM connects_gym 
                 JOIN user ON connects_gym.username = user.username 
                 WHERE connects_gym.gym_username = ? 
                 AND user.ban = 'no' AND user.active IN ('full', 'part')";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("s", $gymUsername);
        $stmt1->execute();
        $result1 = $stmt1->get_result()->fetch_assoc();
    
        // Count instructors connected to the gym
        $sql2 = "SELECT COUNT(*) AS instructor_count 
                 FROM connects_instructors 
                 WHERE gym_username = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("s", $gymUsername);
        $stmt2->execute();
        $result2 = $stmt2->get_result()->fetch_assoc();
    
        return [
            'found' => 'yes',
            'active_members' => $result1['active_members'],
            'instructor_count' => $result2['instructor_count']
        ];
    }
    
    
}


    
?>
    
