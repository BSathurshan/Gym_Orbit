<?php
class Messages
{
    use Model;  

    public function get()
    {
        $conn = $this->getConnection();  

         // Fetch connected gyms
         $sql = "SELECT * FROM support";
         $stmt = $conn->prepare($sql);
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