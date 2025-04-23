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

    public function reply($username, $email ,$issue,$message ,$reply ,$role)
    {
        $conn = $this->getConnection();
        $time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO reply (username, email, role, issue, message, time ,reply) VALUES (?, ?, ?, ?, ?, ? ,? )";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            return ['found' => 'no', 'error' => $conn->error];
        }

        $stmt->bind_param("sssssss", $username, $email, $role, $issue, $message, $time ,$reply);

        if ($stmt->execute()) {

            $status = 'solved';
            $sql2 = "UPDATE support SET status = ? WHERE username = ?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("ss", $status,$username);
            
            if ($stmt2->execute()){
                return ['found' => 'yes'];
            }else{
                return ['found'=>'alert'];
            }

            $stmt2->close();
            $stmt->close();
            
        } else {
            $stmt->close();
            return ['found' => 'no'];
        }
    }

    public function closeSupport($username,$time)
    {
        $conn = $this->getConnection();  

         // Fetch connected gyms
         $sql = "DELETE FROM support WHERE username = ? AND time = ?";
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("ss", $username,$time); 

    
         if( $stmt->execute()){
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