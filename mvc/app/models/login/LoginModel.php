<?php
class LoginModel
{
    use Model; 
    public function authenticateUser($username, $password, $type)
    {
        // Get the database connection from the Model trait
        $conn = $this->getConnection();


        if ($type == 'user') {
            $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        } elseif ($type == 'owner') {
            $stmt = $conn->prepare("SELECT * FROM gym WHERE gym_username = ? AND password = ?");
        } elseif ($type == 'instructor') {
            $stmt = $conn->prepare("SELECT * FROM instructors WHERE trainer_username = ? AND password = ?");
        } elseif ($type == 'admin') {
            $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_username = ? AND password = ?");
        } else {
            return false;
        }


        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

 
        if ($result->num_rows > 0) {
            $userDetails = $result->fetch_assoc();
            

            if ($userDetails['ban'] != "yes") 
            {
                return $userDetails; 
            } 
            
            elseif($userDetails['ban'] == "yes")
            {
                return false; // Return false if banned
            }
        } else {
            return false; // Return false if no user found
        }

        $stmt->close();
    }
}

