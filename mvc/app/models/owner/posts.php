<?php
class Posts
{
    use Model;  

    public function get($username)
    {
        $conn = $this->getConnection();  

         // Fetch connected gyms
         $sql = "SELECT * FROM posts WHERE gym_username = ?";
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("s", $username);
         $stmt->execute();
         $result = $stmt->get_result();

         if( $result->num_rows > 0){
             $stmt->close();
             return ['found'=>'yes','result'=>$result];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }

    
    }
 }
?>