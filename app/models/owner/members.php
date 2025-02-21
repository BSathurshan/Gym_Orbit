<?php
class Members
{
    use Model;  
    
    public function get($username)
    {
        $conn = $this->getConnection();  


        $sql = "SELECT * FROM connects_gym WHERE gym_username= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultRequested = $stmt->get_result();

        $Usernames = [];
        while ($row = $resultRequested->fetch_assoc()) {
            $Usernames[] = $row['username'];
        }


        // Step 2: Fetch posts if connected to gyms
        if (!empty($Usernames)) {
            $placeholders = implode(',', array_fill(0, count($Usernames), '?'));
            $query2 = "SELECT * FROM user WHERE username IN ($placeholders)";
            $stmt2 = $conn->prepare($query2);

            $types = str_repeat('s', count($Usernames));
            $stmt2->bind_param($types, ...$Usernames);

            $stmt2->execute();
            $result = $stmt2->get_result();

            $stmt->close();
            $stmt2->close();
            return ['found'=>'yes','result'=>$result];   
        }
        else
        {
            $stmt->close();
            return ['found'=>'no'];   
        }

    }

    public function remove($gym_username,$username)
    {
        $conn = $this->getConnection();  

        $sql = " DELETE FROM connects_gym WHERE gym_username=? AND username=? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $gym_username ,$username); 


         if($stmt->execute()){
             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }

    
    }
}
?>