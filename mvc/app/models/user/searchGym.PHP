
<?php

class searchGym
{
    use Model;  

    public function search($username,$name,$search)
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
}

?>
