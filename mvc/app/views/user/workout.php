<?php 
if (!isset($_SESSION["username"])) {
    header("Location: ../../../login/login.php");
    exit();
}
else{

    $username = $_SESSION["username"];
    $userDetails = $_SESSION["userDetails"];
    $email=$userDetails["email"];
    $name=$userDetails["name"];
    $contact=$userDetails["contact"];
    $age=$userDetails["age"];
    $gender=$userDetails["gender"];
    $goals=$userDetails["goals"];
    $password=$userDetails["password"];
    $profile_image=$userDetails["file"];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User Dashboard</title>
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/main.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/custom.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/edit.css">
    
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/userDashboard.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/progressTracker.css">
    <script src="<?= ROOT ?>/assets/js/user/user_1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/user/user_2.js" defer></script> -->

    <style>
    
        

        @media (max-width: 768px) {
            #main-div {
                flex-direction: column;
            }
            #sidebar-div {
                width: 100%;
                height: 100px;
            }
            #bodyarea-div {
                flex: 1;
            }
        }
    </style>
</head>

<body>
    
    <!-- <div class="mbtns">
        <label for="s-menu" class="showbtn"><i class="fas fa-bars"></i></label>
        <label for="c-menu" class="closebtn"><i class="fas fa-times"></i></label>
    </div> -->

    <!-- Main contetnt-->

    <div class="content">
        <!-- Dashboard -->
    <div class="descriptor active" value="1">
      <div class="header">
        <div>
          <h1>Workout Plan</h1>
          <p><?php
            echo date("l, F j, Y"); // Outputs: Wednesday, December 18, 2024
            ?></p>
        </div>
      </div>
    </div>

    


</body>
</html>