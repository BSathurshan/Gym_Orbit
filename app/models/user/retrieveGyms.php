<?php
class RetrieveGyms
{
    use Model;  
    
    public function joined($username)
    {
        $conn = $this->getConnection();  
        
        $stmt = $conn->prepare("SELECT gym_username FROM connects_gym WHERE username = ?");
        $stmt->bind_param("s", $username); 
        $stmt->execute();
        $check = $stmt->get_result();

        if ($check->num_rows > 0) {

            $gymUsernames = [];
            while ($row = $check->fetch_assoc()) {
                $gymUsernames[] = $row['gym_username'];
            }

            $placeholders = implode(',', array_fill(0, count($gymUsernames), '?'));
             $query2 = "SELECT * FROM gym WHERE gym_username IN ($placeholders)";
             $stmt2 = $conn->prepare($query2);

             $types = str_repeat('s', count($gymUsernames));
             $stmt2->bind_param($types, ...$gymUsernames);
             $stmt2->execute();

             $result = $stmt2->get_result();


             $stmt->close();
             $stmt2->close();
             return ['found'=>'yes','result'=>$result];  
           
        } else {
            $stmt->close();
            return ['found'=>'no'];  
        }
    }

    public function joined_premium($username)
    {
        $conn = $this->getConnection();  
        
        $type='premium';
        $stmt = $conn->prepare("SELECT gym_username FROM connects_gym WHERE username = ? And type =?");
        $stmt->bind_param("ss", $username,$type); 
        $stmt->execute();
        $check = $stmt->get_result();

        if ($check->num_rows > 0) {

            $gymUsernames = [];
            while ($row = $check->fetch_assoc()) {
                $gymUsernames[] = $row['gym_username'];
            }

            $placeholders = implode(',', array_fill(0, count($gymUsernames), '?'));
             $query2 = "SELECT * FROM gym WHERE gym_username IN ($placeholders)";
             $stmt2 = $conn->prepare($query2);

             $types = str_repeat('s', count($gymUsernames));
             $stmt2->bind_param($types, ...$gymUsernames);
             $stmt2->execute();

             $result = $stmt2->get_result();


             $stmt->close();
             $stmt2->close();
             return ['found'=>'yes','result'=>$result];  
           
        } else {
            $stmt->close();
            return ['found'=>'no'];  
        }
    }

    public function joined_normal($username)
    {
        $conn = $this->getConnection();  
        
        $type='normal';
        $stmt = $conn->prepare("SELECT gym_username FROM connects_gym WHERE username = ? And type =?");
        $stmt->bind_param("ss", $username,$type); 
        $stmt->execute();
        $check = $stmt->get_result();

        if ($check->num_rows > 0) {

            $gymUsernames = [];
            while ($row = $check->fetch_assoc()) {
                $gymUsernames[] = $row['gym_username'];
            }

            $placeholders = implode(',', array_fill(0, count($gymUsernames), '?'));
             $query2 = "SELECT * FROM gym WHERE gym_username IN ($placeholders)";
             $stmt2 = $conn->prepare($query2);

             $types = str_repeat('s', count($gymUsernames));
             $stmt2->bind_param($types, ...$gymUsernames);
             $stmt2->execute();

             $result = $stmt2->get_result();


             $stmt->close();
             $stmt2->close();
             return ['found'=>'yes','result'=>$result];  
           
        } else {
            $stmt->close();
            return ['found'=>'no'];  
        }
    }
}
?>
