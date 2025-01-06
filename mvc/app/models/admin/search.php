<?php

class search
{
    use Model;  

    public function getUsers($search)
    {

            $conn = $this->getConnection(); 

            if ($search !== '') {
                // Query for filtered search
                $sql = "SELECT * FROM user WHERE name LIKE ? OR username LIKE ? OR email LIKE ? ORDER BY name ASC";
                $stmt = $conn->prepare($sql);
                $searchTerm = "%" . $search . "%";
                $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
            } else {
                // Default query to fetch all users
                $sql = "SELECT * FROM user ORDER BY name ASC";
                $stmt = $conn->prepare($sql);
            }
            
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
 }

 public function getGyms($search)
 {

         $conn = $this->getConnection(); 

         if ($search !== '') {
            // Query for filtered search
            $sql = "SELECT * FROM gym WHERE gym_name LIKE ? OR gym_username LIKE ? OR email LIKE ? ORDER BY gym_name ASC";
            $stmt = $conn->prepare($sql);
            $searchTerm = "%" . $search . "%";
            $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
        } else {
            // Default query to fetch all users
            $sql = "SELECT * FROM gym ORDER BY gym_name ASC";
            $stmt = $conn->prepare($sql);
        }
         
         $stmt->execute();
         $result = $stmt->get_result();
         return $result;
}

public function getInstructors($search)
{

        $conn = $this->getConnection(); 

        if ($search !== '') {
            // Query for filtered search
            $sql = "SELECT * FROM instructors WHERE trainer_name LIKE ? OR trainer_username LIKE ? OR email LIKE ? ORDER BY trainer_name ASC";
            $stmt = $conn->prepare($sql);
            $searchTerm = "%" . $search . "%";
            $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
        } else {
            // Default query to fetch all users
            $sql = "SELECT * FROM instructors ORDER BY trainer_name ASC";
            $stmt = $conn->prepare($sql);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
}


public function getAdmins($search)
{

        $conn = $this->getConnection(); 

        if ($search !== '') {
            // Query for filtered search
            $sql = "SELECT * FROM admin WHERE admin_name LIKE ? OR admin_username LIKE ? OR email LIKE ? ORDER BY admin_name ASC";
            $stmt = $conn->prepare($sql);
            $searchTerm = "%" . $search . "%";
            $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
        } else {
            // Default query to fetch all users
            $sql = "SELECT * FROM admin ORDER BY admin_name ASC";
            $stmt = $conn->prepare($sql);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
}

}    
?>