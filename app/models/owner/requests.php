<?php
class Requests
{
    use Model;  
    
    public function get($username)
    {
        $conn = $this->getConnection();  

        $sql = "SELECT * FROM instructor_request WHERE gym_username = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $stmt->close();
            return ['found'=>'yes','result'=>$result];   

            }
        else 
        {
            $stmt->close();
            return ['found'=>'no'];   
        }
    }

    public function accept( $trainer_username,$trainer_name,$name,$username,$gym_username )
    {
        $conn = $this->getConnection();  

        $sql = "INSERT INTO connects_instructors VALUES(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $gym_username, $trainer_username ,$username ,$name ,  $trainer_name); 
        $stmt->execute();
    
    
        $sql = "DELETE FROM instructor_request WHERE gym_username=? AND trainer_username=? AND username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $gym_username, $trainer_username ,$username); 
        $stmt->execute();

        $id = uniqid(); 
        $message = "Your instructor [ $trainer_name ($trainer_username) ] request has been accepted by the gym.";
        $sql = "INSERT INTO user_reminders (id, username, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $id, $username, $message);

        if ($stmt->execute()) {

            $stmt->close();
            return ['found'=>'yes1'];   

            }
        else 
        {
            $stmt->close();
            return ['found'=>'no1'];   
        }
    }

    public function reject( $trainer_username,$trainer_name,$username,$gym_username )
    {
        $conn = $this->getConnection();  

        
        $message = "Your instructor [ $trainer_name ($trainer_username) ] request has been rejected by the gym.";

        $sql = "DELETE FROM instructor_request WHERE gym_username=? AND trainer_username=? AND username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $gym_username, $trainer_username ,$username); 
        $stmt->execute();

        $id = uniqid(); 
        $sql = "INSERT INTO user_reminders (id, username, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $id, $username, $message);

        if ($stmt->execute()) {

            $stmt->close();
            return ['found'=>'yes2'];   

            }
        else 
        {
            $stmt->close();
            return ['found'=>'no2'];   
        }
    }
}
?>