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
    $address=$userDetails["location"];


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/1c1508aefb.js" crossorigin="anonymous"></script>
    <title>| User |</title>    
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/main.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/edit.css"> 
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/custom.css">
    
    -->
    
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/dashboard.css"> 
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/sidebar.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/modals.css"> 
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/tables.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/buttons.css"> 



    <script src="<?= ROOT ?>/assets/js/user/user_1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/user/user_2.js" defer></script> 

</head>
<body>
    
    <!-- 
    <header class="header">
        <nav class="navbar">
        <a href="<?= ROOT ?>/login/logout" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i>Logout
            </a>
        </nav>
    </header> 
     -->

 <div class="main-container">


        <!-- Sidebar Menu -->
        <div class="sidebar">
            <br>

                <header>
                    <img src="<?= ROOT ?>/assets/images/user/profile/images/<?php echo $profile_image; ?>" alt="logo" class="logo">
                </header>

                    <div class="nav-links">
                        <ul>
                            <div class="grps">
                                <li class="tabs activetab" value="1"><a><i class="fa fa-home"></i>Home</a></li>
                                <li class="tabs " value="2"><a><i class="bi bi-person-circle"></i>Profile</a></li>
                                <li class="tabs" value="3"><a><i class="bi bi-stars"></i>Gyms</a></li>
                                
                                <li class="tabs" value="4"><a><i class="bi-person-arms-up"></i>Instructors</a></li>
                                <li class="tabs" value="5"><a><i class="bi bi-calendar2-check-fill"></i>Appoinments</a></li>
                                <li class="tabs" value="10"><a><i class="bi bi-stack-overflow"></i>Materials</a></li> 
                                <li class="tabs" value="11"><a><i class="bi bi-chat-left-heart-fill"></i>Posts</a></li>

                                <li class="tabs" value="6"><a><i class="bi bi-gear-fill"></i>   progress Tracker</a></li>
                                <li class="tabs" value="7"><a><i class="bi bi-credit-card-fill"></i>Payments</a></li>
                                <li class="tabs" value="8"><a><i class="bi bi-chat-heart-fill"></i>Support</a></li>


                            </div>
                           
                            

                            
                            
                            <!-- <li class="tabs" value="10"><a><i class="bi bi-gear-fill"></i>Search Gyms</a></li> -->
                            <!-- <li class="tabs" value="9"><a><i class="fas fa-search"></i>Search Gym</a></li>-->
                            <!-- -->
                            <!-- <li class="tabs" value="6"><a><i class="bi bi-book-fill"></i>Reports</a></li> -->
                            <!-- <li class="tabs" value="7"><a><i class="bi bi-alarm-fill"></i>Reminders</a></li> -->

                            
                           
                            <div class="grps">
                                        <a href="<?= ROOT ?>/login/logout" class="logout-btn">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        Logout
                                    </a>
                            </div>

                        </ul>
                    </div> <!-- End of navlink-->
        </div> <!-- End of Sidebar Menu -->


        <!-- Main Content -->
          
        <div class="descriptor active" value="1">
            <?php
                        require 'home.php';
            ?>
            </div> 

            <div class="descriptor " value="2">
            <?php
                        require 'profile.php';
            ?>  
            </div> 


           
            <div class="descriptor" value="3">
            <?php
                        require 'joinedGym.php';
                        require 'searchGym.php';

            ?>
            </div>


           
            <div class="descriptor" value="4">
               <?php
                        require 'instructor.php';
               ?>
            </div>

            <div class="descriptor" value="5">
            <?php
                        require 'schedule.php';
            ?>
            </div>

            <div class="descriptor" value="6">
            <?php
                        require 'progressTracker.php';
            ?>
            </div> 

            <div class="descriptor" value="7">
            <?php
                        require 'payment.php';
            ?>
            </div>

            <div class="descriptor" value="8">
            <?php
                        require 'support.php';
            ?>
            </div> 


            <div class="descriptor" value="9">
            <?php
                         require 'searchGym.php';
            ?>
            </div> 

            <div class="descriptor" value="11">
            <?php
                        require 'posts.php';
            ?>
            </div> 


            <div class="descriptor" value="10">
            <?php
                        require 'materials.php';
            ?>
            </div> 



           
 </div>       
</body>
</html>
