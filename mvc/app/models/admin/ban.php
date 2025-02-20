<?php
class Ban
{
    use Model;  

    public function user($username,$email)
    {
        $conn = $this->getConnection();  

        $sql = "UPDATE user SET ban ='yes' WHERE username = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $username,$email); 

         if( $stmt->execute() ){
             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }

    
    }

    public function gym($username,$email)
    {
        $conn = $this->getConnection();  

        $sql = "UPDATE gym SET ban ='yes' WHERE gym_username = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $username,$email); 

         if( $stmt->execute() ){
             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }

    
    }

    public function instructor($username,$email)
    {
        $conn = $this->getConnection();  

        $sql = "UPDATE instructors SET ban ='yes' WHERE trainer_username = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $username,$email); 

         if( $stmt->execute() ){
             $stmt->close();
             return ['found'=>'yes'];   
     
         } else 
         {
            $stmt->close();
            return ['found'=>'no'];   
         }

    
    }

    public function admin($username,$email)
    {
        $conn = $this->getConnection();  

        $sql = "UPDATE admin SET ban ='yes' WHERE admin_username = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $username,$email); 

         if( $stmt->execute() ){
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