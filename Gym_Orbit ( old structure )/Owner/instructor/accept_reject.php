<?php
require_once '../../connection.php';

// Get the parameters from the URL
if (isset($_GET['state']) && $_GET['state'] == 'accept') {
 
    $trainer_username = $_GET['trainer_username'];
    $trainer_name=$_GET['trainer_name'];
    $name=$_GET['name'];
    $username =$_GET['username'];
    $gym_username =$_GET['gym_username'];


    $sql = "INSERT INTO connects_instructors VALUES(?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $gym_username, $trainer_username ,$username ,$name ,  $trainer_name); 
    $stmt->execute();


    $sql = "DELETE FROM instructor_request WHERE gym_username=? AND trainer_username=? AND username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $gym_username, $trainer_username ,$username); 
    $stmt->execute();


    $id = uniqid(); 
    $message = "Your instructor [ $trainer_name ($trainer_username) ] request has been accepted by the gym.";
    $sql = "INSERT INTO user_reminders (id, username, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sss", $id, $username, $message);
        $stmt->execute();
        $stmt->close();
    } else {
        die("SQL preparation failed: " . $conn->error);
    }

    header("Location: ../Owner.PHP?alert=Request%20accepted");
    exit();
    

}



if (isset($_GET['state']) && $_GET['state'] == 'reject') {
    require_once '../../connection.php'; 

    $trainer_username = $_GET['trainer_username'];
    $trainer_name = $_GET['trainer_name'];
    $id = uniqid(); 
    $username = $_GET['username'];


    $message = "Your instructor [ $trainer_name ($trainer_username) ] request has been rejected by the gym.";

    $sql = "DELETE FROM instructor_request WHERE gym_username=? AND trainer_username=? AND username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $gym_username, $trainer_username ,$username); 
    $stmt->execute();
    

    $sql = "INSERT INTO user_reminders (id, username, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sss", $id, $username, $message);
        $stmt->execute();
        $stmt->close();
    } else {
        die("SQL preparation failed: " . $conn->error);
    }


    header("Location: ../Owner.PHP?alert=Request%20rejected");
    exit();
}

    
?>
