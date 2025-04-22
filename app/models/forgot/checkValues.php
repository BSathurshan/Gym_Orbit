<?php
class checkValues
{
    use Model;  
    
    public function check($username,$email)
    {
        $conn = $this->getConnection();  
        

                $sql = "SELECT * FROM user WHERE username= ? AND email=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $username,$email);
                $stmt->execute();
                $check = $stmt->get_result();

                    if ($check->num_rows > 0) {

                        $result = $check->fetch_assoc();
                        $stmt->close();
                        return ['found'=>'true','pass'=>$result['password']];
                    } 
                    else 
                    {
                        $stmt->close();
                        return ['found'=>'false'];
                    }
    }
}
?>
