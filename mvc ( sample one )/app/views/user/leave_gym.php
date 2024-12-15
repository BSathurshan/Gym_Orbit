<?php
require_once '../../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $gym_username = $_GET['gym_username'];
    $username = $_GET['username'];
    

    $sql = " DELETE FROM connects_gym WHERE gym_username=? AND username=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $gym_username ,$username); 
    $stmt->execute();

    header("Location: ../User.PHP");
    exit();
}
?>