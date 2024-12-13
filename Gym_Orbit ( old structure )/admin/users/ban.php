<?php
require_once '../../connection.php';

// Get the parameters from the URL
if (isset($_GET['username'], $_GET['email'] , $_GET['state'])) {
  
    $banStatus=$_GET['state'];

    if($banStatus=='yes'){
        
    $email = $_GET['email'];
    $username = $_GET['username'];

    // SQL to delete the machine record based on the 'name' field
    $sql = "UPDATE user SET ban ='yes' WHERE username = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",  $username,$email); 
    $stmt->execute();

        header("Location: ../admin.PHP");
        exit();

    }


    if($banStatus=='no'){

        $email = $_GET['email'];
        $username = $_GET['username'];
    
        // SQL to delete the machine record based on the 'name' field
        $sql = "UPDATE user SET ban ='no' WHERE username = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $username,$email); 
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
