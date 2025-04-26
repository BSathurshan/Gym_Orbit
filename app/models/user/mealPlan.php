<?php
class MealPlan
{
    use Model;  

    public function sendRequest($username,$name,$trainer_name, $trainer_username,$gym_username)
    {
        $conn = $this->getConnection();  
        
       
        $sql = "INSERT INTO mealplan_request (gym_username,trainer_username,trainer_name,username,name) 
            VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss",  $gym_username, $trainer_username,$trainer_name,$username,$name); 

        $sql2 = "SELECT * FROM mealplan_request WHERE gym_username=? AND trainer_username=? AND username=?" ;
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("sss",  $gym_username, $trainer_username,$username);     
        $stmt2->execute();
        $checking=$stmt2->get_result();

        if($checking->num_rows == 0){
            $stmt->execute();

            $stmt->close();
            $stmt2->close();
            return true;
        }
        else{

            $stmt->close();
            $stmt2->close();
            return false;
        }
    }
}
?>