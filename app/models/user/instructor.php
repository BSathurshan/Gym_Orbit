<?php
class Instructor
{
    use Model;  
    
    public function instructor_Details($username)
    {
        $conn = $this->getConnection();  
        
       
        $queryRequested = "SELECT * FROM connects_instructors WHERE user_name = ?";

        $stmt1 = $conn->prepare($queryRequested);
        $stmt1->bind_param("s", $username);
        $stmt1->execute();
        $resultRequested = $stmt1->get_result();


        if ($resultRequested->num_rows > 0) {
            return $resultRequested;
        }else{
            return false;
        }


        $stmt1->close();

    }


    public function request($username)
    {
        $conn = $this->getConnection();

        // Fetch gyms the user has joined
        $queryGyms = "SELECT gym_username FROM connects_gym WHERE username = ?";
        $stmtGyms = $conn->prepare($queryGyms);
        $stmtGyms->bind_param("s", $username);
        $stmtGyms->execute();
        $resultGyms = $stmtGyms->get_result();

        $gymUsernames = [];
        while ($row = $resultGyms->fetch_assoc()) {
            $gymUsernames[] = $row['gym_username'];
        }
        $stmtGyms->close();

        if (!empty($gymUsernames)) {
            // Fetch instructors from the gyms the user has joined
            $placeholders = implode(',', array_fill(0, count($gymUsernames), '?'));
            $queryInstructors = "
                SELECT i.gym_username, i.trainer_username, i.trainer_name, i.age, i.gender, i.experience, i.email, i.file AS profile_image, 
                       ir.status
                FROM instructors i
                LEFT JOIN instructor_request ir 
                ON i.trainer_username = ir.trainer_username AND ir.username = ?
                WHERE i.gym_username IN ($placeholders)";
            $stmtInstructors = $conn->prepare($queryInstructors);

            $types = str_repeat('s', count($gymUsernames) + 1);
            $stmtInstructors->bind_param($types, $username, ...$gymUsernames);
            $stmtInstructors->execute();
            $resultInstructors = $stmtInstructors->get_result();

            $myInstructors = [];
            $otherInstructors = [];
            while ($row = $resultInstructors->fetch_assoc()) {
                if ($row['status'] === 'accepted') {
                    $myInstructors[] = $row;
                } else {
                    $otherInstructors[] = $row;
                }
            }
            $stmtInstructors->close();

            return [
                'myInstructors' => $myInstructors,
                'otherInstructors' => $otherInstructors
            ];
        }

        return ['myInstructors' => [], 'otherInstructors' => []];
    }

    public function send($username, $trainer_name, $trainer_username, $gym_username)
    {
        $conn = $this->getConnection();

        $sql = "INSERT INTO instructor_request (gym_username, trainer_username, trainer_name, username, name) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $gym_username, $trainer_username, $trainer_name, $username, $username);

        $sqlCheck = "SELECT * FROM instructor_request WHERE gym_username = ? AND trainer_username = ? AND username = ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("sss", $gym_username, $trainer_username, $username);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows === 0) {
            $stmt->execute();
            $stmt->close();
            $stmtCheck->close();
            return true;
        }

        $stmt->close();
        $stmtCheck->close();
        return false;
    }

    public function workout_details($username)
    {
        $conn = $this->getConnection();  
        
       
        $queryRequested = "SELECT * FROM workout_schedule WHERE username = ? ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), id";

        $stmt1 = $conn->prepare($queryRequested);
        $stmt1->bind_param("s", $username);
        $stmt1->execute();
        $resultRequested = $stmt1->get_result();


        if ($resultRequested->num_rows > 0) {
            return $resultRequested;
        }else{
            return false;
        }


        $stmt1->close();

    }
    public function workout_delete($username)
    {
        $conn = $this->getConnection();  
        
       
        $queryRequested = "DELETE FROM workout_schedule WHERE username = ?";

        $stmt1 = $conn->prepare($queryRequested);
        $stmt1->bind_param("s", $username);
        return $stmt1->execute();

    }

    public function workout_save($username, $day, $exercise, $sets, $reps)
    {
        $conn = $this->getConnection();  
        $queryRequested = ("INSERT INTO workout_schedule (username, day, exercise, sets, reps) 
        VALUES (?, ?, ?, ?, ?)");
        $stmt1 = $conn->prepare($queryRequested);
            $stmt1->bind_param("sssss", $username, $day, $exercise, $sets, $reps);

        return $stmt1->execute();

    }

}
?>
