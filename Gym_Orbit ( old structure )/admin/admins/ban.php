<?php
require_once '../../connection.php';

// Get the parameters from the URL
if (isset($_GET['admin_username'], $_GET['email'] , $_GET['state'])) {
  
    $banStatus=$_GET['state'];

    if($banStatus=='yes'){
        
    $email = $_GET['email'];
    $admin_username = $_GET['admin_username'];

    // SQL to delete the machine record based on the 'name' field
    $sql = "UPDATE admin SET ban ='yes' WHERE admin_username = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",  $admin_username,$email); 
    $stmt->execute();

        header("Location: ../admin.PHP");
        exit();

    }


    if($banStatus=='no'){

        $email = $_GET['email'];
        $admin_username = $_GET['admin_username'];
    
        // SQL to delete the machine record based on the 'name' field
        $sql = "UPDATE admin SET ban ='no' WHERE admin_username = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $admin_username,$email); 
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
