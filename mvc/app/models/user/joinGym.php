<?php

class joinGym
{
    use Model;  

    public function join($gym_username,$gym_name,$username, $name )
    {

            $conn = $this->getConnection(); 

            $sql = " SELECT * FROM connects_gym WHERE `gym_username`=? AND `username`= ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $gym_username ,$username ); 
            $stmt->execute();

            $check=$stmt->get_result();

        if($check->num_rows == 0){

            $sql2 = " INSERT INTO connects_gym (username,gym_username,user_Name,gym_Name) VALUES(?,?,?,?) ";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("ssss",$username, $gym_username ,$name,$gym_name ); 

            if ($stmt2->execute()) {

                return true;
 
                }
            else 
            {
                return false;
            }
        }
        
        else
        
        {
                return ['duplicate'=>'true'];

        }
 }
}    
?>