<?php
class EditProfile
{
    use Model;  

    public function edit($email ,$username ,$name, $contact, $location, $age,  $gender)
    {
        $conn = $this->getConnection();  

        $sql = "UPDATE user SET name = ? ,contact = ? ,location = ? , age = ? , gender = ?  WHERE email = ? AND username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $name, $contact, $location, $age,  $gender ,$email ,$username); 

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