<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $type= $_POST["type"];
   
    

   if($type=='User'){
    
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    
    $stmt->execute();
    $result = $stmt->get_result();

   }
   elseif($type=='Owner'){

    $stmt = $conn->prepare("SELECT * FROM gym WHERE gym_username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    
    $stmt->execute();
    $result = $stmt->get_result();

   }
   elseif($type=='instructor'){

    $stmt = $conn->prepare("SELECT * FROM instructors WHERE trainer_username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    
    $stmt->execute();
    $result = $stmt->get_result();

   }
   elseif($type=='admin'){

    $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    
    $stmt->execute();
    $result = $stmt->get_result();

   }
    
    
    

    if ($result->num_rows > 0) {


        $userDetails = $result->fetch_assoc();

        if($userDetails['ban']!="yes"){
          $_SESSION["username"] = $username;

          $_SESSION["userDetails"] = $userDetails;
  
          header("Location: ../$type/$type.php");
          exit();
        }
        else{
          echo "<script>alert('Client account has been banned');</script>";
        }


        }

       
    
    
    else {
        echo "Invalid username or password";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">


 <head>
    <meta charset="utf-8">
    <title> | Login Form | </title>

    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/login_slide.css">
  
</head>
  
<body>



<div class=main>
<H1> LOGIN </H1>
<FORM method="POST">



 <!-- Dropdown for selecting user type -->
 <div class="field">
      <select name="type" required>
        <option value="" disabled selected></option>
        <option value="User">User</option>
        <option value="Owner">Owner</option>
        <option value="instructor">Instructor</option>
        <option value="admin">Admin</option>
      </select>
      <label>User Type </label>
    </div>

  <div class="field">
     
    <input type="text" name="username" required>
    <label> Username </label>
    
   </div>

  <div class="field"> 
     
    <input type="password" name="password" required>
    <label> Password </label>
     
   </div>

  
   <div class="forgotpass" >
     <a href="./Forgot/type.php">
      Forgot Password ? 
</a>
   </div>
    
   <input type="submit" name="send" value="Login" >
   
   <div class="signup_link">
     
      Not a member?       <a href="../signup/signup.html"> Signup </a>
   
   </div>



</FORM>
</div>


<div id="image-preload-container">

   <img src="./img/image1.jpg" alt="preload-image">
   <img src="./img/image2.jpg" alt="preload-image">
   <img src="./img/image3.jpg" alt="preload-image">
   <img src="./img/image4.jpg" alt="preload-image">
   <img src="./img/image5.jpg" alt="preload-image">

  </div>

<div id="slideshow-container">

   <div class="slide"></div>
 
  </div>

 <script src="./script.js"></script>



</body>
</html>