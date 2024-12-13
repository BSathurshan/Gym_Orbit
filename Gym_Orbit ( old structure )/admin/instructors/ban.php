<?php
require_once '../../connection.php';

// Get the parameters from the URL
if (isset($_GET['trainer_username'], $_GET['email'] , $_GET['state'])) {
  
    $banStatus=$_GET['state'];

    if($banStatus=='yes'){
        
    $email = $_GET['email'];
    $trainer_username = $_GET['trainer_username'];

    // SQL to delete the machine record based on the 'name' field
    $sql = "UPDATE instructors SET ban ='yes' WHERE trainer_username = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",  $trainer_username,$email); 
    $stmt->execute();

        header("Location: ../admin.PHP");
        exit();

    }


    if($banStatus=='no'){

        $email = $_GET['email'];
        $trainer_username = $_GET['trainer_username'];
    
        // SQL to delete the machine record based on the 'name' field
        $sql = "UPDATE instructors SET ban ='no' WHERE trainer_username = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $trainer_username,$email); 
        $stmt->execute();
    
          header("Location: ../admin.PHP");
         exit();



    }
}
    
/*

   //$filePath = "./images/". $file_name; 

   // if (file_exists($filePath)) {
       // unlink($filePath); 
  //  }

  */
?>
