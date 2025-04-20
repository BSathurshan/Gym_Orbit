<?php
class Appointments
{
    use Model;  

    public function get($username)
    {
        $conn = $this->getConnection();  

         // Fetch connected gyms
         $sql = "SELECT * FROM bookings WHERE username= ? ORDER BY date DESC";
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("s", $username);
         $stmt->execute();
         $check = $stmt->get_result();

         if($check ->num_rows > 0){

             return ['found'=>'yes','result'=>$check];   
     
        }
        else{
            return ['found'=> 'no'];
        }
    
    }
}    
?>