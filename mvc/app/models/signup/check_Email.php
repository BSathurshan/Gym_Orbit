<?php
class Check_Email
{
    use Model; 
    public function check($email)
    {
        // Get the database connection from the Model trait
        $conn = $this->getConnection();

        // Fetch user by email
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return ['found' => 'user']; // Email found in the user table
                } 
                
                else {
                    // Check if email exists in gym table
                    $sql2 = "SELECT * FROM gym WHERE email = ?";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bind_param("s", $email);
                    $stmt2->execute();
                    $result2 = $stmt2->get_result();

                    if ($result2->num_rows > 0) {
                        return ['found' => 'owner']; // Email found in gym table
                                } 
                                
                                else {
                    
                                    $sql3 = "SELECT * FROM instructors WHERE email = ?";
                                    $stmt3 = $conn->prepare($sql3);
                                    $stmt3->bind_param("s", $email);
                                    $stmt3->execute();
                                    $result3 = $stmt3->get_result();

                                    if ($result3->num_rows > 0) {
                                        return ['found' => 'instructor']; // Email found in instructors table
                                                } 
                                                
                                                else {
      
                                                    $sql4 = "SELECT * FROM admin WHERE email = ?";
                                                    $stmt4 = $conn->prepare($sql4);
                                                    $stmt4->bind_param("s", $email);
                                                    $stmt4->execute();
                                                    $result4 = $stmt4->get_result();

                                                    if ($result4->num_rows > 0) {
                                                        return ['found' => 'admin']; // Email found in admin table
                                                            } 
                                                            
                                                            else {
                                                                return ['found' => 'no']; // Email not found in any table
                                                            }
                                                }
                                }
                }
    }
}

?>