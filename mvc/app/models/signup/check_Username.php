<?php
class Check_Username
{
    use Model; 
    public function check( $username)
    {

        // Get the database connection from the Model trait
        $conn = $this->getConnection();

            // Fetch connected gyms
            $sql = "SELECT * FROM user WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0)
            {
                return ['found'=>'user'];
            }
                else
                {
                    $sql2 = "SELECT * FROM gym WHERE gym_username = ? ";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bind_param("s",$username);
                    $stmt2->execute();
                    $result = $stmt2->get_result();

                    if($result->num_rows >0)
                    {
                        return ['found'=>'owner'];
                    }

                        else{
                            $sql3 = "SELECT * FROM instructors WHERE trainer_username = ?";
                            $stmt3 = $conn->prepare($sql3);
                            $stmt3->bind_param("s",$username);
                            $stmt3->execute();
                            $result = $stmt3->get_result();

                            if($result->num_rows >0)
                            {
                                return ['found'=>'instructor'];
                            }
                                    else{

                                        $sql4 = "SELECT * FROM admin WHERE  admin_username = ?";
                                        $stmt4 = $conn->prepare($sql4);
                                        $stmt4->bind_param("s",$username);
                                        $stmt4->execute();
                                        $result = $stmt4->get_result();

                                        if($result->num_rows >0)
                                        {
                                            return ['found'=>'admin'];
                                        }
                                               
                                        
                                            else{
                                                    return ['found'=>'no'];
                                                }

                                    }

                        }
                }


           


          


           
    


       
    }
}

