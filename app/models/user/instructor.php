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
        
       
        $queryRequested2 = "SELECT * FROM connects_gym WHERE username = ?";

        $stmt2 = $conn->prepare($queryRequested2);
        $stmt2->bind_param("s", $username);
        $stmt2->execute();
        $resultRequested2 = $stmt2->get_result();

        if ($resultRequested2->num_rows > 0) {
            $gymUsernames = [];
            while ($row = $resultRequested2->fetch_assoc()) {
                $gymUsernames[] = $row['gym_username'];
            }
        }

        if (!empty($gymUsernames)) {
            $placeholders = implode(',', array_fill(0, count($gymUsernames), '?'));
            $query2 = "SELECT * FROM instructors WHERE gym_username IN ($placeholders)";
            $stmt3 = $conn->prepare($query2);

            $types = str_repeat('s', count($gymUsernames));
            $stmt3->bind_param($types, ...$gymUsernames);

            $stmt3->execute();
            $result = $stmt3->get_result();
            
            
            $stmt2->close();
            $stmt3->close();
            return $result;
            } 
            else 
            {
            $stmt2->close();
            return false;
            }
  

    }

    public function send($username,$name,$trainer_name, $trainer_username,$gym_username)
    {
        $conn = $this->getConnection();  
        
       
        $sql = "INSERT INTO instructor_request (gym_username,trainer_username,trainer_name,username,name) 
            VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss",  $gym_username, $trainer_username,$trainer_name,$username,$name); 

        $sql2 = "SELECT * FROM instructor_request WHERE gym_username=? AND trainer_username=? AND username=?" ;
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("sss",  $gym_username, $trainer_username,$username);     
        $stmt2->execute();
        $checking=$stmt2->get_result();

        if($checking->num_rows == 0){
            $stmt->execute();

            $stmt->close();
            $stmt2->close();
            return true;
        }
        else{

            $stmt->close();
            $stmt2->close();
            return false;
        }
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
