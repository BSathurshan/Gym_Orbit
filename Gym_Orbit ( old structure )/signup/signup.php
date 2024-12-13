<?php include '../connection.php'; ?>
<?php

if($_POST['type']=='user'){

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $location = $_POST['location'];
    $health = $_POST['health'];
    $activeMode = $_POST['activeMode'];
    $goalChoice = $_POST['goalChoice'];
    $achieveChoice = $_POST['achieveChoice'];

    $file = $_FILES['file'];
    $file_name=NULL;


    $sql = "SELECT * FROM user  WHERE email = ? AND username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $username); 
    $stmt->execute(); 


    $resultRequested = $stmt->get_result();

    if ($resultRequested->num_rows == 0) {

    if ($file && $file['error'] == 0) {

        $tmpName=$file["tmp_name"];
        $file_name=$file["name"];

        $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        $file_name =$newImageName;

        $targetFile = "../User/profile/images/$newImageName";

        move_uploaded_file($tmpName, $targetFile);
    } 

    // Add to database
    $sql = "INSERT INTO user (username,password, name, email, age, gender,contact,location,goals,active,health,file,achieve) VALUES
             (?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssss",  $username ,$password, $name ,$email,$age, $gender,$contact,$location,$goalChoice,$activeMode,$health, $file_name,$achieveChoice);
    $stmt->execute();
    


    }else{

        echo "username or email already taken";
    }


    if($_POST['access']=='admin'){

        header("Location: ../../../admin/admin.PHP");
        exit();
    }
        // Redirect back to the machines page
        header("Location: ../Home/Home.html");
        exit();
}

}
else if ($_POST['type'] == 'owner') {
   
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $owner_name = $_POST['owner_name'];
        $email = $_POST['email'];
        $gym_username = $_POST['username'];
        $password = $_POST['password'];


        $gym_name = $_POST['gym_name'];
        $owner_contact = $_POST['owner_contact'];
        $gym_contact = $_POST['gym_contact'];
        $location = $_POST['location'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $start_year = $_POST['start_year'];
        $experience = $_POST['experience'];

        $web = $_POST['web'];
        $social = $_POST['social'];
    
        $file = $_FILES['file'];
        $file_name=NULL;
    
    
        $sql = "SELECT * FROM gym  WHERE email = ? AND gym_username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $gym_username); 
        $stmt->execute(); 
    
    
        $resultRequested = $stmt->get_result();
    
        if ($resultRequested->num_rows == 0) {
    
        if ($file && $file['error'] == 0) {
    
            $tmpName=$file["tmp_name"];
            $file_name=$file["name"];
    
            $imageExtension = pathinfo($file_name, PATHINFO_EXTENSION);
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            $file_name =$newImageName;
    
            $targetFile = "../Owner/profile/images/$newImageName";
    
            move_uploaded_file($tmpName, $targetFile);
        } 
    
        // Add to database
        $sql = "INSERT INTO gym (gym_username,gym_name,password, owner_name, email, age, gender,location,gym_contact,owner_contact,start_year,experience,web,social,file) VALUES
                 (?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssss",  $gym_username , $gym_name ,$password, $owner_name ,$email,$age, $gender,$location,$gym_contact,$owner_contact,$start_year,$experience,$web,$social, $file_name);
        $stmt->execute();
        
    
    
        }else{
    
            echo "username or email already taken";
            header("Location: ./signup.php");
        }
    
            // Redirect back to the machines page
            header("Location: ../Home/Home.html");
            exit();
    }




}
?>
