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

    public function reply($issue, $message, $username, $role, $email)
    {
        $conn = $this->getConnection();
        $time = date('Y-m-d H:i:s');

        $sql = "INSERT INTO reply (username, email, role, issue, message, time) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            return ['found' => 'no', 'error' => $conn->error];
        }

        $stmt->bind_param("ssssss", $username, $email, $role, $issue, $message, $time);

        if ($stmt->execute()) {
            $stmt->close();
            return ['found' => 'yes'];
        } else {
            $stmt->close();
            return ['found' => 'no'];
        }
    }
 }
?>