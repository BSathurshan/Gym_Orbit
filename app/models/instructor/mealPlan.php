<?php
class MealPlan
{
    use Model;  
    

    public function get_Requests($username)
    {
        $conn = $this->getConnection();  

        $sql = "SELECT * FROM mealplan_request WHERE trainer_username = ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username );
                $stmt->execute();
                $resultRequested=$stmt->get_result();          

                $Usernames = [];
                while ($row = $resultRequested->fetch_assoc()) {
                    $Usernames[] = $row['username'];
                }
                
                $stmt->close();
            
                if (!empty($Usernames)) {
                    $placeholders = implode(',', array_fill(0, count($Usernames), '?'));
                    $query = "SELECT * FROM user WHERE username IN ($placeholders)";
                    $stmt = $conn->prepare($query);
                    $types = str_repeat('s', count($Usernames));
                    $stmt->bind_param($types, ...$Usernames);
                    $stmt->execute();
                    $result = $stmt->get_result();
            
                    if ($result->num_rows > 0) {
                        $stmt->close();
                        return ['found' => 'yes', 'result' => $result];
                    } else {
                        $stmt->close();
                        return ['found' => 'no'];
        
                    }
                } else {
                    return ['found' => 'alert'];
                }
        
    }
    
    
    public function get_MealPlans($gym_username)
    {
        $conn = $this->getConnection();  

        $sql = "SELECT * FROM workout_schedule WHERE username = ? ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), id";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username );
                $stmt->execute();
                $result=$stmt->get_result();          

                if ($result->num_rows > 0) 
                {
                    $stmt->close();
                    return ['found'=>'yes','result'=>$result];
                } 
                else 
                {
                    $stmt->close();
                    return ['found'=>'no'];
                }
        
    }


    public function assign($gym_username)
    {
        $conn = $this->getConnection();  

        $sql = "SELECT * FROM workout_schedule WHERE username = ? ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), id";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username );
                $stmt->execute();
                $result=$stmt->get_result();          

                if ($result->num_rows > 0) 
                {
                    $stmt->close();
                    return ['found'=>'yes','result'=>$result];
                } 
                else 
                {
                    $stmt->close();
                    return ['found'=>'no'];
                }
        
    }

    public function workout_save($username, $day, $exercise, $sets, $reps)
    {
        $conn = $this->getConnection();  
        $queryRequested = ("INSERT INTO workout_schedule (username, day, exercise, sets, reps) 
        VALUES (?, ?, ?, ?, ?)");
        $stmt1 = $conn->prepare($queryRequested);
            $stmt1->bind_param("sssss", $username, $day, $exercise, $sets, $reps);

        if($stmt1->execute()){
            $trainer_username=$_SESSION['username'];
            $sql2 = "DELETE FROM mealplan_request WHERE username=? AND trainer_username=? ";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("ss", $username, $trainer_username);
            $stmt2->execute();

            return true;

        }else{
            return false;
        }

    }

    public function workout_delete($username)
    {
        $conn = $this->getConnection();  
        
       
        $queryRequested = "DELETE FROM workout_schedule WHERE username = ?";

        $stmt1 = $conn->prepare($queryRequested);
        $stmt1->bind_param("s", $username);
        return $stmt1->execute();

    }
}
?>
