<?php
class LoginModel
{
    use Model; 
    public function authenticateUser($username, $password)
    {
        // Get the database connection from the Model trait
        $conn = $this->getConnection();


        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $type='user';

        if ($result->num_rows === 0) {
            // Check the gym table
            $stmt = $conn->prepare("SELECT * FROM gym WHERE gym_username = ? AND password = ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            $type='owner';

            if ($result->num_rows === 0) {
                // Check the instructors table
                $stmt = $conn->prepare("SELECT * FROM instructors WHERE trainer_username = ? AND password = ?");
                $stmt->bind_param("ss", $username, $password);
                $stmt->execute();
                $result = $stmt->get_result();
                $type='instructor';

                if ($result->num_rows === 0) {
                    // Check the admin table
                    $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_username = ? AND password = ?");
                    $stmt->bind_param("ss", $username, $password);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $type='admin';

                }
            }
        }
 
        if ($result->num_rows > 0) {
            $userDetails = $result->fetch_assoc();
            

            if ($userDetails['ban'] != "yes") 
            {
                return ['found'=>'yes','ban'=>'no','details'=>$userDetails ,'type'=>$type]; 
            } 
            
            elseif($userDetails['ban'] == "yes")
            {
                return ['found'=>'yes','ban'=>'yes']; 
            }
        } else {

            return ['found'=>'no']; 
        }

        $stmt->close();
    }
}

