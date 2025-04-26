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
            

            if ($userDetails['ban'] != "yes" && ($userDetails['verify'] == "yes" || $userDetails['verify'] === null))
            {
                return ['found'=>'yes','ban'=>'no','details'=>$userDetails ,'type'=>$type,'verified'=>'yes']; 
            } 
            
            elseif($userDetails['ban'] != "yes" && $userDetails['verify'] == "no"){
                return ['found'=>'yes','ban'=>'no','verified'=>'no']; 
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

    public function isSubscriptionActive($username)
    {
        $conn = $this->getConnection();
        $today = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("SELECT end FROM user_payments WHERE username = ? AND status = 'Complete' ORDER BY end DESC LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows === 0) {
            return false; // No completed payments found
        }

        $row = $result->fetch_assoc();
        $endDate = $row['end'];

        if ($endDate > $today) {
            return true; // Latest completed payment's end date is in the future
        } else {
            return false; // Latest completed payment's end date is in the past
        }
    }
}

