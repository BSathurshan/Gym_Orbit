<?php
class GymSchedule
{
    use Model;  
    public function set($gym_username, $scheduleArray)
    {
        $conn = $this->getConnection();  
    
        // Define standard days
        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    
        // Format times
        $daysData = [];
        foreach ($days as $day) {
            $key = strtolower($day); // e.g., monday
            $times = isset($scheduleArray[$key]) && is_array($scheduleArray[$key]) 
                ? implode(",", $scheduleArray[$key]) 
                : "";
            $daysData[$day] = $times;
        }
    
        // Check if the schedule already exists
        $query = "SELECT * FROM gym_time WHERE gym_username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $gym_username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            // Update query
            $updateQuery = "
                UPDATE gym_time
                SET Monday = ?, Tuesday = ?, Wednesday = ?, Thursday = ?, Friday = ?, Saturday = ?, Sunday = ?
                WHERE gym_username = ?
            ";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param(
                "ssssssss",
                $daysData['Monday'],
                $daysData['Tuesday'],
                $daysData['Wednesday'],
                $daysData['Thursday'],
                $daysData['Friday'],
                $daysData['Saturday'],
                $daysData['Sunday'],
                $gym_username
            );
        } else {
            // Insert query
            $insertQuery = "
                INSERT INTO gym_time (gym_username, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)
            ";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param(
                "ssssssss",
                $gym_username,
                $daysData['Monday'],
                $daysData['Tuesday'],
                $daysData['Wednesday'],
                $daysData['Thursday'],
                $daysData['Friday'],
                $daysData['Saturday'],
                $daysData['Sunday']
            );
        }
    
        if ($stmt->execute()) {
            $stmt->close();
            return ['found' => 'yes'];
        } else {
            $stmt->close();
            return ['found' => 'no'];
        }
    }
    
    
    

}
?>