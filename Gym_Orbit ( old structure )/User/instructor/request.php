<?php
require_once '../../connection.php';


if (isset($_GET['gym_username'],$_GET['trainer_username'], $_GET['trainer_name'] , $_GET['name'],$_GET['username'])) {
  
   



    $gym_username = $_GET['gym_username'];
    $trainer_username =$_GET['trainer_username'];
    $trainer_name = $_GET['trainer_name'] ;
    $name = $_GET['name'];
    $username =$_GET['username'];

    
        // SQL to delete the machine record based on the 'name' field
        $sql = "INSERT INTO instructor_request (gym_username,trainer_username,trainer_name,username,name) 
            VALUES (?,?,?,?,?)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss",  $gym_username, $trainer_username,$trainer_name,$username,$name); 
        $stmt->execute();
    
          header("Location: ../User.php");
         exit();



    
}
    
?>
