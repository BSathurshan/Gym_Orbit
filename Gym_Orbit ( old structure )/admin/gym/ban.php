<?php
require_once '../../connection.php';

// Get the parameters from the URL
if (isset($_GET['gym_username'], $_GET['email'] , $_GET['state'])) {
  
    $banStatus=$_GET['state'];

    if($banStatus=='yes'){
        
    $email = $_GET['email'];
    $gym_username = $_GET['gym_username'];

    // SQL to delete the machine record based on the 'name' field
    $sql = "UPDATE gym SET ban ='yes' WHERE gym_username = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",  $gym_username,$email); 
    $stmt->execute();

        header("Location: ../admin.PHP");
        exit();

    }


    if($banStatus=='no'){

        $email = $_GET['email'];
        $gym_username = $_GET['gym_username'];
    
        // SQL to delete the machine record based on the 'name' field
        $sql = "UPDATE gym SET ban ='no' WHERE gym_username = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $gym_username,$email); 
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
