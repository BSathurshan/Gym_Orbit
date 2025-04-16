<?php
class InstructorSchedule
{
    use Model;  
    
    public function set($gym_username, $trainer_username, $scheduleData)
    {
        $conn = $this->getConnection();
    
        // Prepare an array to hold the final time slots for each day
        $daysData = [
            "Monday" => "",
            "Tuesday" => "",
            "Wednesday" => "",
            "Thursday" => "",
            "Friday" => "",
            "Saturday" => "",
            "Sunday" => "",
        ];
    
        // Format each day's data into comma-separated time slots
        foreach ($scheduleData as $day => $slots) {
            $dayFormatted = ucfirst(strtolower($day));
            $daysData[$dayFormatted] = implode(",", $slots);
        }
    
        // Check if the instructor already exists in the database
        $query = "SELECT * FROM instructor_time WHERE trainer_username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $trainer_username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            // Update existing row
            $updateQuery = "
                UPDATE instructor_time
                SET Monday = ?, Tuesday = ?, Wednesday = ?, Thursday = ?, Friday = ?, Saturday = ?, Sunday = ?
                WHERE trainer_username = ?
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
                $trainer_username
            );
    
            if ($stmt->execute()) {
                $stmt->close();
                return ['found' => 'yes'];
            } else {
                $stmt->close();
                return ['found' => 'no'];
            }
        } else {
            // Insert new row
            $insertQuery = "
                INSERT INTO instructor_time (trainer_username, gym_username, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param(
                "sssssssss",
                $trainer_username,
                $gym_username,
                $daysData['Monday'],
                $daysData['Tuesday'],
                $daysData['Wednesday'],
                $daysData['Thursday'],
                $daysData['Friday'],
                $daysData['Saturday'],
                $daysData['Sunday']
            );
    
            if ($stmt->execute()) {
                $stmt->close();
                return ['found' => 'yes'];
            } else {
                $stmt->close();
                return ['found' => 'no'];
            }
        }
    }

}
?>