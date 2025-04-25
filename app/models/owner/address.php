<?php
class Address {
    use Model;  

    public function updateAddress($username, $address, $lat, $lang, $role) {
        $conn = $this->getConnection();  
        $success = true;

        // Default values if lat or lang is null or empty
        if (empty($lat) || empty($lang)) {
            $lat = "6.9271";
            $lang = "79.8612";
        }

        if ($role == 'gym') {
            $sql = "UPDATE gym SET location = ? WHERE gym_username = ?";
        } elseif ($role == 'user') {
            $sql = "UPDATE user SET location = ? WHERE username = ?";
        }

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $address, $username);

        if ($stmt->execute()) {
            $sql2 = "INSERT INTO map (username, role, location, lat, lang)
                     VALUES (?, ?, ?, ?, ?)
                     ON DUPLICATE KEY UPDATE 
                       role = VALUES(role), 
                       location = VALUES(location), 
                       lat = VALUES(lat), 
                       lang = VALUES(lang)";

            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("sssss", $username, $role, $address, $lat, $lang);
            $stmt2->execute();

            $success = true;
        } else {
            $success = false;
        }

        return $success; 
    }

    public function getGymLocations() {
        $conn = $this->getConnection();  
    
        $sql = "
            SELECT m.username, m.location, m.lat, m.lang, g.gym_name, g.file
            FROM map m
            JOIN gym g ON m.username = g.gym_username
            WHERE m.role = 'gym'
        ";
    
        $result = $conn->query($sql);
        $gyms = [];
    
        while ($row = $result->fetch_assoc()) {
            $gyms[] = $row;
        }
    
        return $gyms;
    }

}
