<?php

class Reminders
{
    use Model;  

    public function get($username)
    {

            $conn = $this->getConnection(); 

            $sql = "SELECT * FROM admin_reminders WHERE id = ? ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {

                $stmt->close();
                return ['found'=>'yes','result'=>$result];   
 
                }
            else 
            {
                $stmt->close();
                return ['found'=>'no'];   
            }
 }


 
 public function update( $username ,$category,$title,$start,$end)
 {

         $conn = $this->getConnection(); 
         $id=uniqid();
         $sql = "INSERT INTO system (id,admin_username,category,title,start,end) VALUES (?, ?, ?, ?, ?, ?)";
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("ssssss",$id,$username ,$category,$title,$start,$end);


         if ($stmt->execute()) {

             $stmt->close();
             return true ;   

             }
         else 
         {
             $stmt->close();
             return false;   
         }
}
}    
?>