<?php
class Requests
{
    use Model;

    public function addRequest($trainer_username, $trainer_name, $username, $name, $gym_username)
    {
        $conn = $this->getConnection();

        $sql = "INSERT INTO instructor_request (gym_username, trainer_username, trainer_name, username, name, status) VALUES (?, ?, ?, ?, ?, 'pending')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $gym_username, $trainer_username, $trainer_name, $username, $name);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        }

        $stmt->close();
        return false;
    }
}
