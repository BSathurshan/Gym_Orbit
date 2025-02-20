<?php
class InstructorSchedule
{
    use Model;  
    
    public function set($startTimes,$endTimes,$gym_username,$trainer_username)
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

                // Process each day's data
                foreach ($startTimes as $day => $times) {
                    $daySlots = []; // Temporary array to store slots for this day

                    foreach ($times as $index => $startTime) {
                        $endTime = $endTimes[$day][$index];
                        $daySlots[] = "$startTime-$endTime"; // Format time slot as "start-end"
                    }

                    // Join all time slots with commas and save to $daysData
                    $daysData[$day] = implode(",", $daySlots);
                }

                // Check if the instructor already exists in the database
                $query = "SELECT * FROM instructor_schedule WHERE 	trainer_username = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $trainer_username);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Update existing row
                    $updateQuery = "
                        UPDATE instructor_schedule
                        SET Monday = ?, Tuesday = ?, Wednesday = ?, Thursday = ?, Friday = ?, Saturday = ?, Sunday = ?
                        WHERE trainer_username = ?
                    ";
                    $stmt = $conn->prepare($updateQuery);
                    $stmt->bind_param(
                        "sssssssi",
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
                        return ['found'=>'yes'];   

                        }
                    else 
                    {
                        $stmt->close();
                        return ['found'=>'no'];   
                    }

                    
                } 
                
                else {
                    // Insert new row
                    $insertQuery = "
                        INSERT INTO instructor_schedule (trainer_username,	gym_username , Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday)
                        VALUES (? , ?, ?, ?, ?, ?, ?, ?, ?)
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
                                return ['found'=>'yes'];   

                                }
                            else 
                            {
                                $stmt->close();
                                return ['found'=>'no'];   
                            }
                                        
                }
    }

}
?>