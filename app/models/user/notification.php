<?php

class Notification
{
    use Model;

    public function get($username)
    {
        $conn = $this->getConnection();

        $sql = "SELECT username, issue, message, time FROM reply WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            return $result;

            }
        else 
        {
            return false;
        }
    }
}

   
?>