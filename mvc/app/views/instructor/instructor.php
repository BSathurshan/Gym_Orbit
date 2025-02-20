<?php 
if (!isset($_SESSION["username"])) {
    // Redirect to the login page if not logged in
    header("Location: ../../../login/login.php");
    exit();
}
else{

    $trainer_username= $_SESSION["username"];
    $username= $_SESSION["username"];
    $userDetails = $_SESSION["userDetails"];

    $gym_username=$userDetails["gym_username"]; 
    $profile_images=$userDetails["file"];

        $trainer_name = $userDetails["trainer_name"];
        $email = $userDetails["email"];
        $social = $userDetails["social"];
        $experience = $userDetails["experience"];
        $contact = $userDetails["contact"];
        $location = $userDetails["location"];
        $age = $userDetails["age"];
        $gender = $userDetails["gender"];
        $availiblity = $userDetails["availiblity"];
        $qualify = $userDetails["qualify"];
        $special = $userDetails["special"];
        $password = $userDetails["password"];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/main.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/edit.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/css/buttons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1c1508aefb.js" crossorigin="anonymous"></script>
    <script src="<?= ROOT ?>/assets/js/instructor/instructor_1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/instructor/instructor_2.js" defer></script>
</head>
<body>
    <!-- Header Section -->
    <header class="header">

        <i class="bi bi-house btn btn-primary"></i>

        <nav class="navbar">
            <a href="<?= ROOT ?>/login/logout" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i>Logout
            </a>
        </nav>
    </header> <!-- End of Header -->

    <!-- Container -->
    <div class="container">
        <!-- Sidebar Menu -->
        <div class="m-lg-0" >
        <div class="sidemenu">
            <br>
            <div class="container-fluid">
            <img src="<?= ROOT ?>/assets/images/instructor/profile/images/<?php echo $profile_images; ?>" alt="logo" class="logo">
            <div class="menu">
                <ul>
                    <li class="tabs activetab" value="1"><a><i class="bi bi-person-circle"></i>Profile</a></li>
                    <li class="tabs" value="2"><a><i class="bi bi-calendar2-check-fill"></i>Schedule</a></li>
                    <li class="tabs" value="3"><a><i class="bi bi-person-lines-fill"></i>Contacts</a></li>
                    <li class="tabs" value="4"><a><i class="bi bi-alarm-fill"></i>Reminder</a></li>
                    <li class="tabs" value="5"><a><i class="bi bi-stack-overflow"></i>Materials</a></li>
                    <li class="tabs" value="6"><a><i class="bi bi-chat-heart-fill"></i>Support</a></li>
        
                </ul>
            </div> <!-- End of Menu -->
            </div>
        </div> <!-- End of Sidebar Menu -->
      </div>

        <!-- Main Content --> 
        <div class="content">
                        
        
            <h1>Welcome, <?php echo $trainer_username; ?>!</h1>


            <!-- Profile Section -->
            <div class="descriptor active" value="1">
            <?php
                        require 'profile.php';
            ?>  
            </div> 


            <div class="descriptor" value="2">
                <h2>Schedule</h2>
                <hr>
                <div class="jobreq"></div>
            </div> 


            <div class="descriptor" value="3">
            <?php
                        require 'contacts.php';
            ?>  
            </div> 


            <div class="descriptor" value="4">
            <?php
                        require 'reminders.php';
            ?>  
            </div> 
        
        
            <div class="descriptor" value="5">
            <?php
                            require 'materials.php';
                ?>  
            </div> 


             <div class="descriptor" value="6">
             <?php
                        require 'support.php';
            ?>  
            </div> 



        </div> <!-- End of Main Content -->
    </div> <!-- End of Container -->
</body>
</html>
