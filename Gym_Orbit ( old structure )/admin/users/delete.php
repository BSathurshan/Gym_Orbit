<?php
require_once '../../connection.php';

// Get the parameters from the URL
if (isset($_GET['username'], $_GET['email'])) {
  
    $email = $_GET['email'];
    $username = $_GET['username'];
    $file_name=$_GET['file'];

    // SQL to delete the machine record based on the 'name' field
    $sql = "DELETE FROM user WHERE username = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",  $username,$email); 
    $stmt->execute();


    $filePath = "../../User/profile/images/". $file_name; 

    if (file_exists($filePath)) {
        unlink($filePath); 
    }


        header("Location: ../admin.PHP");
        exit();



}
    

   //$filePath = "./images/". $file_name; 

   // if (file_exists($filePath)) {
       // unlink($filePath); 
  //  }

?>
