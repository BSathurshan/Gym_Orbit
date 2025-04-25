<?php
class EditDetails
{
    use Model;  

    public function name($username ,$newName)
    {
        $conn = $this->getConnection();  

        $sql = "UPDATE user SET name = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $newName, $username); 

         if( $stmt->execute() ){

             $stmt->close();
             return true;   
     
         } else 
         {
            $stmt->close();
            return false;   
         }
    
    }

    public function age($username ,$newAge)
    {
        $conn = $this->getConnection();  

        $sql = "UPDATE user SET age = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $newAge, $username); 

         if( $stmt->execute() ){

             $stmt->close();
             return true;   
     
         } else 
         {
            $stmt->close();
            return false;   
         }
    
    }

    

 }
?>